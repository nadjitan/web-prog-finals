var location = window.location;
var pathname = location.pathname;

if (pathname === "/store") {
    var currentId;

    modals();

    $(".dropdown-item").on("click", changeDropdownValue);

    $(".icon-search").on("click", function() {
        storeSearch();
    });

    $("#input-search").keypress(function(e) {
        if (e.which == 13) {
            storeSearch();
        }
    });

    /**
     * Search function for search bar
     *
     * @return void
     */
    function storeSearch() {
        const allStorePlaces = $(".container-store-item")
            .map(function() {
                return this;
            })
            .get();

        for (let i in allStorePlaces) {
            let origin = allStorePlaces[
                i
            ].firstElementChild.firstElementChild.firstElementChild.innerHTML
                .toLowerCase()
                .includes(
                    $("#input-search")
                        .val()
                        .toLowerCase()
                );
            let destination = allStorePlaces[
                i
            ].firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.innerHTML
                .toLowerCase()
                .includes(
                    $("#input-search")
                        .val()
                        .toLowerCase()
                );

            if (origin != "" || destination != "") {
                $(allStorePlaces[i]).show();
            } else {
                $(allStorePlaces[i]).hide();
            }
        }
    }

    /**
     * Function for modals
     *
     * @return void
     */
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

        // SHOW MODAL
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
                $(".show-price").html(
                    "₱ " + thousandsSeparators(response.price)
                );
            });
        });

        $(".btn-next").on("click", function() {
            if (currentLeft !== -minLeft) {
                $(`.circle-${currentStep}`).css({
                    "background-color": "#5d7589"
                }); // Previous step
                currentStep++;
                $(`.circle-${currentStep}`).css({
                    "background-color": "#f9a826"
                }); // Current step
                currentLeft -= minLeft;
                $(".container-container").animate(
                    { left: `${currentLeft}%` },
                    500
                ); // Step container animation
            }

            checkStep(currentStep, maxSteps);
            finishForm();
        });

        $(".btn-back").on("click", function() {
            if (currentLeft !== minLeft) {
                $(`.circle-${currentStep}`).css({
                    "background-color": "#5d7589"
                });
                currentStep--;
                $(`.circle-${currentStep}`).css({
                    "background-color": "#f9a826"
                });
                currentLeft += minLeft;
                $(".container-container").animate(
                    { left: `${currentLeft}%` },
                    500
                );
            }

            checkStep(currentStep, maxSteps);
            finishForm();
        });

        //#endregion Book modal effects
    }

    /**
     * Used for updating booking modal in the
     * store page
     *
     * @param {number} currentStep Current step in form
     * @param {number} maxSteps Max steps of form
     * @return void
     */
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

    /**
     * Update function for updating the booking modal
     *
     * @return void
     */
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
}
