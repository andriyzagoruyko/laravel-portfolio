<section id="contact" class="section section-contact">
    <h2 class="section__title title">{{ __('main.title_contact') }}</h2>
    <div class="section__body">
        <div class="section__content contact">
            <p>{{ $infoLocalization->contact }}</p>
            <p>
                <a href="">{{ $infoLocalization->info->mail }}</a>  
                <a href="">{{ $infoLocalization->info->phone }}</a>
            </p>
            <form action="#" class="contact__form contact-form">
                <div class="contact-form__row">
                    <input type="text" name="name" id="name" placeholder="{{ __('main.contact_name') }}">
                    <input type="email" name="email" id="email" placeholder="{{ __('main.contact_email') }}">
                </div>
                <div class="contact-form__row">
                    <input type="text" name="subject" id="subject" placeholder="{{ __('main.contact_subject') }}">
                </div>
                <div class="contact-form__row">
                    <textarea name="message" id="message" cols="30" rows="12" placeholder="{{ __('main.contact_message') }}"></textarea>
                </div>
                <button type="submit" class="contact-form__submit button">
                    <span class="icon"><img src="/assets/main/img/icons/send.svg" alt=""></span>{{ __('main.button_send') }}
                </button>
            </form>
            <div class="contact__social social">
                <ul>
                    <li><a href="#" class="social__link"><img src="/assets/main/img/contacts/email.svg" alt=""></a></li>
                    <li><a href="#" class="social__link"><img src="/assets/main/img/contacts/phone.svg" alt=""></a></li>
                    <li><a href="#" class="social__link"><img src="/assets/main/img/contacts/telegram.svg" alt=""></a></li>
                    <li><a href="#" class="social__link"><img src="/assets/main/img/contacts/linkedin.svg" alt=""></a></li>
                    <li><a href="#" class="social__link"><img src="/assets/main/img/contacts/behance.svg" alt=""></a></li>
                    <li><a href="#" class="social__link"><img src="/assets/main/img/contacts/github.svg" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>