$(function () {
    let dispensingStatusSession = $(
        'meta[name="dispensing-status-session"]'
    ).attr("content");

    const statusCircle = document.getElementById("status-circle");

    if (dispensingStatusSession === "true") {
        statusCircle.classList.remove("bg-danger");
        statusCircle.classList.add("bg-success");
        document
            .getElementById("dispensingStartButton")
            .classList.remove("disabled");
    } else if (dispensingStatusSession === "false") {
        statusCircle.classList.remove("bg-success");
        statusCircle.classList.add("bg-danger");
        document
            .getElementById("dispensingStartButton")
            .classList.add("disabled");
    }

    window.Echo.channel("dispensing-status").listen(
        "DispensingStatus",
        (event) => {
            if (event.status) {
                statusCircle.classList.remove("bg-danger");
                statusCircle.classList.add("bg-success");
                document
                    .getElementById("dispensingStartButton")
                    .classList.remove("disabled");
            } else {
                statusCircle.classList.remove("bg-success");
                statusCircle.classList.add("bg-danger");
                document
                    .getElementById("dispensingStartButton")
                    .classList.add("disabled");
            }
        }
    );
});
