import isEmail from 'validator/lib/isEmail'

const defaultParams = {
    element: 'span',
    className: 'error',
    messages: {},
    onSubmit: () => { }
}

const messageFallback = 'Field is not valid';

class Validator {
    constructor(params) {
        for (let name in params) {
            this[name] = params[name];
        }

        for (let name in defaultParams) {
            if (!this[name]) {
                this[name] = defaultParams[name];
            }
        }

        if (!this.rules) {
            throw new Error("Can't initialize without validation rules");
        }

        this.form = document.querySelector(params.selector);
        
        if (this.form) {
            this.form.querySelectorAll('input, textarea').forEach(input => {
                if (input.name in this.rules) {
                    input.addEventListener('focusout', () => this.validateField(input));
                    input.addEventListener('input', () => {
                        input.hasAttribute('aria-invalid') && this.validateField(input);
                    });
                }
            });

            this.form.addEventListener('submit', (e) => {
                e.preventDefault();

                let isFormValid = true;

                for (let filed in this.rules) {
                    if (!this.validateField(this.form[filed])) {
                        isFormValid = false;
                    }
                }

                isFormValid && this.onSubmit(this.form);
            });
        }
    }

    static validation = {
        required: (str) => str.length > 0,
        min: (str, val) => str.length >= val,
        max: (str, val) => str.length <= val,
        email: (str) => isEmail(str)
    }

    static setValidationType = (fieldType, func) => Validator.validation[fieldType] = func;

    appendMessage = (input, text = messageFallback) => {
        if (!input.classList.contains(this.className)) {
            const msg = document.createElement(this.element);

            msg.textContent = text;
            msg.classList.add(this.className);
            msg.id = input.name + "-error";
            
            input.parentNode.appendChild(msg);
            input.classList.add(this.className);
            input.setAttribute('aria-invalid', true);

            return;
        }

        const msg = input.parentNode.querySelector(`#${input.name}-error`);
        msg.textContent = text;
    }

    removeMessage = (input) => {
        if (input.classList.contains(this.className)) {
            input.classList.remove(this.className);
            input.setAttribute('aria-invalid', false);
            input.parentNode.querySelector(`#${input.name}-error`).remove();
        }
    }

    isValid = (str, rules) => {
        let result = true;

        for (let fieldType in rules) {
            if (!(fieldType in Validator.validation)){
                throw new Error('There is no validation function for this field type: ' + fieldType);
            }

            if (rules[fieldType] && !Validator.validation[fieldType](str, rules[fieldType])) {
                result = fieldType;
                break;
            }
        }

        return result;
    }

    validateField = (input) => {
        let name = input.name;
        let result = this.isValid(input.value, this.rules[name]);

        if (result !== true) {
            this.appendMessage(input, this.messages[name][result])
            return false;
        }

        this.removeMessage(input);
        return true;
    }
}

export default Validator;