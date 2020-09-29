'use strict';

/**
 * The element selector
 * @type {string}
 */
const selector = '.contact-form';

class ContactForm {
  /**
   * Component constructor, sets initial state
   * @param el
   */
  constructor(el) {
    this.el = el;
    this.submit = this.el.querySelector('.contact-form__submit');
    this.submitButton = this.el.querySelector('input[type="submit"]');

    // Bindings
    this.submitForm = this.submitForm.bind(this);

    // Listeners
    if (this.submit) {
      this.submit.addEventListener('click', this.submitForm);
    }
  }

  /**
   * Submits the form
   */
  submitForm() {
    this.submitButton.click();
  }

  /**
   * Initializes all instances on a page
   */
  static init() {
    const modules = document.querySelectorAll(selector);

    modules.forEach((el) => {
      new ContactForm(el);
    });
  }
}

module.exports = ContactForm;
