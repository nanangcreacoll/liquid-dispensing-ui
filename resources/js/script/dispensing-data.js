$(function () {

    let submit = false;
    let processToast = false;

    const ajaxSetup = () => {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
    };

    const showToast = (toastId) => {
        $(toastId).toast("show");
    };

    const hideToast = (toastId) => {
        $(toastId).toast("hide");
    };

    const handleDispensingStatus = (event) => {
        if (!event.status && submit) {
            $("#dispensingStartToastCloseButton").show();
            setTimeout(() => hideToast("#dispensingStartToast"), 3000);
            processToast = true;
            submit = false;
        } else if (event.status && processToast) {
            showToast("#dispensingFinishToast");
            setTimeout(() => {
                hideToast("#dispensingFinishToast");
                dispensingStoreData();
            }, 3000);
            processToast = false;
        }
    };

    const setupDispensingStatusListener = () => {
        window.Echo.channel("dispensing-status").listen("DispensingStatus", handleDispensingStatus);
    };

    const displayErrors = (errors) => {
        const response = JSON.parse(errors);
        let errorMessage = response.errors ? Object.values(response.errors).join("<br>") : "Error tidak diketahui.";
        $("#dispensingErrorMessage").html(errorMessage);
        showToast("#dispensingErrorToast");
    };

    const clearInputs = () => {
        $("#volume").val("");
        $("#capsule-qty").val("");
    };

    const dispensingStoreData = () => {
        let volume = parseInt($("#volume").val(), 10);
        let capsuleQty = parseInt($("#capsule-qty").val(), 10);

        ajaxSetup();

        $.ajax({
            url: $('meta[name="store-data-route"]').attr('content'),
            type: "POST",
            data: { volume, capsuleQty },
            success: (response) => {
                if (response.success) {
                    showToast("#dispensingSuccessToast");
                    setTimeout(() => hideToast("#dispensingSuccessToast"), 3000);
                } else {
                    console.error("Error menyimpan data dispensing:", response.error);
                    displayErrors(response.error);
                }
                clearInputs();
            },
            error: (xhr) => {
                console.error("Error menyimpan data:", xhr.responseText);
                displayErrors(xhr.responseText);
                clearInputs();
            },
        });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        submit = true;

        let volume = parseInt($("#volume").val(), 10);
        let capsuleQty = parseInt($("#capsule-qty").val(), 10);

        ajaxSetup();

        $.ajax({
            url: $('form[id="dispensingDataForm"]').attr("action"),
            type: "POST",
            data: { volume, capsuleQty },
            success: (response) => {
                if (response.success) {
                    dispensingStartToast();
                } else {
                    console.error("Error mengirim data dispensing:", response.error);
                    displayErrors(response.error);
                }
            },
            error: (xhr) => {
                console.error("Error mengirim data:", xhr.responseText);
                displayErrors(xhr.responseText);
            },
        });
    };

    const dispensingStartToast = () => {
        $("#dispensingStartToastCloseButton").hide();
        showToast("#dispensingStartToast");
        setupDispensingStatusListener();
    };

    $("#dispensingDataForm").on("submit", handleSubmit);
    $('#dataTable').DataTable();

});
