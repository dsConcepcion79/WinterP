'use strict';

const ScrollMagic = require('scrollmagic');
const ScrollManager = require('../util/scroll-manager');

/**
 * The element selector
 * @type {string}
 */
const selector = '.mosaic';



class Mosaic_one {
  /**
   * Component constructor, sets initial state
   * @param el
   */
  constructor(el) {
    // Scroll animations
    const item = el.querySelector('.mosaic__inner');

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
      new Mosaic_one(el);
	  
    });
  }
}

module.exports = Mosaic_one;


