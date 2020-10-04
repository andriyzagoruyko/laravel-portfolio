@@include('vendors.js');
@@include('service.js');

$(function () {
    $('.header__hamburger').on("click", function () {
        $(this).toggleClass("is-active");
        $('.sidebar').toggleClass("is-active");
    });
});