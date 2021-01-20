//require('./bootstrap');

document.addEventListener("DOMContentLoaded", theDomHasLoaded, false);
window.addEventListener("load", pageFullyLoaded, false);

function theDomHasLoaded(e) {
    //#region Nav effects
    let previousScroll = 0;

    $(window).scroll(function() {
        let currentScroll = $(this).scrollTop();

        if (
            currentScroll > 0 &&
            currentScroll < $(document).height() - $(window).height()
        ) {
            if (currentScroll > previousScroll) {
                $(".main-navigation-scroll").slideUp(200);

                $("#nav-toggle").prop("checked", false);
            } else {
                $(".main-navigation-scroll").slideDown(200);
            }
            previousScroll = currentScroll;
        }
    });
    //#endregion Nav effects
}

function pageFullyLoaded(e) {
    $(".icon-edit").on("click", profileEdit);

    $("input[name='age']").on("input", function(e) {
        $(this).val(
            $(this)
                .val()
                .replace(/[^0-9]/g, "")
        );
    });

    $(".btn-details").click(() => {
        $(".profile-details").show();
        $(".profile-purchases").hide();
        $(".btn-details").css({ "z-index": 2, color: "black" });
        $(".btn-purchases").css({ "z-index": 0, color: "gray" });
    });

    $(".btn-purchases").click(() => {
        $(".profile-details").hide();
        $(".profile-purchases").css("display", "grid");
        $(".btn-details").css({ "z-index": 0, color: "gray" });
        $(".btn-purchases").css({ "z-index": 2, color: "black" });
    });

    $(".btn-about-agila").click(() => {
        $(".btn-about-agila").css({
            color: "white",
            "border-bottom": "3px solid white"
        });

        $(".btn-about-the-creators").css({
            color: "rgba(255, 255, 255, 0.452)",
            "border-bottom": "none"
        });

        $(".au-paragraph").css({ display: "grid" });
        $(".au-creators").css({ display: "none" });
    });

    $(".btn-about-the-creators").click(() => {
        $(".btn-about-agila").css({
            color: "rgba(255, 255, 255, 0.452)",
            "border-bottom": "none"
        });

        $(".btn-about-the-creators").css({
            color: "white",
            "border-bottom": "3px solid white"
        });

        $(".au-paragraph").css({ display: "none" });
        $(".au-creators").css({ display: "grid" });
    });
}

/**
 * Function for edit button in profile page
 *
 * @param element HTML
 */
function profileEdit(event) {
    const buttonClicked = event.target;
    const input = buttonClicked.parentElement.nextElementSibling;

    $(input).removeAttr("readonly");
    $(input).css({
        "box-shadow":
            "0 0px 2.4px rgba(0, 0, 0, 0.07), 0 0px 8px rgba(0, 0, 0, 0.14)"
    });

    $("#save-profile-div").show();
}

/**
 * Function for custom dropdowns in forms
 *
 * @param {var} event Current element
 * @return void
 */
window.changeDropdownValue = function(event) {
    let buttonClicked = event.target;
    let selectedDropdownItem =
        buttonClicked.parentElement.previousElementSibling;

    $(selectedDropdownItem).css({ color: "black" });

    selectedDropdownItem.innerHTML =
        buttonClicked.innerHTML + "<div class='icon-expand'></div>";
};

/**
 * Source: https://www.w3resource.com/javascript-exercises/javascript-math-exercise-39.php
 *
 * Function for seperating numbers
 *
 * @param {number} num Number to format
 * @return number
 */
window.thousandsSeparators = function(num) {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
};

//module.exports = { changeDropdownValue, thousandsSeparators };

require("./store");
