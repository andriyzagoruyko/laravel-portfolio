import $ from 'jquery';
import Api from './api'

export default () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const api = new Api();

    $(document).on("click", ".project",  function(e) {
        e.preventDefault();
        api.toggleSlider($(this).index());
    });

    $(document).on("click", ".modal__close", (e) => {
        e.preventDefault();
        api.toggleSlider();
    });

    $(document).on('click', '#loadmore', (e) => {
        e.preventDefault();
        api.loadMore();
    });

    $('.tabs__item').on('click', function(e) {
        e.preventDefault();
        api.changeTab($(this));
    });
};
