import browser from './helpers/browser'

//Disable fixed background on mobile and fix 100vh bug 
export default () => {
    if (browser.isMobile()) {
        const items = document.querySelectorAll('.fixed-bg');
        const mobileFullscreen = document.querySelectorAll('.mobile-fullscreen');
        const vh = window.innerHeight * 0.01;
        
        items.forEach(item => item.classList.remove('fixed-bg'));

        mobileFullscreen.forEach(item => item.style.minHeight = 'calc(var(--vh, 1vh) * 100)');
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    }
}