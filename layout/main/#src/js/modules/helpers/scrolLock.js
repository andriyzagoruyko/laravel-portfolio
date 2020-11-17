import scrollLock from 'scroll-lock';

export default (state) => {
    const scrollable = document.querySelectorAll('.modal__wrapper', '.navigation__list');
    
    if (state) {
        scrollLock.disablePageScroll(scrollable);
    } 
    else {
        scrollLock.enablePageScroll(scrollable);
    }
}
