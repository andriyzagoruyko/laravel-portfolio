const browser = {
    Android: () => navigator.userAgent.match(/Android/i),
    BlackBerry: () => navigator.userAgent.match(/BlackBerry/i),
    iOS: () => navigator.userAgent.match(/iPhone|iPad|iPod/i),
    Opera: () => navigator.userAgent.match(/Opera Mini/i),
    Windows: () => navigator.userAgent.match(/IEMobile/i),
    isMobile: () => (browser.Android() || browser.BlackBerry() || browser.iOS() || browser.Opera() || browser.Windows()) != null
};

export default browser;