'use strict';

const ScrollMagic = require('scrollmagic');
const ScrollManager = require('../util/scroll-manager');

/**
 * The element selector
 * @type {string}
 */
const selector = '.global-header';

class Header {
  /**
   * Component constructor, sets initial state
   * @param el
   */
  constructor() {
    new ScrollMagic.Scene({
      offset: 720
    })
      .setClassToggle('body', 'body--pinned')
      .addTo(ScrollManager.controller);
  }

  /**
   * Initializes all instances on a page
   */
  static init() {
    const modules = document.querySelectorAll(selector);

    modules.forEach((el) => {
      new Header();
    });
  }
}

module.exports = Header;
