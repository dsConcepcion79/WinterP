'use strict';

const ScrollMagic = require('scrollmagic');
const ScrollManager = require('../util/scroll-manager');

/**
 * The element selector
 * @type {string}
 */
const selector = '.team-list';

class TeamList {
  /**
   * Component constructor, sets initial state
   * @param el
   */
  constructor(el) {
    this.el = el;
    this.triggers = el.querySelectorAll('.team-list__learn-more');

    // Bindings
    this.toggleRegion = this.toggleRegion.bind(this);

    // Listeners
    this.triggers.forEach((trigger) => {
      trigger.addEventListener('click', () => this.toggleRegion(trigger));
    });

    // Scroll animations
    const items = el.querySelectorAll('.team-list__item');

    items.forEach((item) => {
      new ScrollMagic.Scene({
        triggerElement: item,
        triggerHook: 'onEnter'
      })
        .setClassToggle(item, 'active')
        .addTo(ScrollManager.controller);
    });
  }

  toggleRegion(trigger) {
    const regionId = trigger.getAttribute('aria-controls');
    const region = this.el.querySelector(`#${regionId}`);
    const expanded = trigger.getAttribute('aria-expanded');

    // Open this region
    trigger.setAttribute(
      'aria-expanded',
      expanded === 'false' ? 'true' : 'false'
    );
    region.classList.toggle('team-list__body--expanded');
    trigger.textContent = expanded === 'false' ? 'Show less' : 'Learn more';
  }

  /**
   * Initializes all instances on a page
   */
  static init() {
    const modules = document.querySelectorAll(selector);

    modules.forEach((el) => {
      new TeamList(el);
    });
  }
}

module.exports = TeamList;
