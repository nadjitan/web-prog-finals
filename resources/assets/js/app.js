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

    let currentLeft = minLeft; // Left percentage that changes based on what is pressed
    let currentStep = 1; // Current step the user is in

    $(`.circle-${currentStep}`).css({ "background-color": "#f9a826" });

    $(".exit-modal-book").on("click", function() {
        // Reset values
        currentLeft = minLeft;
        $(`.circle-${currentStep}`).css({ "background-color": "#5d7589" });
        currentStep = 1;
        $(`.circle-${currentStep}`).css({ "background-color": "#f9a826" });
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
    });

    $(".btn-back").on("click", function() {
        if (currentLeft !== minLeft) {
            $(`.circle-${currentStep}`).css({ "background-color": "#5d7589" });
            currentStep--;
            $(`.circle-${currentStep}`).css({ "background-color": "#f9a826" });
            currentLeft += minLeft;
            $(".container-container").animate({ left: `${currentLeft}%` }, 500);
        }
    });

    //#endregion Book modal effects
}

function changeDropdownValue(event) {
    let buttonClicked = event.target;
    let selectedDropdownItem =
        buttonClicked.parentElement.previousElementSibling;

    $(selectedDropdownItem).css({ color: "black" });

    selectedDropdownItem.innerHTML =
        buttonClicked.innerHTML + "<div class='icon-expand'></div>";
}

// Source: https://www.w3resource.com/javascript-exercises/javascript-math-exercise-39.php
function thousandsSeparators(num) {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
}
