@@include('vendors.js');
@@include('service.js');

$(function () {
    $('.header__hamburger').on("click", function () {
        $(this).toggleClass("is-active");
        $('.sidebar').toggleClass("is-active");
    });

    $(document).on("click", ".dropdown", function(e){
        let $dropdown_toggle = $(this).find(".dropdown__toggle");
        let $target = $(e.target);

        if ($target.is($dropdown_toggle) ||  !$dropdown_toggle.has($target) === 0){
            e.preventDefault();
        }

        $(this).toggleClass("is-active");
    });

});