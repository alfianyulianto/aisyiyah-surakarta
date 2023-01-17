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
    // tampilan potensi kader
    $("#scroll-x-potensi-kader").DataTable({
        scrollX: true,
        columnDefs: [
            { width: "2%", targets: 0 },
            { width: "30%", targets: 1 },
            { width: "45%", targets: 2 },
            { width: "20%", targets: 3 },
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
            { width: 285, targets: 0 },
            { width: 100, targets: 1 },
        ],
    });
    // tampilan tambah daerah di cabang
    $("#scroll-x-tambah-admin-cabang").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 285, targets: 0 },
            { width: 100, targets: 1 },
        ],
    });
    // tampilan tambah daerah di ranting
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
    $("#scroll-x-tambah-pimpinan-ranting-tampilan-admin-cabang").DataTable({
        scrollX: true,
    });
    $("#scroll-x-tmbah-admin").DataTable({
        scrollX: true,
        columnDefs: [
            { width: 5, targets: 0 },
            { width: 175, targets: 1 },
            { width: 115, targets: 2 },
            { width: 100, targets: 3 },
            { width: 100, targets: 4 },
            { width: 140, targets: 5 },
            { width: 90, targets: 6 },
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

    // autocomplete tempat_lahir
    function get_tempat_lahir() {
        return $.ajax({
            type: "get",
            url: "/tempat/lahir",
            dataType: "json",
            success: (response) => {
                response;
            },
        });
    }
    async function tempat_lahir() {
        let tempat_lahir = await get_tempat_lahir();
        let nama_kota = [];
        tempat_lahir.forEach((i) => {
            nama_kota.push(i.nama_kota);
        });
        autocomplete_tempat_lahir(nama_kota);
    }
    function autocomplete_tempat_lahir(nama_kota) {
        console.log(nama_kota);
        $("#tempat_lahir").autocomplete({
            lookup: nama_kota,
        });
    }
    tempat_lahir();

    // autocomplete periode
    function get_periode() {
        return $.ajax({
            type: "get",
            url: "/periode",
            dataType: "json",
            success: (response) => {
                response;
            },
        });
    }
    async function periode() {
        let periode = await get_periode();
        let tahun_periode = [];
        periode.forEach((i) => {
            tahun_periode.push(i.periode);
        });
        autocomplete_periode(tahun_periode);
    }
    function autocomplete_periode(tahun_periode) {
        console.log(tahun_periode);
        $("#periode").autocomplete({
            lookup: tahun_periode,
        });
    }
    periode();

    // autocomplete pekerjaan
    function get_pekerjaan() {
        return $.ajax({
            type: "get",
            url: "/pekerjaan",
            dataType: "json",
            success: (response) => {
                response;
            },
        });
    }
    async function pekerjaan() {
        let pekerjaan = await get_pekerjaan();
        let nama_pekerjaan = [];
        pekerjaan.forEach((i) => {
            nama_pekerjaan.push(i.nama_pekerjaan);
        });
        autocomplete_pekerjaan(nama_pekerjaan);
    }
    function autocomplete_pekerjaan(nama_pekerjaan) {
        console.log(nama_pekerjaan);
        $("#pekerjaan").autocomplete({
            lookup: nama_pekerjaan,
        });
    }
    pekerjaan();
});
