/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/application.js":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/assets/js/bootstrap.js");

$(function () {
    $('.selectpicker').selectpicker();
});

/***/ }),

/***/ "./resources/assets/js/bootstrap.js":
/***/ (function(module, exports) {

// Auto update layout
if (window.layoutHelpers) {
    window.layoutHelpers.setAutoUpdate(true);
}

$(function () {
    // Initialize sidenav
    $('#layout-sidenav').each(function () {
        new SideNav(this, {
            orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
        });
    });

    // Initialize sidenav togglers
    $('body').on('click', '.layout-sidenav-toggle', function (e) {
        e.preventDefault();
        window.layoutHelpers.toggleCollapsed();
    });

    // Swap dropdown menus in RTL mode
    if ($('html').attr('dir') === 'rtl') {
        $('#layout-navbar .dropdown-menu').toggleClass('dropdown-menu-right');
    }
});

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

// window.axios = require('axios');
//
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

// let token = document.head.querySelector('meta[name="csrf-token"]');
//
// if (token) {
//     window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// } else {
//     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
// }

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

/***/ }),

/***/ "./resources/assets/sass/application.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/animate-css/animate.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/blueimp-gallery/gallery-indicator.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/blueimp-gallery/gallery-video.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/blueimp-gallery/gallery.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-duallistbox/bootstrap-duallistbox.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-markdown/bootstrap-markdown.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-multiselect/bootstrap-multiselect.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-slider/bootstrap-slider.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-sortable/bootstrap-sortable.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/bootstrap-table.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/auto-refresh/auto-refresh.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/click-edit-row/click-edit-row.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/filter-control/filter-control.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/group-by-v2/group-by-v2.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/group-by/group-by.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/multiple-selection-row/multiple-selection-row.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/reorder-rows/reorder-rows.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/sticky-header/sticky-header.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/tree-column/tree-column.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-tagsinput/bootstrap-tagsinput.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-tour/bootstrap-tour.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/c3/c3.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/chartist/chartist.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/cropper/cropper.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/datatables/datatables.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/dragula/dragula.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/dropzone/dropzone.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/flot/flot.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/flow-js/flow.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/fullcalendar/fullcalendar.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/growl/growl.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/jstree/themes/default-dark/style.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/jstree/themes/default/style.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/ladda/ladda.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/minicolors/minicolors.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/morris/morris.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/nestable/nestable.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/nouislider/nouislider.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/photoswipe/photoswipe.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/plyr/plyr.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/quill/editor.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/quill/typography.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/select2/select2.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/smartwizard/smartwizard.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/spinkit/spinkit.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/swiper/swiper.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/timepicker/timepicker.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/toastr/toastr.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/typeahead-js/typeahead.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/libs/vegas/vegas.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/appwork.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/bootstrap.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/changes.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/colors.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/account.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/authentication.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/chat.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/clients.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/contacts.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/file-manager.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/messages.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/products.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/projects.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/search.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/tasks.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/tickets.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/pages/users.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/theme-corporate.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/vendor/sass/uikit.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/assets/js/application.js");
__webpack_require__("./resources/assets/vendor/sass/bootstrap.scss");
__webpack_require__("./resources/assets/vendor/sass/appwork.scss");
__webpack_require__("./resources/assets/vendor/sass/theme-corporate.scss");
__webpack_require__("./resources/assets/vendor/sass/colors.scss");
__webpack_require__("./resources/assets/vendor/sass/uikit.scss");
__webpack_require__("./resources/assets/vendor/sass/changes.scss");
__webpack_require__("./resources/assets/vendor/libs/animate-css/animate.scss");
__webpack_require__("./resources/assets/vendor/libs/blueimp-gallery/gallery-indicator.scss");
__webpack_require__("./resources/assets/vendor/libs/blueimp-gallery/gallery-video.scss");
__webpack_require__("./resources/assets/vendor/libs/blueimp-gallery/gallery.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-duallistbox/bootstrap-duallistbox.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-markdown/bootstrap-markdown.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-multiselect/bootstrap-multiselect.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-slider/bootstrap-slider.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-sortable/bootstrap-sortable.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-table/bootstrap-table.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-table/extensions/auto-refresh/auto-refresh.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-table/extensions/click-edit-row/click-edit-row.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-table/extensions/filter-control/filter-control.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-table/extensions/group-by-v2/group-by-v2.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-table/extensions/group-by/group-by.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-table/extensions/multiple-selection-row/multiple-selection-row.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-table/extensions/reorder-rows/reorder-rows.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-table/extensions/sticky-header/sticky-header.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-table/extensions/tree-column/tree-column.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-tagsinput/bootstrap-tagsinput.scss");
__webpack_require__("./resources/assets/vendor/libs/bootstrap-tour/bootstrap-tour.scss");
__webpack_require__("./resources/assets/vendor/libs/c3/c3.scss");
__webpack_require__("./resources/assets/vendor/libs/chartist/chartist.scss");
__webpack_require__("./resources/assets/vendor/libs/cropper/cropper.scss");
__webpack_require__("./resources/assets/vendor/libs/datatables/datatables.scss");
__webpack_require__("./resources/assets/vendor/libs/dragula/dragula.scss");
__webpack_require__("./resources/assets/vendor/libs/dropzone/dropzone.scss");
__webpack_require__("./resources/assets/vendor/libs/flot/flot.scss");
__webpack_require__("./resources/assets/vendor/libs/flow-js/flow.scss");
__webpack_require__("./resources/assets/vendor/libs/fullcalendar/fullcalendar.scss");
__webpack_require__("./resources/assets/vendor/libs/growl/growl.scss");
__webpack_require__("./resources/assets/vendor/libs/jstree/themes/default-dark/style.scss");
__webpack_require__("./resources/assets/vendor/libs/jstree/themes/default/style.scss");
__webpack_require__("./resources/assets/vendor/libs/ladda/ladda.scss");
__webpack_require__("./resources/assets/vendor/libs/minicolors/minicolors.scss");
__webpack_require__("./resources/assets/vendor/libs/morris/morris.scss");
__webpack_require__("./resources/assets/vendor/libs/nestable/nestable.scss");
__webpack_require__("./resources/assets/vendor/libs/nouislider/nouislider.scss");
__webpack_require__("./resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.scss");
__webpack_require__("./resources/assets/vendor/libs/photoswipe/photoswipe.scss");
__webpack_require__("./resources/assets/vendor/libs/plyr/plyr.scss");
__webpack_require__("./resources/assets/vendor/libs/quill/editor.scss");
__webpack_require__("./resources/assets/vendor/libs/quill/typography.scss");
__webpack_require__("./resources/assets/vendor/libs/select2/select2.scss");
__webpack_require__("./resources/assets/vendor/libs/smartwizard/smartwizard.scss");
__webpack_require__("./resources/assets/vendor/libs/spinkit/spinkit.scss");
__webpack_require__("./resources/assets/vendor/libs/swiper/swiper.scss");
__webpack_require__("./resources/assets/vendor/libs/timepicker/timepicker.scss");
__webpack_require__("./resources/assets/vendor/libs/toastr/toastr.scss");
__webpack_require__("./resources/assets/vendor/libs/typeahead-js/typeahead.scss");
__webpack_require__("./resources/assets/vendor/libs/vegas/vegas.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/account.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/authentication.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/chat.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/clients.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/contacts.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/file-manager.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/messages.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/products.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/projects.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/search.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/tasks.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/tickets.scss");
__webpack_require__("./resources/assets/vendor/sass/pages/users.scss");
module.exports = __webpack_require__("./resources/assets/sass/application.scss");


/***/ })

/******/ });