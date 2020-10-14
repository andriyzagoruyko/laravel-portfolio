@@include('vendors.js');
@@include('service.js');

$(function () {
    $('.navigation__hamburger').on("click", function () {
        $('.navigation__list').toggleClass("is-active");
        $('.overlay').toggleClass("is-active");
        $(this).toggleClass("is-active");
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

    $(document).on("click", ".project", function (e) {
        e.preventDefault();
        $('.modal').addClass('is-active');
    })

    $(document).on("click", ".modal__close", function (e) {
        e.preventDefault();
        $('.modal').removeClass('is-active');
    })

    $(window).on("scroll load", function () {
        $(".navigation").toggleClass("scrolled", ($(window).scrollTop() > 100));
    });
});

$(function(){
    const effect = window.matchMedia("(max-width: 670px)").matches ? 'flip': 'coverflow';

    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        speed: 600,
        spaceBetween: 120,
        grabCursor: true,
        effect: effect,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 200,
            modifier: 1,
            slideShadows: false,
        },
        flipEffect: {
            slideShadows: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
})

$(function () {
    $(document).on('click', '#loadmore', function (e) {
        e.preventDefault();

        const $loadmore = $(this);

        let page = +$loadmore.attr('data-page');

        const isMobileWidth = window.matchMedia("(max-width: 670px)").matches;
        const loadingCount = isMobileWidth ? 4 : 3;
        const shouldSkipOnFirstLoad = (!isMobileWidth && page == 1)
        const tagId = $loadmore.attr('data-tag');
        const locale = $('body').attr('data-locale');

        $.ajax({
            type: 'POST',
            url: '/' + locale + '/projects/' + tagId,
            data: {
                count: loadingCount,
                page: page,
                skip: shouldSkipOnFirstLoad ? 1 : 0
            },
            dataType: 'json',

            success: function (response) {
                console.log(response.data);
                $loadmore
                    .before(response.view)
                    .attr('data-page', (page += 1))

                if (page >= response.maxPages) {
                    $loadmore.addClass('is-hidden');
                }
            }
        });
    });

    $(document).on('click', '.tabs__item', function (e) {
        e.preventDefault();

        const $tab = $(this);
        const tagId = $tab.attr('data-tag');
        const locale = $('body').attr('data-locale');

        $.ajax({
            type: 'POST',
            url: '/' + locale + '/projects/' + tagId,
            data: {
                count: 4,
            },
            dataType: 'json',

            success: function (response) {
                $('.tabs__item').removeClass('is-active');
                $tab.addClass('is-active');
                $('.project').remove();
                $('#loadmore')
                    .before(response.view)
                    .attr('data-page', 1)
                    .attr('data-tag', tagId)
                    .toggleClass('is-hidden', response.maxPages <= 1);
            }
        });
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})