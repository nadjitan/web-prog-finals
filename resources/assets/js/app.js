//require('./bootstrap');

document.addEventListener("DOMContentLoaded", theDomHasLoaded, false);
window.addEventListener("load", pageFullyLoaded, false);

var currentId;

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
    modals();
    $(".dropdown-item").on("click", changeDropdownValue);
}

function modals() {
    //#region Book modal effects
    const minLeft = parseInt(
        $(".container-container")
            .css("left")
            .replace("%", "")
    ); // Minimum left percentage

    const maxSteps = $("#steps-counter").attr("max");
    let currentLeft = minLeft; // Left percentage that changes based on what is pressed
    let currentStep = 1; // Current step the user is in

    checkStep(currentStep, maxSteps);

    $(`.circle-${currentStep}`).css({ "background-color": "#f9a826" });

    $(".exit-modal-book").on("click", function() {
        // Reset values
        currentLeft = minLeft;
        $(`.circle-${currentStep}`).css({ "background-color": "#5d7589" });
        currentStep = 1;
        $(`.circle-${currentStep}`).css({ "background-color": "#f9a826" });
        checkStep(currentStep, maxSteps);
        $(".container-container").animate({ left: `${minLeft}%` }, 500);
        $(".input-dropdown")
            .html("Select <div class='icon-expand'></div>")
            .css({ color: "rgb(199, 199, 199)" });
        $(".input-month-DB, .input-month-PI")
            .html("Month <div class='icon-expand'></div>")
            .css({ color: "rgb(199, 199, 199)" });

        // Animation for exit
        $(".container-bg").fadeOut(220);
        $(".container-modal").fadeOut(220);
    });

    $(".open-modal-book").on("click", function() {
        const height = $(window).height();
        let id = $(this).data("id"); // Get id from button
        currentId = id;
        let request = $.get("/store/" + id); // Get place object

        if (height > 768) {
            // Desktop view
            $(".container-bg").fadeIn(100, function() {
                $(".container-modal")
                    .css({ top: 0, opacity: 0, display: "grid" })
                    .animate({ top: 200, opacity: 1 }, 300);
            });
        } else {
            // Mobile view
            $(".container-bg").fadeIn(100, function() {
                $(".container-modal")
                    .fadeIn(220)
                    .css({ display: "grid" });
            });
        }

        $(".container-modal").css({ top: 0 });

        // $.ajax({
        //     type: "GET",
        //     url: url,
        //     success: function(place) {
        //         console.log(place);
        //     }
        // });

        request.done(function(response) {
            // Change html elements of book modal
            $(".show-origin").html(response.origin);
            $(".show-destination").html(response.destination);
            $(".show-price").html("₱ " + thousandsSeparators(response.price));
        });
    });

    $(".btn-next").on("click", function() {
        if (currentLeft !== -minLeft) {
            $(`.circle-${currentStep}`).css({ "background-color": "#5d7589" }); // Previous step
            currentStep++;
            $(`.circle-${currentStep}`).css({ "background-color": "#f9a826" }); // Current step
            currentLeft -= minLeft;
            $(".container-container").animate({ left: `${currentLeft}%` }, 500); // Step container animation
        }

        checkStep(currentStep, maxSteps);
        finishForm();
    });

    $(".btn-back").on("click", function() {
        if (currentLeft !== minLeft) {
            $(`.circle-${currentStep}`).css({ "background-color": "#5d7589" });
            currentStep--;
            $(`.circle-${currentStep}`).css({ "background-color": "#f9a826" });
            currentLeft += minLeft;
            $(".container-container").animate({ left: `${currentLeft}%` }, 500);
        }

        checkStep(currentStep, maxSteps);
        finishForm();
    });

    //#endregion Book modal effects
}

function checkStep(currentStep, maxSteps) {
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
}

function changeDropdownValue(event) {
    let buttonClicked = event.target;
    let selectedDropdownItem =
        buttonClicked.parentElement.previousElementSibling;

    $(selectedDropdownItem).css({ color: "black" });

    selectedDropdownItem.innerHTML =
        buttonClicked.innerHTML + "<div class='icon-expand'></div>";
}

function finishForm() {
    let origin = $(".show-origin")
        .html()
        .replace('<div class="icon-expand"></div>', "")
        .replace(/\s/g, "");
    let destination = $(".show-destination")
        .html()
        .replace('<div class="icon-expand"></div>', "")
        .replace(/\s/g, "");
    let price = $(".show-price")
        .html()
        .replace("₱ ", "")
        .replace(",", "");
    let nationality = $("#nationality-element")
        .html()
        .replace('<div class="icon-expand"></div>', "")
        .replace(/\s/g, "");
    let gender = $("#gender-element")
        .html()
        .replace('<div class="icon-expand"></div>', "")
        .replace(/\s/g, "");

    let dobMonth = $("#db-month-element")
        .html()
        .replace('<div class="icon-expand"></div>', "")
        .replace(/\s/g, "");
    let pedMonth = $("#pi-month-element")
        .html()
        .replace('<div class="icon-expand"></div>', "")
        .replace(/\s/g, "");
    let dateOfBirth =
        $("#input-day-DB").val() +
        " " +
        dobMonth +
        " " +
        $("#input-year-DB").val();
    let pportExpDate =
        $("#input-day-PI").val() +
        " " +
        pedMonth +
        " " +
        $("#input-year-PI").val();

    $("input[name ='origin']").val(origin);
    $("input[name ='destination']").val(destination);
    $("input[name ='price']").val(price);
    $("input[name ='nationality']").val(nationality);
    $("input[name ='gender']").val(gender);
    $("input[name ='date_of_birth']").val(dateOfBirth);
    $("input[name ='passport_expiry_date']").val(pportExpDate);
}

// Source: https://www.w3resource.com/javascript-exercises/javascript-math-exercise-39.php
function thousandsSeparators(num) {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
}
