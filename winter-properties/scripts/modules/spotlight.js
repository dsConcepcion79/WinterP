'use strict';

const { MAX_WIDTH_SM } = require('../util/constants');

/**
 * The element selector
 * @type {string}
 */
const selector = '.spotlight';

class Spotlight {
  /**
   * Component constructor, sets initial state
   * @param el
   */
  constructor(el) {
    // Elements
    this.el = el;
    this.items = el.querySelectorAll('.spotlight__slide');
    this.wrapper = el.querySelector('.spotlight__slides-wrapper');
    this.prev = el.querySelector('.spotlight__prev');
    this.next = el.querySelector('.spotlight__next');

    // State
    this.slideCount = this.items.length;
    this.activeSlide = 0;
    this.renderWidth = window.innerWidth;

    // Bindings
    this.getWrapperWidth = this.getWrapperWidth.bind(this);
    this.prevSlide = this.prevSlide.bind(this);
    this.nextSlide = this.nextSlide.bind(this);
    this.resize = this.resize.bind(this);
    this.setActiveSlide = this.setActiveSlide.bind(this);
    this.setWrapperWidth = this.setWrapperWidth.bind(this);

    // Listeners
    window.addEventListener('resize', this.resize, false);
    this.prev.addEventListener('click', this.prevSlide);
    this.next.addEventListener('click', this.nextSlide);
    this.wrapper.addEventListener('swiped-right', this.prevSlide);
    this.wrapper.addEventListener('swiped-left', this.nextSlide);

    // Initialize
    this.setWrapperWidth();
    this.setActiveSlide();
  }

  /**
   * Gets the wrapper width based on the viewport size
   * @returns {string}
   */
  getWrapperWidth() {
    if (this.renderWidth <= MAX_WIDTH_SM) {
      return `calc(${this.slideCount} * (100% + 16px))`;
    } else {
      return `calc(${this.slideCount} * 62%`;
    }
  }

  /**
   * Sets active slide to next slide
   */
  nextSlide() {
    const nextSlide = this.activeSlide + 1;

    this.activeSlide = nextSlide < this.slideCount ? nextSlide : 0;
    this.setActiveSlide();
  }

  /**
   * Sets active slide to previous slide
   */
  prevSlide() {
    const prevSlide = this.activeSlide - 1;

    this.activeSlide = prevSlide >= 0 ? prevSlide : this.slideCount - 1;
    this.setActiveSlide();
  }

  /**
   * Updates the component when viewport size changes
   */
  resize() {
    if (
      (this.renderWidth <= MAX_WIDTH_SM && window.innerWidth > MAX_WIDTH_SM) ||
      (this.renderWidth > MAX_WIDTH_SM && window.innerWidth <= MAX_WIDTH_SM)
    ) {
      this.renderWidth = window.innerWidth;
      this.setWrapperWidth();
      this.setActiveSlide();
    }
  }

  /**
   * Sets the active slide by transforming the wrapper
   */
  setActiveSlide() {
    this.wrapper.style.transform = `translateX(-${this.activeSlide *
      (100 / this.slideCount)}%)`;

    // Remove active class from all slides
    this.items.forEach((item) => {
      const link = item.querySelector('.spotlight__slide-link');

      if (link) {
        link.tabIndex = -1;
      }
      item.classList.remove('spotlight__slide--active');
    });

    // Add active class to activeSlide
    const activeSlide = this.items[this.activeSlide];
    const activeLink = activeSlide.querySelector('.spotlight__slide-link');

    if (activeLink) {
      activeLink.tabIndex = 0;
    }
    this.items[this.activeSlide].classList.add('spotlight__slide--active');
  }

  /**
   * Sets the wrapper width
   */
  setWrapperWidth() {
    this.wrapper.style.width = this.getWrapperWidth();
  }

  /**
   * Initializes all instances on a page
   */
  static init() {
    const modules = document.querySelectorAll(selector);

    modules.forEach((el) => {
      new Spotlight(el);
    });
  }
}

module.exports = Spotlight;
