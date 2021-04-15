'use strict';

const ScrollMagic = require('scrollmagic');
const ScrollManager = require('../util/scroll-manager');

/**
 * The element selector
 * @type {string}
 */
const selector = '.hero';

class Hero {
  /**
   * Component constructor, sets initial state
   * @param el
   */
  constructor(el) {
    // Scroll animations
    new ScrollMagic.Scene({
      triggerElement: el,
      triggerHook: 'onEnter'
    })
      .setClassToggle(el, 'active')
      .addTo(ScrollManager.controller);
  }

  /**
   * Initializes all instances on a page
   */
  static init() {
    const modules = document.querySelectorAll(selector);

    modules.forEach((el) => {
      new Hero(el);
    });
  }
}

module.exports = Hero;
