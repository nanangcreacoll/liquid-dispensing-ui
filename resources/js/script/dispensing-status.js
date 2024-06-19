$(function () {
    const dispensingStatusSession = $('meta[name="dispensing-status-session"]').attr("content");
    const statusCircle = document.getElementById("status-circle");
    const dispensingStartButton = document.getElementById("dispensingStartButton");

    function updateStatus(dispensing) {
        statusCircle.classList.toggle("bg-danger", !dispensing);
        statusCircle.classList.toggle("bg-success", dispensing);
        dispensingStartButton.classList.toggle("disabled", !dispensing);
    }

    updateStatus(dispensingStatusSession === "true");

    window.Echo.channel("dispensing-status").listen("DispensingStatus", (event) => {
        updateStatus(event.status);
    });
});
