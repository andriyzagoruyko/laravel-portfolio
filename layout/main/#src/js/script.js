import $ from 'jquery';
import hover from './modules/hover';
import navigation from './modules/navigation';
import dropdown from './modules/dropdown';
import form from './modules/form';
import projects from './modules/projects';

$(function() {
    hover();
    navigation();
    dropdown();
    form();
    projects();
});