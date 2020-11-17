import Projects from './Projects'

export default () => {
    const projects = new Projects();
    const tabs = document.querySelectorAll('.tabs__item');
    const modalClose = document.querySelector('.modal__close')
    const loadmore = document.querySelector('#loadmore');

    function getSlideIndex(item) {
        const projectItems = document.querySelectorAll('.project');
        return Array.prototype.indexOf.call(projectItems, item);
    }

    document.addEventListener('click', (e) => {
        let target = e.target;

        if (target.matches('.project') || (target = target.closest('.project'))) {
            e.preventDefault();
            projects.toggleSlider(getSlideIndex(target));
        }  
    });

    modalClose && modalClose.addEventListener('click', (e) => {
        e.preventDefault();
        projects.toggleSlider();
    });

    loadmore && loadmore.addEventListener('click', (e) => {
        e.preventDefault();
        projects.load();
    });

    tabs.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            projects.changeTab(item);
        })
    });
};
