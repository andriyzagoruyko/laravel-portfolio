@@include('vendors.js');
@@include('service.js');


$(function () {
    $('.header__hamburger').on("click", function () {
        $('.sidebar').toggleClass("is-active");
        //$('.navigation__list').toggleClass("is-active");
        //$('.overlay').toggleClass("is-active");
    });
});