/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************************!*\
  !*** ./resources/assets/js/pages/coming-soon.init.js ***!
  \*******************************************************/
var previewThumbsnav = new Swiper(".preview-thumbsnav", {
  spaceBetween: 14,
  slidesPerView: 3,
  freeMode: !1,
  watchSlidesVisibility: !0,
  watchSlidesProgress: !0
}),
    galleryThumbs = new Swiper(".preview-thumb", {
  spaceBetween: 0,
  thumbs: {
    swiper: previewThumbsnav
  }
});
$("[data-countdown]").each(function () {
  var i = $(this),
      s = $(this).data("countdown");
  i.countdown(s, function (i) {
    $(this).html(i.strftime('<div class="coming-box"><div class="count-title">Days</div><div class="count-num">%D</div></div> <div class="coming-box"><div class="count-title">Hours</div><div class="count-num">%H</div></div> <div class="coming-box"><div class="count-title">Minutes</div><div class="count-num">%M</div></div> <div class="coming-box"><div class="count-title">Seconds</div><div class="count-num">%S</div></div> '));
  });
});
/******/ })()
;