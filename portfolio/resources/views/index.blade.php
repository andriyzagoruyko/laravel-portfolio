@extends('layouts.master')

@section('header-content')
<div class="header__title-block">
    <div class="header__title title"><h1>Creative web development</h1></div>
    <style>.clip:after {content: 'Creative web development';}</style>
    <div class="clip"></div>
</div>
<div class="header__content">
    <div class="header__item header__item-laravel">
        <img src="assets/main/img/head/laravel.svg" alt="">
        <span>Laravel</span>
    </div>
    <div class="header__item header__item-wordpress">
        <img src="assets/main/img/head/wordpress.svg" alt="">
        <span>Wordpress</span>
    </div>
</div>
<a href="#" class="header__nav-button nav-button">
    <span>Portfolio</span>
    <div class="icon">
        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M27 22.604v-6.562l-10.208 7.291-10.209-7.291v6.562l10.209 7.292L27 22.604z" fill="currentColor"/>
            <path d="M27 12.396V5.833l-10.208 7.292L6.583 5.833v6.563l10.209 7.291L27 12.396z" fill="currentColor"/>
        </svg>
    </div>
</a>
@endsection

@section('content')
<main class="main">
    <img src="assets/main/img/projects/bg.svg" alt="" class="main-bg">
    <section class="section">
        <h2 class="section__title title">Last Projects</h2>
        <div class="section__body container">
            <nav class="section__tabs tabs">
                <ul>
                    <li class="tabs__item is-active"><a href="#">All</a></li>
                    <li class="tabs__item"><a href="#">Landing-page</a></li>
                    <li class="tabs__item"><a href="#">E-shop</a></li>
                </ul>
            </nav>
            <div class="section__content portfolio">
                <a href="#" class="portfolio__item project">
                    <img src="assets/main/img/projects/01.jpg" alt="">
                    <div class="project__overlay"><span>View</span></div>
                </a>
                <a href="#" class="portfolio__item project">
                    <img src="assets/main/img/projects/02.jpg" alt="">
                    <div class="project__overlay"><span>View</span></div>
                </a>
                <a href="#" class="portfolio__item project">
                    <img src="assets/main/img/projects/03.jpg" alt="">
                    <div class="project__overlay"><span>View</span></div>
                </a>
                <a href="#" class="portfolio__item project">
                    <img src="assets/main/img/projects/04.jpg" alt="">
                    <div class="project__overlay"><span>View</span></div>
                </a>
                <div class="portfolio__item portfolio__item-loadmore">
                    <a href="#" class="portfolio__button nav-button">
                        <span>Watch more</span>
                        <div class="icon">
                            <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.4999 6.99414C10.2083 6.99414 3.98117 11.5216 1.45825 17.9126C3.98117 24.3035 10.2083 28.831 17.4999 28.831C24.7916 28.831 31.0187 24.3035 33.5416 17.9126C31.0187 11.5216 24.7916 6.99414 17.4999 6.99414ZM17.4999 25.1915C13.4749 25.1915 10.2083 21.9305 10.2083 17.9126C10.2083 13.8946 13.4749 10.6336 17.4999 10.6336C21.5249 10.6336 24.7916 13.8946 24.7916 17.9126C24.7916 21.9305 21.5249 25.1915 17.4999 25.1915ZM17.4999 13.5452C15.0791 13.5452 13.1249 15.496 13.1249 17.9126C13.1249 20.3292 15.0791 22.2799 17.4999 22.2799C19.9208 22.2799 21.8749 20.3292 21.8749 17.9126C21.8749 15.496 19.9208 13.5452 17.4999 13.5452Z" fill="currentColor"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <h2 class="section__title title">My services</h2>
        <div class="section__body container">
            <div class="section__content services">
                <div class="services__column">
                    <div class="services__item service">
                        <div class="service__img">
                            <img src="assets/main/img/services/frontend.svg" alt="">
                        </div>
                        <div class="service__body">
                            <div class="service__title">Frontend </div>
                            <div class="service__description">Responsive pages development using HTML, CSS and JavaScript native or jQuery</div>
                        </div>
                    </div>
                    <div class="services__item service">
                        <div class="service__img">
                            <img src="assets/main/img/services/backend.svg" alt="">
                        </div>
                        <div class="service__body">
                            <div class="service__title">Backend</div>
                            <div class="service__description">Web applications development using PHP framework Laravel</div>
                        </div>
                    </div>
                </div>
                <div class="services__column services__column-image">
                    <img src="assets/main/img/services/laptop.png" alt="">
                </div>
                <div class="services__column">
                    <div class="services__item service">
                        <div class="service__img">
                            <img src="assets/main/img/services/cms.svg" alt="">
                        </div>
                        <div class="service__body">
                            <div class="service__title">CMS INTEGRATION </div>
                            <div class="service__description">Сreating WordPress sites using builders. Developing themes and plugins</div>
                        </div>
                    </div>
                    <div class="services__item service">
                        <div class="service__img">
                            <img src="assets/main/img/services/e-commerce.svg" alt="">
                        </div>
                        <div class="service__body">
                            <div class="service__title">E-commerce</div>
                            <div class="service__description">Сreating landing pages and online stores using Woocommerce or Laravel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-about">
        <h2 class="section__title title">About me</h2>
        <div class="section__body ">
            <div class="section__content about">
                <div class="about__me">
                    <img src="assets/main/img/about/me.png" alt="">
                    <div class="about__name">Name</div>
                    <div class="about__text">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section section-contact">
        <h2 class="section__title title">Contact</h2>
        <div class="section__body container">
            <div class="section__content contact">
                <p>More recently with desktop publishing software like Aldus PageMaker including versions of: 
                    <br><a href="">arwel239@gmail.com</a>   <a href="">+380999292922</a></p>
                <form action="#" class="contact__form contact-form">
                    <div class="contact-form__row">
                        <input type="text" name="name" id="name" placeholder="Name">
                        <input type="email" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="contact-form__row">
                        <input type="text" name="subject" id="subject" placeholder="Subject">
                    </div>
                    <div class="contact-form__row">
                        <textarea name="message" id="message" cols="30" rows="12" placeholder="Your message"></textarea>
                    </div>
                    <button type="submit" class="contact-form__submit button"><span class="icon"><img src="assets/main/img/icons/send.svg" alt=""></span>Send</button>
                </form>
                <div class="contact__social social">
                    <ul>
                        <li><a href="#" class="social__link"><img src="assets/main/img/contacts/email.svg" alt=""></a></li>
                        <li><a href="#" class="social__link"><img src="assets/main/img/contacts/phone.svg" alt=""></a></li>
                        <li><a href="#" class="social__link"><img src="assets/main/img/contacts/telegram.svg" alt=""></a></li>
                        <li><a href="#" class="social__link"><img src="assets/main/img/contacts/linkedin.svg" alt=""></a></li>
                        <li><a href="#" class="social__link"><img src="assets/main/img/contacts/behance.svg" alt=""></a></li>
                        <li><a href="#" class="social__link"><img src="assets/main/img/contacts/github.svg" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection