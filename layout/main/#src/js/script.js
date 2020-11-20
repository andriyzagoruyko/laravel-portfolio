"use strict";
import anchors from './modules/anchors';
import navigation from './modules/navigation';
import dropdown from './modules/dropdown';
import form from './modules/form';
import projects from './modules/projects';
import touchMouse from './modules/touchMouse';
import scrolledHeader from './modules/scrolledHeader';
import mobileFixes from './modules/mobileFixes'
import webp from './modules/webp'

webp(window, document);

document.addEventListener('DOMContentLoaded', () => {
    mobileFixes();
    navigation();
    anchors();
    dropdown();
    form();
    projects();
    touchMouse();
    scrolledHeader();
});
