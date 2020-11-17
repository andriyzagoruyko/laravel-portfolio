import browser from './helpers/browser'

export default () => {
    let lastTouchTime = 0;

    document.body.addEventListener('touchstart', () => {
        if (!document.body.classList.contains("touch")) {
            document.body.classList.replace('mouse', 'touch');
        }
        lastTouchTime = new Date();
    }, true);

    document.body.addEventListener('mousemove', () => {
        if (!document.body.classList.contains("mouse") && new Date() - lastTouchTime > 500) {
            document.body.classList.remove("touch");
            document.body.classList.add("mouse"); 
        }
    }, true);

    document.body.classList.add(browser.isMobile() ? "touch" : "mouse");
}
