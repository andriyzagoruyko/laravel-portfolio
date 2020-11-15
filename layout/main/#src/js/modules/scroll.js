import $ from 'jquery';
import scrollLock from 'scroll-lock';

export function toggleScrollock(state) {
    const $scrollable = $('.modal__wrapper, .navigation__list').get();

    if (state) {
        scrollLock.disablePageScroll($scrollable);
    } 
    else {
        scrollLock.enablePageScroll($scrollable);
    }
}
