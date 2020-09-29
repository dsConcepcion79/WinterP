'use strict';

const ScrollMagic = require('scrollmagic');
const ScrollManager = require('../util/scroll-manager');

/**
 * The element selector
 * @type {string}
 */
const selector = '.page-links';

class PageLinks {
  /**
   * Component constructor, sets initial state
   * @param el
   */
  constructor(el) {
    // Scroll animations
    const item = el.querySelector('.page-links__items');

    new ScrollMagic.Scene({
      triggerElement: item,
      triggerHook: 'onEnter'
    })
      .setClassToggle(item, 'active')
      .addTo(ScrollManager.controller);
  }

  /**
   * Initializes all instances on a page
   */
  static init() {
    const modules = document.querySelectorAll(selector);

    modules.forEach((el) => {
      new PageLinks(el);
    });
  }
}

module.exports = PageLinks;
