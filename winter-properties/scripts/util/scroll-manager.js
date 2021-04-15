'use strict';

const ScrollMagic = require('scrollmagic');

class ScrollManager {
  /**
   * Creates internal ScrollMagic controller
   */
  constructor() {
    if (typeof window !== 'undefined') {
      this.controller = new ScrollMagic.Controller();
    }
  }
}

module.exports = new ScrollManager();
