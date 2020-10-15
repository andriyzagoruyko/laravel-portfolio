@@include('vendors.js');
@@include('service.js');

function toggleModal(state = true) {
    $('body').toggleClass('scroll-locked', state);
    $('.modal').toggleClass('is-active', state);
}

$(function () {
    $('.navigation__hamburger').on("click", function () {
        const state = !$(this).hasClass('is-active');

        $(this).toggleClass('is-active', state);
        $('.navigation__list').toggleClass('is-active', state);
        $('.overlay').toggleClass('is-active', state);
        $('body').toggleClass('scroll-locked', state);
    });

    $(document).on("click", ".dropdown", function (e) {
        const $dropdown_toggle = $(this).find(".dropdown__toggle");
        const $target = $(e.target);

        if ($target.is($dropdown_toggle) || !$dropdown_toggle.has($target) === 0) {
            e.preventDefault();
        }

        $(this).toggleClass("is-active");
    });

    $(document).mouseup(function (e) {
        $(".dropdown").filter(".is-active").each(function () {
            let $dropdown = $(this);
            let $target = $(e.target);

            if (!$dropdown.is($target) && !$dropdown.has($target).length) {
                $dropdown.removeClass("is-active");
            }
        });
    });

    $(document).on("click", ".modal__close", function (e) {
        e.preventDefault();
        toggleModal(false);
    })

    $(window).on("scroll load", function () {
        $(".navigation").toggleClass("scrolled", ($(window).scrollTop() > 100));
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

$(function () {
    const $loadmore = $('#loadmore');
    const isMobileWidth = window.matchMedia("(max-width: 670px)").matches;
    let isReqestBusy = false;

    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        speed: 400,
        spaceBetween: 120,
        grabCursor: true,
        preloadImages: false,
        lazy: {
            loadPrevNext: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: isMobileWidth ? 'flip' : 'coverflow',
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

        $.ajax({
            type: 'POST',
            url: '/' + locale + '/projects/' + tag,
            data: {
                count: count,
                page: page,
                skip: skip
            },
            dataType: 'json',
            success: (response) => onSuccess(response),
            beforeSend: () => {
                isReqestBusy = true;
                $loadmore.addClass('processing');
                $('.modal__wrapper').append('<div class="modal__preloader swiper-lazy-preloader"></div>');

            },
            complete: () => {
                isReqestBusy = false;
                $loadmore.removeClass('processing');
                $('.modal__preloader').remove();
            }
        });
    }

    function appendProjects(projects, slides, maxPages, empty = false) {
        let page = +$loadmore.attr('data-page');

        empty && $('.project').remove();
        slides && appendSlides(slides, empty);

        $loadmore
            .before(projects)
            .attr('data-page', empty ? 1 : (page += 1))

        $loadmore.toggleClass('is-hidden', page >= maxPages || maxPages <= 1);
    }

    function appendSlides(slides, empty = false) {
        empty && swiper.removeAllSlides();

        swiper.appendSlide(slides);
        swiper.update();
        swiper.lazy.load();
    }

    function loadMore() {
        if ($loadmore.is('.is-hidden') || isReqestBusy) {
            return;
        }

        const tag = $loadmore.attr('data-tag');
        const count = isMobileWidth ? 4 : 3;
        const page = +$loadmore.attr('data-page');
        const skip = isMobileWidth ? 0 : 1;

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

    function showProject(slideIndex) {
        swiper.slideTo(slideIndex, 0);
        toggleModal(true);
    }

    $(document).on('click', '.tabs__item', function (e) {
        e.preventDefault();
        changeTab($(this));
    });

    $(document).on('click', '#loadmore', function (e) {
        e.preventDefault();
        loadMore();
    });

    $(document).on("click", ".project", function (e) {
        e.preventDefault();
        showProject($(this).index());
    });
});
