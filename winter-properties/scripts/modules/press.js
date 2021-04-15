'use strict';

/**
 * Var to hold the slide timer
 */
let pressTimer;

/**
 * Slide interval timeout
 * @type {number}
 */
const pressTimeout = 5000;

/**
 * The element selector
 * @type {string}
 */
const selector = '.press';

class Press {
  /**
   * Component constructor, sets initial state
   * @param el
   */
  constructor(el) {
    // Elements
    this.el = el;
    this.items = el.querySelectorAll('.press__slide');
    this.wrapper = el.querySelector('.press__slides');
    this.navItems = el.querySelectorAll('.press__nav-item');

    // State
    this.slideCount = this.items.length;
    this.activeSlide = 0;

    // Bindings
    this.prevSlide = this.prevSlide.bind(this);
    this.nextSlide = this.nextSlide.bind(this);
    this.setActiveSlide = this.setActiveSlide.bind(this);

    // Listeners
    this.wrapper.addEventListener('swiped-right', this.prevSlide);
    this.wrapper.addEventListener('swiped-left', this.nextSlide);

    // Initialize
    this.setActiveSlide();
    pressTimer = setInterval(this.nextSlide, pressTimeout);
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
   * Sets the active slide by transforming the wrapper
   */
  setActiveSlide() {
    // Remove active class from all slides
    this.items.forEach((item) => {
      const link = item.querySelector('.press__link');

      if (link) {
        link.tabIndex = -1;
      }
      item.classList.remove('press__slide--active');
    });

    // Remove active class from all buttons
    this.navItems.forEach((item) => {
      item.classList.remove('press__nav-item--active');
    });

    // Add active class to activeSlide
    const activeSlide = this.items[this.activeSlide];
    const activeLink = activeSlide.querySelector('.press__link');

    activeLink.tabIndex = 0;
    this.items[this.activeSlide].classList.add('press__slide--active');
    this.navItems[this.activeSlide].classList.add('press__nav-item--active');
  }

  /**
   * Initializes all instances on a page
   */
  static init() {
    const modules = document.querySelectorAll(selector);

    modules.forEach((el) => {
      new Press(el);
    });
  }
}

module.exports = Press;
