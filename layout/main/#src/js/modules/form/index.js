import Validator from '../validator';
import { rules, messages } from './config';
import makeRequest from '../helpers/makeRequest';

const printMessage = (form, status, text) => {
    const msg = document.createElement('div');

    msg.classList.add('contact-form__row', 'error');
    msg.innerHTML = `<span class="${status}">${text}</span></div>`;

    form.prepend(msg);

    setTimeout(() => {
        form.classList.remove('disabled');
        msg.remove();
    }, 6000);
}

const onSubmit = (form, locale) => {
    form.classList.add('disabled', 'processing');

    makeRequest(`${locale}/feedback`, {
        method: 'POST',
        body: new FormData(form)
    })
    .then(result => printMessage(form, result.status, result.message))
    .catch(() => form.classList.remove('disabled'))
    .finally(() => form.classList.remove('processing'));
}

export default () => {
    const locale = document.body.getAttribute('data-locale');

    new Validator({
        selector: '#feedback',
        rules: rules,
        messages: messages[locale],
        onSubmit: (form) => onSubmit(form, locale)
    });
}
