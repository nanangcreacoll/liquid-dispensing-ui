window.Echo.channel("dispensing-status").listen(
    "DispensingStatus",
    (event) => {
        const statusCircle = document.getElementById("status-circle");

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