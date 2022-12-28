$(document).ready(function () {
    // DataTables
    $("#scroll-x").DataTable({
        scrollX: true,
    });

    // Select2
    // $("#kota").select2({
    //     placeholder: "Select an option",
    // });
    // $("#ortom").select2({
    //     placeholder: "Select an option",
    // });

    // Summernote (editor)
    $("#summernote").summernote("insertUnorderedList");

    // change password
    var password_baru = "";
    //jika input password_baru berubah
    $("#password_baru").on("change", function () {
        // ambil nilai
        password_baru = $("#password_baru").val();
    });
    // jika input konfirmasi_password focus
    $("#konfirmasi_password").on("focus", function () {
        password_baru = $("#password_baru").val();
        $("#matches").removeClass("d-none");
        $("#laravel-error").addClass("d-none");
        // ambil nilai konfirmasi_password
        var konfirmasi_password = $("#konfirmasi_password").val();
        // cek apakah kedua input sama
        if (password_baru === konfirmasi_password) {
            $("#konfirmasi_password").addClass("is-valid");
            $("#konfirmasi_password").removeClass("is-invalid");
        } else {
            $("#konfirmasi_password").addClass("is-invalid");
            $("#konfirmasi_password").removeClass("is-valid");
        }
    });
    // jika input konfirmasi_password keyup
    $("#konfirmasi_password").on("keyup", function () {
        // ambil nilai
        var konfirmasi_password = $("#konfirmasi_password").val();
        // cek apakah kedua input sama
        if (password_baru === konfirmasi_password) {
            $("#konfirmasi_password").removeClass("is-invalid");
            $("#konfirmasi_password").addClass("is-valid");
        } else {
            $("#konfirmasi_password").removeClass("is-valid");
            $("#konfirmasi_password").addClass("is-invalid");
        }
    });
});
