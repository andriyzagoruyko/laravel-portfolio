
const browser = {
    Android: function () { return navigator.userAgent.match(/Android/i); },
    BlackBerry: function () { return navigator.userAgent.match(/BlackBerry/i); },
    iOS: function () { return navigator.userAgent.match(/iPhone|iPad|iPod/i); },
    Opera: function () { return navigator.userAgent.match(/Opera Mini/i); },
    Windows: function () { return navigator.userAgent.match(/IEMobile/i); },
    isMobile: function () { return (browser.Android() || browser.BlackBerry() || browser.iOS() || browser.Opera() || browser.Windows()); }
};

const isMobile = browser.isMobile();

$(function () {
    var lastTouchTime = 0;
    var $body = document.body;

    $body.classList.add(isMobile ? "touch" : "mouse");

    function mouseMove() {
        if (new Date() - lastTouchTime < 500 || $body.classList.contains("mouse")) return;

        $body.classList.remove("touch");
        $body.classList.add("mouse");
    }

    function touchMove() {

        lastTouchTime = new Date();

        if ($body.classList.contains("touch")) return;

        $body.classList.replace('mouse', 'touch');
    }

    $body.addEventListener('touchstart', touchMove, true);
    $body.addEventListener('mousemove', mouseMove, true);
});