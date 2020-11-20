export default () => {
    const scrolledHeader = () => navigation.classList.toggle("scrolled", window.pageYOffset > 100);
    window.onload = window.onscroll = scrolledHeader;
}