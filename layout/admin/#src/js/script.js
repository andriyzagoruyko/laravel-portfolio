
'use strict';

import dropdown from './modules/dropdown';
import touchMouse from './modules/touchMouse';
import sidebar from './modules/sidebar';

document.addEventListener('DOMContentLoaded', () => {
    touchMouse();
    dropdown();
    sidebar();
});
