$(function () {
    function dispensingStartToast() {
        $("#dispensingStartToastCloseButton").hide();
        $("#dispensingStartToast").toast("show");

        let processToast = false;

        window.Echo.channel("dispensing-status").listen(
            "DispensingStatus",
            (event) => {
                if (!event.status && !processToast) {
                    $("#dispensingStartToastCloseButton").show();
                    document
                        .getElementById("dispensingStartButton")
                        .classList.add("disabled");
                    setTimeout(function () {
                        $("#dispensingStartToast").toast("hide");
                    }, 3000);
                    processToast = true;
                } else if (event.status && processToast){
                    $("#dispensingStartToast").toast("hide");
                    $("#dispensingFinishToast").toast("show");
                    setTimeout(function () {
                        $("#dispensingFinishToast").toast("hide");
                    }, 3000);
                    document
                        .getElementById("dispensingStartButton")
                        .classList.remove("disabled");
                    processToast = false;
                }
            }
        );
    }

    function dispensingErrorToast(errors) {
        const response = JSON.parse(errors);

        let errorMessage = "";
        if (response.errors) {
            Object.keys(response.errors).forEach((field) => {
                errorMessage += response.errors[field] + "<br>";
            });
        } else {
            errorMessage = "Error tidak diketahui.";
        }

        document.getElementById("dispensingErrorMessage").innerHTML =
            errorMessage;

        $("#dispensingErrorToast").toast("show");
    }

    $("#dispensingDataForm").on("submit", function (e) {
        e.preventDefault();

        let volume = parseInt($("#volume").val(),10);
        let capsuleQty = parseInt($("#capsule-qty").val(),10);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: $('form[id="dispensingDataForm"]').attr("action"),
            type: "POST",
            data: {
                volume: volume,
                capsuleQty: capsuleQty,
            },
            success: function (response) {
                if (response.success) {
                    dispensingStartToast();
                } else {
                    console.error(
                        "Error mengirim data dispensing:",
                        response.error
                    );
                    dispensingErrorToast(response.error);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error mengirim data:", error);
                console.error(xhr.responseText);
                dispensingErrorToast(xhr.responseText);
            },
        });
    });
});
