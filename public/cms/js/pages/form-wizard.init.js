/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************************!*\
  !*** ./resources/assets/js/pages/form-wizard.init.js ***!
  \*******************************************************/
$(document).ready(function () {
  $("#basic-pills-wizard").bootstrapWizard({
    tabClass: "nav nav-pills nav-justified"
  }), $("#progrss-wizard").bootstrapWizard({
    onTabShow: function onTabShow(a, r, i) {
      r = (i + 1) / r.find("li").length * 100;
      $("#progrss-wizard").find(".progress-bar").css({
        width: r + "%"
      });
    }
  });
});
var triggerTabList = [].slice.call(document.querySelectorAll(".twitter-bs-wizard-nav .nav-link"));
triggerTabList.forEach(function (a) {
  var r = new bootstrap.Tab(a);
  a.addEventListener("click", function (a) {
    a.preventDefault(), r.show();
  });
});
/******/ })()
;