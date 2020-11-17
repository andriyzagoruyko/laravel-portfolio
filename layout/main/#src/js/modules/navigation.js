import scrollLock from './helpers/scrolLock'

export default () => {
    let selectors = ['.navigation__hamburger', '.navigation__list', '.overlay'],
        elements = selectors.map(item => document.querySelector(item)),
        menuEnabled = false;

    function toggleNav(enable) {
        menuEnabled = enable;
        elements.forEach(item => item.classList.toggle('is-active', menuEnabled));
        scrollLock(menuEnabled);
    }

    document.addEventListener('click', (e) => {
        const target = e.target;
        
        if (target.matches(selectors[0]) || target.closest(selectors[0])) {
            toggleNav(!menuEnabled);
            return;
        }
        
        if (menuEnabled && target.matches('a')) {
            toggleNav(false);
        }
    });
};