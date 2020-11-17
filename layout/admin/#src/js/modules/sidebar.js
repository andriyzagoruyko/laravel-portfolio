export default () => {
    const hamburger = document.querySelector('.header__hamburger');
    const sidebar = document.querySelector('.sidebar');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('is-active');
        sidebar.classList.toggle('is-active');
    });
}