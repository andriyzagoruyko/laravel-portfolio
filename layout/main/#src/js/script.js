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

    $(window).on("scroll load", function () {
        $(".navigation").toggleClass("scrolled", ($(window).scrollTop() > 100));
    });
});

$(function () {
    $(document).on('click', '#loadmore', function (e) {
        e.preventDefault();

        const $loadmore = $(this);
        const locale = $('body').attr('data-locale');
        const tag_id = $loadmore.attr('data-tag');

        let page = +$loadmore.attr('data-page');

        const mobileWidth = (window.matchMedia("(max-width: 670px)").matches);
        const loadCount = mobileWidth ? 4 : 3;
        const shouldSkipOnFirstLoad = (!mobileWidth && page == 1)

        $.ajax({
            type: 'POST',
            url: '/' + locale + '/projects/' + tag_id,
            data: {
                count: loadCount,
                page: page,
                skip: shouldSkipOnFirstLoad ? 1 : 0
            },
            dataType: 'json',

            success: function (response) {
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
        const tag_id = $tab.attr('data-tag');
        const locale = $('body').attr('data-locale');

        $.ajax({
            type: 'POST',
            url: '/' + locale + '/projects/' + tag_id,
            data: {
                count: 4,
            },
            dataType: 'json',

            success: function (response) {
                $('.tabs__item').removeClass('is-active');
                $tab.addClass('is-active');
                $('.project').remove()
                $('#loadmore')
                    .toggleClass('is-hidden', !(response.maxPages > 1))
                    .before(response.view)
                    .attr('data-page', 1)
                    .attr('data-tag', tag_id);
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})