$(document).ready(function () {
    // DataTables
    $("#scroll-x-kader-ortom").DataTable({
        scrollX: true,
        columnDefs: [
            { width: "2%", targets: 0 },
            { width: "40%", targets: 1 },
            { width: "58%", targets: 2 },
        ],
    });
    $("#scroll-x-kader-potensi").DataTable({
        scrollX: true,
        columnDefs: [
            { width: "2%", targets: 0 },
            { width: "40%", targets: 1 },
            { width: "58%", targets: 2 },
        ],
    });

    $("#scroll-x-kader-jabatan").DataTable({
        scrollX: true,
        columnDefs: [
            { width: "2%", targets: 0 },
            { width: "40%", targets: 1 },
            { width: "40%", targets: 2 },
            { width: "17%", targets: 3 },
        ],
    });

    $("#scroll-x-profil-kader").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 5, targets: 0 },
            { width: 105, targets: 1 },
            { width: 100, targets: 2 },
            { width: 100, targets: 3 },
            { width: 185, targets: 4 },
            { width: 135, targets: 5 },
            { width: 135, targets: 6 },
            { width: 170, targets: 7 },
            { width: 200, targets: 8 },
            { width: 70, targets: 9 },
            { width: 235, targets: 10 },
        ],
    });

    $("#scroll-x-data-jabatan").DataTable({
        scrollX: true,
        columnDefs: [
            { width: "2%", targets: 0 },
            { width: "63%", targets: 1 },
            { width: "35%", targets: 2 },
        ],
    });

    // tampilan daerah
    $("#scroll-x-daerah").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 150, targets: 0 },
            { width: 495, targets: 1 },
            { width: 145, targets: 2 },
            { width: 60, targets: 3 },
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
    // tampilan data potensi kader {admin}
    $("#scroll-x-data-potensi-kader").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 5, targets: 0 },
            { width: 105, targets: 1 },
            { width: 100, targets: 2 },
            { width: 100, targets: 3 },
            { width: 185, targets: 4 },
            { width: 135, targets: 5 },
            { width: 135, targets: 6 },
            { width: 175, targets: 7 },
            { width: 490, targets: 8 },
        ],
    });
    // tampilan setting ortom
    $("#scroll-x-ortom").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 240, targets: 0 },
            { width: 150, targets: 1 },
        ],
    });
    // tampilan setting potensi
    $("#scroll-x-potensi").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 240, targets: 0 },
            { width: 150, targets: 1 },
        ],
    });
    // tampilan setting tempatLahir
    $("#scroll-x-tempat_lahir").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 240, targets: 0 },
            { width: 150, targets: 1 },
        ],
    });
    // tampilan setting pekerjaan
    $("#scroll-x-pekerjaan").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 240, targets: 0 },
            { width: 150, targets: 1 },
        ],
    });
    // tampilan setting periode
    $("#scroll-x-periode").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 240, targets: 0 },
            { width: 150, targets: 1 },
        ],
    });
    // tampilan potensi kader
    $("#scroll-x-potensi-kader").DataTable({
        scrollX: true,
        columnDefs: [
            { width: "2%", targets: 0 },
            { width: "21%", targets: 1 },
            { width: "55%", targets: 2 },
            { width: "19%", targets: 3 },
        ],
    });
    // tampilan ortom kader
    $("#scroll-x-ortom-kader").DataTable({
        scrollX: true,
        columnDefs: [
            { width: "2%", targets: 0 },
            { width: "30%", targets: 1 },
            { width: "45%", targets: 2 },
            { width: "20%", targets: 3 },
        ],
    });
    // tampilan tambah daerah di admin
    $("#scroll-x-tambah-admin-daerah").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 250, targets: 0 },
            { width: 80, targets: 1 },
            { width: 100, targets: 2 },
        ],
    });
    // tampilan tambah daerah di cabang
    $("#scroll-x-tambah-admin-cabang").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 250, targets: 0 },
            { width: 80, targets: 1 },
            { width: 100, targets: 2 },
        ],
    });
    // tampilan tambah daerah di ranting
    $("#scroll-x-tambah-admin-ranting").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 250, targets: 0 },
            { width: 80, targets: 1 },
            { width: 100, targets: 2 },
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
    $("#scroll-x-tambah-pimpinan-ranting-tampilan-admin-cabang").DataTable({
        scrollX: true,
    });
    $("#scroll-x-tmbah-admin").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 5, targets: 0 },
            { width: 105, targets: 1 },
            { width: 100, targets: 2 },
            { width: 100, targets: 3 },
            { width: 175, targets: 4 },
            { width: 170, targets: 5 },
            { width: 60, targets: 6 },
            { width: 155, targets: 7 },
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

    // tambah admin
    $("#kader").on("change", function () {
        $.ajax({
            type: "get",
            url: "/get/kader/" + $(this).val(),
            dataType: "json",
            success: (response) => {
                $("#nik").val(response.nik);
                if (response.no_kta) {
                    $("#no_kta").val(response.no_kta);
                } else {
                    $("#no_kta").val("-");
                }
                if (response.no_ktm) {
                    $("#no_ktm").val(response.no_ktm);
                } else {
                    $("#no_ktm").val("-");
                }
                $("#nama").val(response.nama);
            },
        });
    });

    // combobox jika di ceklist
    $("#cek_alamat").on("change", function () {
        if ($("#cek_alamat:checked").val()) {
            $("div.alamat_domisili").addClass("d-none");
            // console.log(1);
            $("#cek_alamat:checked").val();
        } else {
            $("div.alamat_domisili").removeClass("d-none");
            // console.log(0);
            $("#cek_alamat:checked").val();
        }
    });
});
