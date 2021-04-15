'use strict';

const ScrollMagic = require('scrollmagic');
const ScrollManager = require('../util/scroll-manager');

/**
 * The element selector
 * @type {string}
 */
const selector = '.news-list';

class NewsList {
  /**
   * Component constructor, sets initial state
   * @param el
   */
  constructor(el) {
    // Scroll animations
    const items = el.querySelectorAll('.news-list__item');

    items.forEach((item) => {
      new ScrollMagic.Scene({
        triggerElement: item,
        triggerHook: 'onEnter'
      })
        .setClassToggle(item, 'active')
        .addTo(ScrollManager.controller);
    });
  }

  /**
   * Initializes all instances on a page
   */
  static init() {
    const modules = document.querySelectorAll(selector);

    modules.forEach((el) => {
      new NewsList(el);
    });
  }
}

module.exports = NewsList;
