import swiper from './swiper'
import makeRequest from '../helpers/makeRequest';
import scrollLock from '../helpers/scrolLock'

export default class {
    constructor() {
        this.isRequestBusy = false;
        this.slider = swiper();
        this.slider.on('reachEnd', () => this.slider.slides.length && setTimeout(this.load, 200));
    }

    get = (tag, params) => {
        const locale = document.body.getAttribute('data-locale');
        const url = `api/${locale}/projects${tag.length ? `/${tag}` : ''}`;

        const toggleBusy = (state) => {
            this.isRequestBusy = state;
            loadmore.classList.toggle('processing', state);
            modal.classList.toggle('processing', state);
        }

        toggleBusy(true);

        return makeRequest(url, {
            method: 'POST',
            body: JSON.stringify(params)
        })
        .finally(() => toggleBusy(false));
    }

    append = (result, setEmpty = false) => {
        let page = 0;

        if (setEmpty) {
            document.querySelectorAll('.project').forEach(item => item.remove())
            this.slider.removeAllSlides();
        } else {
            page = +loadmore.getAttribute('data-page');
        }

        this.slider.appendSlide(result.view.slides);
        this.slider.update();
        this.slider.lazy.load();

        loadmore.insertAdjacentHTML('beforebegin', result.view.projects);
        loadmore.setAttribute('data-page', page += 1)
        loadmore.classList.toggle('is-hidden', page >= result.maxPages || result.maxPages <= 1);
    }

    load = async () => {
        if (loadmore.matches('.is-hidden') || this.isRequestBusy) {
            return;
        }

        const isMobile = window.matchMedia("(max-width: 670px)").matches || window.matchMedia("(max-height: 480px)").matches;
        const tag = loadmore.getAttribute('data-tag');
        const page = loadmore.getAttribute('data-page')

        const result = await this.get(tag, {
            count: isMobile ? 4 : 3,
            skip: isMobile ? 0 : 1,
            page: parseInt(page)
        });

        this.append(result);
    }

    changeTab = async (newTab) => {
        const tabs = document.querySelectorAll('.tabs__item');
        const tag = newTab.getAttribute('data-tag');

        const result = await this.get(tag, {
            count: 4,
            skip: 0,
            page: 0
        });

        this.append(result, true);
        tabs.forEach(item => item.classList.remove('is-active'))
        newTab.classList.add('is-active');
        loadmore.setAttribute('data-tag', tag);
    }

    toggleSlider = (slide = -1) => {
        const state = slide != -1;
        
        scrollLock(state);
        document.querySelector('.modal').classList.toggle('is-active', state);
        state && this.slider.slideTo(slide, 0);
    }
}
