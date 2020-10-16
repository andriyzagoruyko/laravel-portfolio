<section id="contact" class="section section-contact">
    <h2 class="section__title title">{{ __('main.title_contact') }}</h2>
    <div class="section__body">
        <div class="section__content contact">
            <p>{{ $info->localization->contact }}</p>
            <p>
                <a href="">{{ $info->mail }}</a>  
                <a href="">{{ $info->phone }}</a>
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
            <div class="contact__social social container">
                <ul>
                    @isset($info->mail)
                        <li>
                            <a href="mailto:{{ $info->mail }}" class="social__link" target="_blank">
                                <img src="/assets/main/img/contacts/email.svg" alt="">
                            </a>
                        </li>
                    @endisset

                    @isset($info->phone)
                        <li>
                            <a href="tel:{{ $info->phone }}" class="social__link" target="_blank">
                                <img src="/assets/main/img/contacts/phone.svg" alt="">
                            </a>
                        </li>
                    @endisset
                    
                    @isset($info->telegram)
                        <li>
                            <a href="https://t.me/{{ $info->telegram }}" class="social__link" target="_blank">
                                <img src="/assets/main/img/contacts/telegram.svg" alt="">
                            </a>
                        </li>
                    @endisset

                    @isset($info->linkedin)
                        <li>
                            <a href="https://linkedin.com/in/{{ $info->linkedin }}" class="social__link" target="_blank">
                                <img src="/assets/main/img/contacts/linkedin.svg" alt="">
                            </a>
                        </li>
                    @endisset

                    @isset($info->behance)
                        <li>
                            <a href="https://www.behance.net/{{ $info->behance }}" class="social__link" target="_blank">
                                <img src="/assets/main/img/contacts/behance.svg" alt="">
                            </a>
                        </li>
                    @endisset
                    
                    @isset($info->github)
                        <li>
                            <a href="https://github.com/{{ $info->github }}" class="social__link" target="_blank">
                                <img src="/assets/main/img/contacts/github.svg" alt="">
                            </a>
                        </li>
                    @endisset
                </ul>
            </div>
        </div>
    </div>
</section>