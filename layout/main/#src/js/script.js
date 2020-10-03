@@include('vendors.js');
@@include('service.js');


$(function() {
    $('.navigation__hamburger').on("click", function(){
        $(this).toggleClass("is-active");
        $('.navigation__list').toggleClass("is-active");
        $('.overlay').toggleClass("is-active");
    });

    $(document).on("click", ".dropdown", function(e){
        let $dropdown_toggle = $(this).find(".dropdown__toggle");
        let $target = $(e.target);

        if ($target.is($dropdown_toggle) ||  !$dropdown_toggle.has($target) === 0){
            e.preventDefault();
        }

        $(this).toggleClass("is-active");
    });

    $(document).mouseup(function (e){ 
        $(".dropdown").filter(".is-active").each(function(){
            let $dropdown = $(this);
            let $target = $(e.target);

            if (!$dropdown.is($target) && !$dropdown.has($target).length) {
                $dropdown.removeClass("is-active");
            }
        });
    });

    $(window).on("scroll", function(){
        $(".navigation").toggleClass("scrolled", ($(window).scrollTop() > 100));
    });
})