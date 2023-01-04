$(document).ready(function () {
    // DataTables
    $("#scroll-x-profil-kader").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 5, targets: 0 },
            { width: 105, targets: 1 },
            { width: 100, targets: 2 },
            { width: 100, targets: 3 },
            { width: 175, targets: 4 },
            { width: 140, targets: 5 },
            { width: 200, targets: 6 },
            { width: 70, targets: 7 },
            { width: 235, targets: 8 },
        ],
    });

    // tampilan daerah
    $("#scroll-x-daerah").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 5, targets: 0 },
            { width: 105, targets: 1 },
            { width: 395, targets: 2 },
            { width: 145, targets: 3 },
            { width: 60, targets: 4 },
        ],
    });
    // tampilan cabang
    $("#scroll-x-cabang").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 5, targets: 0 },
            { width: 105, targets: 1 },
            { width: 375, targets: 2 },
            { width: 145, targets: 3 },
            { width: 160, targets: 4 },
        ],
    });
    // tampilan ranting
    $("#scroll-x-ranting").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 5, targets: 0 },
            { width: 105, targets: 1 },
            { width: 375, targets: 2 },
            { width: 145, targets: 3 },
            { width: 215, targets: 4 },
            { width: 160, targets: 5 },
        ],
    });
    // tampilan ortom kader
    $("#scroll-x-ortom").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 5, targets: 0 },
            { width: 220, targets: 1 },
            { width: 425, targets: 2 },
            { width: 180, targets: 3 },
        ],
    });
    // tampilan potensi kader
    $("#scroll-x-potensi").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 5, targets: 0 },
            { width: 220, targets: 1 },
            { width: 425, targets: 2 },
            { width: 180, targets: 3 },
        ],
    });
    // tampilan ortom kader
    $("#scroll-x-ortom").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 5, targets: 0 },
            { width: 220, targets: 1 },
            { width: 425, targets: 2 },
            { width: 180, targets: 3 },
        ],
    });
    $("#scroll-x-tambah-admin-daerah").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 285, targets: 0 },
            { width: 100, targets: 1 },
        ],
    });
    $("#scroll-x-tambah-admin-cabang").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 285, targets: 0 },
            { width: 100, targets: 1 },
        ],
    });
    $("#scroll-x-tambah-admin-ranting").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 285, targets: 0 },
            { width: 100, targets: 1 },
        ],
    });
    $("#scroll-x-tambah-pimpinan-daerah").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 285, targets: 0 },
            { width: 100, targets: 1 },
        ],
    });
    $("#scroll-x-tambah-pimpinan-cabang").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 285, targets: 0 },
            { width: 100, targets: 1 },
        ],
    });
    $("#scroll-x-tambah-pimpinan-ranting").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 285, targets: 0 },
            { width: 100, targets: 1 },
        ],
    });

    // Summernote (editor)
    $("#summernote").summernote({
        toolbar: [
            // [groupName, [list of button]]
            ["style", ["bold", "italic", "underline"]],
            ["para", ["ul", "ol", "paragraph"]],
        ],
    });

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
