import browser from './helpers/browser'

export default () => {
    if (browser.isMobile()) {
        const items = document.querySelectorAll('.fixed-bg');
        items.forEach(item => item.classList.remove('fixed-bg'));
    } 
}