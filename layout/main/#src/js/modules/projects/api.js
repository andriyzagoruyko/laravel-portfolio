import $ from 'jquery';
import swiper from './swiper'
import {toggleScrollock} from '../scroll'

export default class {
    constructor() {
        this.loadMoreBtn = $('#loadmore');
        this.isRequestBusy = false;
        this.slider = swiper();
        this.slider.on('reachEnd', () => this.slider.slides.length  && setTimeout(this.loadMore, 200));
    }

    getProjects = (tag, count, page, skip, onSuccess) => {
        const locale = $('body').attr('data-locale');
        tag = tag.length ? '/' + tag : ''
    
        $.ajax({
            type: 'POST',
            url: '/' + locale + '/projects' + tag,
            data: {
                count: count,
                page: page,
                skip: skip
            },
            dataType: 'json',
            success: response => onSuccess(response),
            beforeSend: () => this.lockLoading(true),
            complete: ()  => this.lockLoading(false),
        });
    }

    appendProjects = (projects, slides, maxPages, setEmpty = false) => {
        let page = 0;
    
        if (setEmpty) {
            $('.project').remove();
            this.slider.removeAllSlides();
        } else {
            page = +this.loadMoreBtn.attr('data-page');
        }
    
        this.slider.appendSlide(slides);
        this.slider.update();
        this.slider.lazy.load();

        this.loadMoreBtn
            .before(projects)
            .attr('data-page', page += 1)
            .toggleClass('is-hidden', page >= maxPages || maxPages <= 1);
    }

    loadMore = () => {
        if (this.loadMoreBtn.is('.is-hidden') || this.isRequestBusy) {
            return;
        }
        
        const tag = this.loadMoreBtn.attr('data-tag');
        const page = +this.loadMoreBtn.attr('data-page');
        const isMobile = window.matchMedia("(max-width: 670px)").matches || window.matchMedia("(max-height: 480px)").matches;
        const count = isMobile ? 4 : 3;
        const skip = isMobile ? 0 : 1;
    
        this.getProjects(tag, count, page, skip,
            (response) => this.appendProjects(response.view.projects, response.view.slides, response.maxPages),
        );
    }

    changeTab = (newTab) => {
        const tabs = $('.tabs__item');
        const tag = newTab.attr('data-tag');

        this.getProjects(tag, 4, 0, 0,
            (response) => {
                tabs.removeClass('is-active');
                newTab.addClass('is-active');
                this.loadMoreBtn.attr('data-tag', tag);
                this.appendProjects(response.view.projects, response.view.slides, response.maxPages, true);
            });
    }

    toggleSlider = (slide = -1) => {
        const state = slide != -1;

        $('.modal').toggleClass('is-active', state);
        toggleScrollock(state);

        state && this.slider.slideTo(slide, 0);
    }

    lockLoading = (state = true) => {
        this.isRequestBusy = state;
        this.loadMoreBtn.toggleClass('processing', state);
        
        if (state) {
            $('.modal__wrapper').append('<div class="modal__preloader swiper-lazy-preloader"></div>');
        }else {
            $('.modal__preloader').remove();
        }
    }
}



