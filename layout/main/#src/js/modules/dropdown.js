import $ from 'jquery';

export default () => {
    $(document).on("click", ".dropdown", function(e) {
        const $dropdown_toggle = $(this).find(".dropdown__toggle");
        const $target = $(e.target);

        if ($target.is($dropdown_toggle) || !$dropdown_toggle.has($target) === 0) {
            e.preventDefault();
        }

        $(this).toggleClass("is-active");
    });

    $(document).on('mousedown tocuh', function() {
        $(".dropdown").filter(".is-active").each(function () {
            let $dropdown = $(this);
            let $target = $(e.target);

            if (!$dropdown.is($target) && !$dropdown.has($target).length) {
                $dropdown.removeClass("is-active");
            }
        });
    });
}
