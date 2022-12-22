$(document).ready(function () {
    // DataTables
    $("#scroll-x").DataTable({
        scrollX: true,
    });

    // Select Option
    $("#kota").select2({
        placeholder: "Select an option",
    });
});
