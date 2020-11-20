export default () => {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', (e) => {
            let target = e.target,
                toggle = dropdown.querySelector('.dropdown__toggle');

            if (toggle.contains(target)) {
                e.preventDefault();
            }

            dropdown.classList.toggle('is-active');
            toggle.setAttribute('aria-expanded', dropdown.classList.contains('is-active'));
        });
    });

    document.addEventListener('click', (e) => {
        let target = e.target;

        dropdowns.forEach(dropdown => {
            if (dropdown.matches('.is-active') && !dropdown.contains(target)) {
                dropdown.classList.remove('is-active');
            }
        });
    });
};
