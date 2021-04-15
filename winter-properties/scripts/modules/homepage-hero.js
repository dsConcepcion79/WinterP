'use strict';

/**
 * Var to hold the slide timer
 */
let heroTimer;

/**
 * Var to hold the loading bar
 */
let loadingTimer;

/**
 * Slide interval timeout
 * @type {number}
 */
const heroTimeout = 8000;

/**
 * The element selector
 * @type {string}
 */
const selector = '.homepage-hero';

class HomepageHero {
  /**
   * Component constructor, sets initial state
   * @param el
   */
  constructor(el) {
    // Elements
    this.el = el;
    this.items = el.querySelectorAll('.homepage-hero__slide');
    this.cards = el.querySelectorAll('.homepage-hero__card');
    this.wrapper = el.querySelector('.homepage-hero__slides-wrapper');
    this.loading = el.querySelector('.homepage-hero__timer-bar');
    this.prev = el.querySelector('.homepage-hero__prev');
    this.next = el.querySelector('.homepage-hero__next');

    // State
    this.slideCount = this.items.length;
    this.activeSlide = 0;
    this.loadingPercent = 0;

    // Bindings
    this.clearTimers = this.clearTimers.bind(this);
    this.prevSlide = this.prevSlide.bind(this);
    this.nextSlide = this.nextSlide.bind(this);
    this.setActiveSlide = this.setActiveSlide.bind(this);
    this.setLoadingPercent = this.setLoadingPercent.bind(this);

    // Listeners
    this.prev.addEventListener('click', () => {
      this.prevSlide();
      this.clearTimers();
    });
    this.next.addEventListener('click', () => {
      this.nextSlide();
      this.clearTimers();
    });
    this.wrapper.addEventListener('swiped-right', () => {
      this.prevSlide();
      this.clearTimers();
    });
    this.wrapper.addEventListener('swiped-left', () => {
      this.nextSlide();
      this.clearTimers();
    });

    // Initialize
    this.setActiveSlide();
    document.body.classList.add('body--inverted');
    heroTimer = setInterval(this.nextSlide, heroTimeout);
    loadingTimer = setInterval(this.setLoadingPercent, heroTimeout / 100);
  }

  /**
   * Clears the auto play timers
   */
  clearTimers() {
    clearInterval(heroTimer);
    clearInterval(loadingTimer);
    this.loadingPercent = 0;
    this.loading.style.width = `${this.loadingPercent}%`;
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
    this.wrapper.style.transform = `translateX(-${this.activeSlide * 100}%)`;

    // Remove active class from all slides
    this.items.forEach((item) => {
      item.classList.remove('homepage-hero__slide--active');
    });
    this.cards.forEach((card) => {
      card.classList.remove('homepage-hero__card--active');
    });

    this.items[this.activeSlide].classList.add('homepage-hero__slide--active');
    this.cards[this.activeSlide].classList.add('homepage-hero__card--active');

    // Reset loading percentage
    this.loadingPercent = 0;
  }

  /**
   * Sets the loading percent for the timer
   */
  setLoadingPercent() {
    if (this.loadingPercent < 100) {
      this.loadingPercent++;
    }
    this.loading.style.width = `${this.loadingPercent}%`;
  }

  /**
   * Initializes all instances on a page
   */
  static init() {
    const modules = document.querySelectorAll(selector);

    modules.forEach((el) => {
      new HomepageHero(el);
    });
  }
}

module.exports = HomepageHero;
