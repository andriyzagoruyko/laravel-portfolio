import $ from 'jquery';
import {toggleScrollock} from './scroll'

export default () => {
    const $navigation = $("#navigation");
    
    function toggleNav(state = -1) {
        if (state == -1) {
            state = !$('.navigation__hamburger').hasClass('is-active');
        }
    
        toggleScrollock(state);

        $('.navigation__hamburger').toggleClass('is-active', state);
        $('.navigation__list').toggleClass('is-active', state);
        $('.overlay').toggleClass('is-active', state);
    }

    $(document).on("click", "a", function (e) {
        const href = $(this).attr('href');

        if (href && href.length > 1 && href[0] === '#') {
            const $el = $(href);

            if ($el.length) {
                e.preventDefault();
                toggleNav(false);

                $("html, body")
                    .stop()
                    .animate({
                        scrollTop: $el.offset().top - 20
                    }, 600);
            }
        }
    })

    $(document).on("click", ".navigation__hamburger", () => toggleNav());
    $(window).on("scroll load", () =>  $navigation.toggleClass("scrolled", ($(window).scrollTop() > 100)));
};