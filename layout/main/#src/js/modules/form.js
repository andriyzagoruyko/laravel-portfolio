import $ from 'jquery';
import 'jquery-validation';

export default () => {
    const messages = {
        "en": {
            name: "Please specify your name",
            email: {
                required: "Need your email address to contact you",
                email: "Your email address must be in the format of name@domain.com"
            },
            subject: {
                required: "Please specify subject",
            },
            message: {
                required: "Please write your message",
            }
        },
        "ua": {
            name: "Будь ласка, вкажіть ім'я",
            email: {
                required: "Будь ласка, вкажіть email",
                email: "Електронна адреса повинна бути правильного формату name@domain.com"
            },
            subject: {
                required: "Будь ласка, вкажіть тему повідомлення",
            },
            message: {
                required: "Будь ласка, напишіть повідомлення",
            }
        },
        "ru": {
            name: "Пожалуйста, укажите имя",
            email: {
                required: "Нужен Ваш email для связи",
                email: "Электронная почта должна быть правильного формата name@domain.com"
            },
            subject: {
                required: "Пожалуйста, укажите тему сообщения",
            },
            message: {
                required: "Пожалуйста, напишите сообщение",
            }
        }
    }

    const $form = $('#feedback');
    const locale = $('body').attr('data-locale');

    $form.on("submit", e => e.preventDefault());
    
    $form.validate({
        errorElement: "span",
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            subject: {
                required: true
            },
            message: {
                required: true
            }
        },
        messages: messages[locale],

        submitHandler: () => {
            $data = $form.serialize();
            $.ajax({
                type: 'POST',
                url: '/' + locale + '/feedback',
                data: $data,
                dataType: 'json',
                success: (response) => {
                    $form.prepend('<div class="contact-form__row"><span class="' + response.status + '">' + response.message + '</span></div>')
                        .addClass('disabled')
                },
            });
        }
    });
}
