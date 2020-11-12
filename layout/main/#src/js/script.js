@@include('vendors.js');
@@include('service.js');

//Navigation
$(function () {
    function toggleNav(state = -1) {
        if (state == -1) {
            state = !$('.navigation__hamburger').hasClass('is-active');
        }
    
        toggleScrollock(state);
        $('.navigation__hamburger').toggleClass('is-active', state);
        $('.navigation__list').toggleClass('is-active', state);
        $('.overlay').toggleClass('is-active', state);
    }

    $(document).on("click", ".navigation__hamburger", function (e) {
        toggleNav();
    });

    $(document).on("click", "a", function (e) {
        const href = $(this).attr('href');

        if (href.length && href[0] == '#') {
            const $el = $(href);

            if ($el.length) {
                e.preventDefault();
                toggleNav(false);
                $("html, body")
                    .stop()
                    .animate({
                        scrollTop: $el.offset().top - 20
                    }, 600);
            }
        }
    })

    $(window).on("scroll load", function () {
        $("#navigation").toggleClass("scrolled", ($(window).scrollTop() > 100));
    });
});

//Dropdown
$(function () {
    $(document).on("click", ".dropdown", function (e) {
        const $dropdown_toggle = $(this).find(".dropdown__toggle");
        const $target = $(e.target);

        if ($target.is($dropdown_toggle) || !$dropdown_toggle.has($target) === 0) {
            e.preventDefault();
        }

        $(this).toggleClass("is-active");
    });

    $(document).on('mousedown tocuh', function (e) {
        $(".dropdown").filter(".is-active").each(function () {
            let $dropdown = $(this);
            let $target = $(e.target);

            if (!$dropdown.is($target) && !$dropdown.has($target).length) {
                $dropdown.removeClass("is-active");
            }
        });
    });
})

//Feedback form
$(function (){
    const $form = $('#feedback');
    const locale = $('body').attr('data-locale');
    const messages = {
        "en" : {
            name: "Please specify your name",
            email: {
                required: "Need your email address to contact you",
                email: "Your email address must be in the format of name@domain.com"
            },
            subject: {
                required: "Please specify subject",
            },
            message: {
                required: "Please write your message",
            }
        },
        "uk" : {
            name: "Будь ласка, вкажіть ім'я",
            email: {
                required: "Потрібен Ваш email для зв’язку",
                email: "Електронна адреса повинна бути правильного формату name@domain.com"
            },
            subject: {
                required: "Будь ласка, вкажіть тему повідомлення",
            },
            message: {
                required: "Будь ласка, напишіть повідомлення",
            }
        },
        "ru" : {
            name: "Пожалуйста, укажите имя",
            email: {
                required: "Нужен Ваш email для связи",
                email: "Электронная почта должна быть правильного формата name@domain.com"
            },
            subject: {
                required: "Пожалуйста, укажите тему сообщения",
            },
            message: {
                required: "Пожалуйста, напишите сообщение",
            }
        }
    }

    $form .validate({ 
        errorElement: "span",
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            subject: {
                required: true
            },
            message: {
                required: true
            }
        },
        messages:messages[locale],

        submitHandler: function() {
            $data = $form.serialize();
            $.ajax({
                type: 'POST',
                url: '/' + locale + '/feedback',
                data: $data,
                dataType: 'json',
                success: (response) => {
                    
                    $form.prepend('<div class="contact-form__row"><span class="'+ response.status +'">' + response.message +'</span></div>')
                    .addClass('disabled')
                },
            });
        }
    });

    $form.on("submit", function (e) {
        e.preventDefault();
    });
});

//Projects loading, tabs and modal window with slider 
$(function () {
    const $loadmore = $('#loadmore');
    let isRequestBusy = false;

    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        speed: 400,
        spaceBetween: 120,
        grabCursor: true,
        autoHeight: true,
        updateOnWindowResize: true,
        preloadImages: false,
        lazy: {
            loadPrevNext: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 50,
            stretch: 100,
            depth: 200,
            modifier: 1,
            slideShadows: false,
        },
        flipEffect: {
            slideShadows: false,
        },
        on: {
            reachEnd: () => {
                const slidesNum = swiper.slides.length
                if (slidesNum > 0) {
                    setTimeout(loadMore, 200);
                }
            },
        }
    });

    function getProjects(tag, count, page, skip, onSuccess) {
        const locale = $('body').attr('data-locale');
        tag = tag.length ? '/' + tag : ''

        $.ajax({
            type: 'POST',
            url: '/' + locale + '/projects' + tag,
            data: {
                count: count,
                page: page,
                skip: skip
            },
            dataType: 'json',
            success: (response) => onSuccess(response),
            beforeSend: () => lockLoading(true),
            complete: ()  => lockLoading(false),
        });
    }

    function lockLoading(state = true) {
        isRequestBusy = state;
        $loadmore.toggleClass('processing', state);
        
        if (state) {
            $('.modal__wrapper').append('<div class="modal__preloader swiper-lazy-preloader"></div>');
        }else {
            $('.modal__preloader').remove();
        }
    }

    function appendProjects(projects, slides, maxPages, empty = false) {
        let page = 0;

        if (empty) {
            $('.project').remove();
            swiper.removeAllSlides();
        } else {
            page = +$loadmore.attr('data-page');
        }

        swiper.appendSlide(slides);
        swiper.update();
        swiper.lazy.load();
        $loadmore
            .before(projects)
            .attr('data-page', page += 1)
            .toggleClass('is-hidden', page >= maxPages || maxPages <= 1);
    }

    function loadMore() {
        if ($loadmore.is('.is-hidden') || isRequestBusy) {
            return;
        }
        
        const tag = $loadmore.attr('data-tag');
        const page = +$loadmore.attr('data-page');
        
        const isMobile = window.matchMedia("(max-width: 670px)").matches || window.matchMedia("(max-height: 480px)").matches;
        const count = isMobile ? 4 : 3;
        const skip = isMobile ? 0 : 1;

        getProjects(tag, count, page, skip,
            (response) => appendProjects(response.view.projects, response.view.slides, response.maxPages),
        );
    }

    function changeTab($newTab) {
        const $tabs = $('.tabs__item');
        const tag = $newTab.attr('data-tag');

        getProjects(tag, 4, 0, 0,
            (response) => {
                $tabs.removeClass('is-active');
                $newTab.addClass('is-active');
                $loadmore.attr('data-tag', tag);
                appendProjects(response.view.projects, response.view.slides, response.maxPages, true);
            });
    }

    function toggleModal(state = true) {
        toggleScrollock(state);
        $('.modal').toggleClass('is-active', state);
    }
    
    $(document).on("click", ".project", function (e) {
        e.preventDefault();
        swiper.slideTo($(this).index(), 0);
        toggleModal(true);
    });

    $(document).on("click", ".modal__close", function (e) {
        e.preventDefault();
        toggleModal(false);
    });

    $(document).on('click', '.tabs__item', function (e) {
        e.preventDefault();
        changeTab($(this));
    });

    $loadmore.on('click', function (e) {
        e.preventDefault();
        loadMore();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function toggleScrollock(state) {
    
    const $scrollable = $('.modal__wrapper, .navigation__list').get();

    if (state) {
        scrollLock.disablePageScroll($scrollable);
    } else {
        scrollLock.enablePageScroll($scrollable);
    }
}

