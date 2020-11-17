export default () => {
    const links = document.querySelectorAll('a[href*="#"]');

    links.forEach(item => {
        item.addEventListener('click', (e) => {
            let target = e.target.matches('a') ? e.target : e.target.closest('a');
            const href = target.getAttribute('href');

            if (href && href[0] == '#' && href.length > 1) {
                const elem = document.querySelector(href);

                if (elem) {
                    e.preventDefault();
                    elem.scrollIntoView({block: "center", behavior: "smooth"});
                }
            }
        });
    });
};
