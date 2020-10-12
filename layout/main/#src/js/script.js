@@include('vendors.js');
@@include('service.js');


$(function () {
    $('.navigation__hamburger').on("click", function () {
        $(this).toggleClass("is-active");
        $('.navigation__list').toggleClass("is-active");
        $('.overlay').toggleClass("is-active");
    });

    $(document).on("click", ".dropdown", function (e) {
        let $dropdown_toggle = $(this).find(".dropdown__toggle");
        let $target = $(e.target);

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

    $(window).on("scroll", function () {
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
        const shouldSkipOnFirstLoad = (!mobileWidth && page == 1)
        const loadCount = mobileWidth ? 4 : 3;

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
                
                $loadmore.before(response.view).attr('data-page', (page += 1))
                
                if (page >= response.max_pages) {
                    $loadmore.remove(); 
                }
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})