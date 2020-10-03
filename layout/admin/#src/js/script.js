@@include('vendors.js');
@@include('service.js');


$(function () {
    $('.header__hamburger').on("click", function () {
        $('.sidebar').toggleClass("is-active");
    });
});