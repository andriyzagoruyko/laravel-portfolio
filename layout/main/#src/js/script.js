import anchors from './modules/anchors';
import navigation from './modules/navigation';
import dropdown from './modules/dropdown';
import form from './modules/form';
import projects from './modules/projects';
import touchMouse from './modules/touchMouse';
import scrolledHeader from './modules/scrolledHeader';

document.addEventListener('DOMContentLoaded', () => {
    "use strict";
    navigation();
    anchors();
    dropdown();
    form();
    projects();
    touchMouse();
    scrolledHeader();
})
