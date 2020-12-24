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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

//require('./bootstrap');
document.addEventListener("DOMContentLoaded", theDomHasLoaded, false);
window.addEventListener("load", pageFullyLoaded, false);

function theDomHasLoaded(e) {
  //#region Nav effects
  var previousScroll = 0;
  $(window).scroll(function () {
    var currentScroll = $(this).scrollTop();

    if (currentScroll > 0 && currentScroll < $(document).height() - $(window).height()) {
      if (currentScroll > previousScroll) {
        $(".main-navigation-scroll").slideUp(200);
        $("#nav-toggle").prop("checked", false);
      } else {
        $(".main-navigation-scroll").slideDown(200);
      }

      previousScroll = currentScroll;
    }
  }); //#endregion Nav effects
}

function pageFullyLoaded(e) {
  $(".icon-edit").on("click", profileEdit);
  $("input[name='age']").on("input", function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ""));
  });
  $(".btn-details").click(function () {
    $(".profile-details").show();
    $(".profile-purchases").hide();
    $(".btn-details").css({
      "z-index": 2,
      color: "black"
    });
    $(".btn-purchases").css({
      "z-index": 0,
      color: "gray"
    });
  });
  $(".btn-purchases").click(function () {
    $(".profile-details").hide();
    $(".profile-purchases").css("display", "grid");
    $(".btn-details").css({
      "z-index": 0,
      color: "gray"
    });
    $(".btn-purchases").css({
      "z-index": 2,
      color: "black"
    });
  });
}
/**
 * Function for edit button in profile page
 *
 * @param element HTML
 */


function profileEdit(event) {
  var buttonClicked = event.target;
  var input = buttonClicked.parentElement.nextElementSibling;
  $(input).removeAttr("readonly");
  $(input).css({
    "box-shadow": "0 0px 2.4px rgba(0, 0, 0, 0.07), 0 0px 8px rgba(0, 0, 0, 0.14)"
  });
  $("#save-profile-div").show();
}
/**
 * Function for custom dropdowns in forms
 *
 * @param {var} event Current element
 * @return void
 */


window.changeDropdownValue = function (event) {
  var buttonClicked = event.target;
  var selectedDropdownItem = buttonClicked.parentElement.previousElementSibling;
  $(selectedDropdownItem).css({
    color: "black"
  });
  selectedDropdownItem.innerHTML = buttonClicked.innerHTML + "<div class='icon-expand'></div>";
};
/**
 * Source: https://www.w3resource.com/javascript-exercises/javascript-math-exercise-39.php
 *
 * Function for seperating numbers
 *
 * @param {number} num Number to format
 * @return number
 */


window.thousandsSeparators = function (num) {
  var num_parts = num.toString().split(".");
  num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  return num_parts.join(".");
}; //module.exports = { changeDropdownValue, thousandsSeparators };


__webpack_require__(/*! ./store */ "./resources/assets/js/store.js");

/***/ }),

/***/ "./resources/assets/js/store.js":
/*!**************************************!*\
  !*** ./resources/assets/js/store.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var location = window.location;
var pathname = location.pathname;

if (pathname === "/store") {
  /**
   * Search function for search bar
   *
   * @return void
   */
  var storeSearch = function storeSearch() {
    var allStorePlaces = $(".container-store-item").map(function () {
      return this;
    }).get();

    for (var i in allStorePlaces) {
      var origin = allStorePlaces[i].firstElementChild.firstElementChild.firstElementChild.innerHTML.toLowerCase().includes($("#input-search").val());
      var destination = allStorePlaces[i].firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.innerHTML.toLowerCase().includes($("#input-search").val().toLowerCase());

      if (origin != "" || destination != "") {
        $(allStorePlaces[i]).show();
      } else {
        $(allStorePlaces[i]).hide();
      }
    }
  };
  /**
   * Function for modals
   *
   * @return void
   */


  var modals = function modals() {
    //#region Book modal effects
    var minLeft = parseInt($(".container-container").css("left").replace("%", "")); // Minimum left percentage

    var maxSteps = $("#steps-counter").attr("max");
    var currentLeft = minLeft; // Left percentage that changes based on what is pressed

    var currentStep = 1; // Current step the user is in

    checkStep(currentStep, maxSteps);
    $(".circle-".concat(currentStep)).css({
      "background-color": "#f9a826"
    });
    $(".exit-modal-book").on("click", function () {
      // Reset values
      currentLeft = minLeft;
      $(".circle-".concat(currentStep)).css({
        "background-color": "#5d7589"
      });
      currentStep = 1;
      $(".circle-".concat(currentStep)).css({
        "background-color": "#f9a826"
      });
      checkStep(currentStep, maxSteps);
      $(".container-container").animate({
        left: "".concat(minLeft, "%")
      }, 500);
      $(".input-dropdown").html("Select <div class='icon-expand'></div>").css({
        color: "rgb(199, 199, 199)"
      });
      $(".input-month-DB, .input-month-PI").html("Month <div class='icon-expand'></div>").css({
        color: "rgb(199, 199, 199)"
      }); // Animation for exit

      $(".container-bg").fadeOut(220);
      $(".container-modal").fadeOut(220);
    });
    $(".open-modal-book").on("click", function () {
      var height = $(window).height();
      var id = $(this).data("id"); // Get id from button

      currentId = id;
      var request = $.get("/store/" + id); // Get place object

      if (height > 768) {
        // Desktop view
        $(".container-bg").fadeIn(100, function () {
          $(".container-modal").css({
            top: 0,
            opacity: 0,
            display: "grid"
          }).animate({
            top: 200,
            opacity: 1
          }, 300);
        });
      } else {
        // Mobile view
        $(".container-bg").fadeIn(100, function () {
          $(".container-modal").fadeIn(220).css({
            display: "grid"
          });
        });
      }

      $(".container-modal").css({
        top: 0
      }); // $.ajax({
      //     type: "GET",
      //     url: url,
      //     success: function(place) {
      //         console.log(place);
      //     }
      // });

      request.done(function (response) {
        // Change html elements of book modal
        $(".show-origin").html(response.origin);
        $(".show-destination").html(response.destination);
        $(".show-price").html("₱ " + thousandsSeparators(response.price));
      });
    });
    $(".btn-next").on("click", function () {
      if (currentLeft !== -minLeft) {
        $(".circle-".concat(currentStep)).css({
          "background-color": "#5d7589"
        }); // Previous step

        currentStep++;
        $(".circle-".concat(currentStep)).css({
          "background-color": "#f9a826"
        }); // Current step

        currentLeft -= minLeft;
        $(".container-container").animate({
          left: "".concat(currentLeft, "%")
        }, 500); // Step container animation
      }

      checkStep(currentStep, maxSteps);
      finishForm();
    });
    $(".btn-back").on("click", function () {
      if (currentLeft !== minLeft) {
        $(".circle-".concat(currentStep)).css({
          "background-color": "#5d7589"
        });
        currentStep--;
        $(".circle-".concat(currentStep)).css({
          "background-color": "#f9a826"
        });
        currentLeft += minLeft;
        $(".container-container").animate({
          left: "".concat(currentLeft, "%")
        }, 500);
      }

      checkStep(currentStep, maxSteps);
      finishForm();
    }); //#endregion Book modal effects
  };
  /**
   * Used for updating booking modal in the
   * store page
   *
   * @param {number} currentStep Current step in form
   * @param {number} maxSteps Max steps of form
   * @return void
   */


  var checkStep = function checkStep(currentStep, maxSteps) {
    if (currentStep != 1) {
      $(".btn-back").css("visibility", "visible");
    } else {
      $(".btn-back").css("visibility", "hidden");
    }

    if (currentStep < maxSteps) {
      $(".btn-next").css("visibility", "visible");
    } else {
      $(".btn-next").css("visibility", "hidden");
    }
  };
  /**
   * Update function for updating the booking modal
   *
   * @return void
   */


  var finishForm = function finishForm() {
    var origin = $(".show-origin").html().replace('<div class="icon-expand"></div>', "").replace(/\s/g, "");
    var destination = $(".show-destination").html().replace('<div class="icon-expand"></div>', "").replace(/\s/g, "");
    var price = $(".show-price").html().replace("₱ ", "").replace(",", "");
    var nationality = $("#nationality-element").html().replace('<div class="icon-expand"></div>', "").replace(/\s/g, "");
    var gender = $("#gender-element").html().replace('<div class="icon-expand"></div>', "").replace(/\s/g, "");
    var dobMonth = $("#db-month-element").html().replace('<div class="icon-expand"></div>', "").replace(/\s/g, "");
    var pedMonth = $("#pi-month-element").html().replace('<div class="icon-expand"></div>', "").replace(/\s/g, "");
    var dateOfBirth = $("#input-day-DB").val() + " " + dobMonth + " " + $("#input-year-DB").val();
    var pportExpDate = $("#input-day-PI").val() + " " + pedMonth + " " + $("#input-year-PI").val();
    $("input[name ='origin']").val(origin);
    $("input[name ='destination']").val(destination);
    $("input[name ='price']").val(price);
    $("input[name ='nationality']").val(nationality);
    $("input[name ='gender']").val(gender);
    $("input[name ='date_of_birth']").val(dateOfBirth);
    $("input[name ='passport_expiry_date']").val(pportExpDate);
  };

  var currentId;
  modals();
  $(".dropdown-item").on("click", changeDropdownValue);
  $(".icon-search").on("click", function () {
    storeSearch();
  });
  $("#input-search").keypress(function (e) {
    if (e.which == 13) {
      storeSearch();
    }
  });
}

/***/ }),

/***/ "./resources/assets/sass/app.scss":
/*!****************************************!*\
  !*** ./resources/assets/sass/app.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************************!*\
  !*** multi ./resources/assets/js/app.js ./resources/assets/sass/app.scss ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\xampp\htdocs\web-prog-finals\resources\assets\js\app.js */"./resources/assets/js/app.js");
module.exports = __webpack_require__(/*! D:\xampp\htdocs\web-prog-finals\resources\assets\sass\app.scss */"./resources/assets/sass/app.scss");


/***/ })

/******/ });