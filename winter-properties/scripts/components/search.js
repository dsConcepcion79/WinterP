'use strict';

const Modal = require('./modal');

/**
 * The element selector
 * @type {string}
 */
const selector = '.global-search';

class Search extends Modal {
  /**
   * Component constructor, sets initial state
   * @param el
   */
  constructor(el) {
    super(el);

    // Elements
    this.el = el;
  }

  /**
   * Initializes all instances on a page
   */
  static init() {
    const modules = document.querySelectorAll(selector);

    modules.forEach((el) => {
      new Search(el);
    });
  }
}

module.exports = Search;
