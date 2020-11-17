const rules = {
    name: {
        required: true,
        min: 2
    },
    email: {
        required: true,
        email: true,
    },
    subject: {
        required: true
    },
    message: {
        required: true
    }
}

const messages = {
    en: {
        name: {
            required: "Please specify your name"
        },
        email: {
            required: "Need your email address to contact you",
            email: "Your email address must be in the format of name@domain.com"
        },
        subject: {
            required: "Please specify subject",
        },
        message: {
            required: "Please write your message"
        }
    },
    ua: {
        name: {
            required: "Будь ласка, вкажіть ім'я"
        },
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
    ru: {
        name: {
            required: "Пожалуйста, укажите имя"
        },
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

export { rules, messages }