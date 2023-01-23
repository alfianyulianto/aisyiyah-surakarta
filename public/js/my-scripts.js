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
        let nama_tempat_lahir = [];
        tempat_lahir.forEach((i) => {
            nama_tempat_lahir.push(i.tempat_lahir);
        });
        autocomplete_tempat_lahir(nama_tempat_lahir);
    }
    function autocomplete_tempat_lahir(nama_tempat_lahir) {
        console.log(nama_tempat_lahir);
        $("#tempat_lahir").autocomplete({
            lookup: nama_tempat_lahir,
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
            nama_pekerjaan.push(i.pekerjaan);
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

    // select cabang
    $("select#cabang_id_cabang").on("change", function () {
        let id_cabang = $(this).val();
        $.ajax({
            type: "get",
            url: "/get/ranting/" + id_cabang,
            dataType: "json",
            success: (response) => {
                console.log(response);
                let ranting =
                    "<option selected disabled>-- Pilih Ranting --</option>";
                response.forEach((i) => {
                    ranting += `<option value="${i.ranting}">${i.nama_ranting}</option>`;
                });
                $("select#ranting_id_ranting").html(ranting);
            },
        });
    });

    // alamat ktp
    $("#provinsi_ktp").on("change", function () {
        let id_provinsi = $(this).val();
        $.ajax({
            type: "get",
            url: "/data/kota/kabupaten/",
            data: {
                id: id_provinsi,
            },
            dataType: "json",
            success: (response) => {
                console.log(response);
                let tag_provinsi =
                    "<option selected disabled>-- Pilih Kabupaten/Kota --</option>";
                let kota_kabupaten = response.kota_kabupaten;
                kota_kabupaten.forEach((i) => {
                    tag_provinsi += `<option value="${i.id}">${i.nama}</option>`;
                });
                $("#kabupaten_kota_ktp").html(tag_provinsi);
            },
        });
    });
    $("#kabupaten_kota_ktp").on("change", function () {
        let id_kabupaten_kota = $(this).val();

        $.ajax({
            type: "get",
            url: "/data/kecamatan/",
            data: {
                id: id_kabupaten_kota,
            },
            dataType: "json",
            success: (response) => {
                console.log(response);
                let tag_kecamatan =
                    "<option selected disabled>-- Pilih Kecamatan --</option>";
                let kecamatan = response.kecamatan;
                kecamatan.forEach((i) => {
                    tag_kecamatan += `<option value="${i.id}">${i.nama}</option>`;
                });
                $("#kecamatan_ktp").html(tag_kecamatan);
            },
        });
    });
    $("#kecamatan_ktp").on("change", function () {
        let id_kecamatan = $(this).val();

        $.ajax({
            type: "get",
            url: "/data/kelurahan/",
            data: {
                id: id_kecamatan,
            },
            dataType: "json",
            success: (response) => {
                console.log(response);
                let tag_kelurahan =
                    "<option selected disabled>-- Pilih Kelurahan --</option>";
                let kelurahan = response.kelurahan;
                kelurahan.forEach((i) => {
                    tag_kelurahan += `<option value="${i.id}">${i.nama}</option>`;
                });
                $("#kelurahan_ktp").html(tag_kelurahan);
            },
        });
    });

    // alamat domisili
    $("#provinsi_domisili").on("change", function () {
        let id_provinsi = $(this).val();
        $.ajax({
            type: "get",
            url: "/data/kota/kabupaten/",
            data: {
                id: id_provinsi,
            },
            dataType: "json",
            success: (response) => {
                console.log(response);
                let tag_provinsi =
                    "<option selected disabled>-- Pilih Kabupaten/Kota --</option>";
                let kota_kabupaten = response.kota_kabupaten;
                kota_kabupaten.forEach((i) => {
                    tag_provinsi += `<option value="${i.id}">${i.nama}</option>`;
                });
                $("#kabupaten_kota_domisili").html(tag_provinsi);
            },
        });
    });
    $("#kabupaten_kota_domisili").on("change", function () {
        let id_kabupaten_kota = $(this).val();

        $.ajax({
            type: "get",
            url: "/data/kecamatan/",
            data: {
                id: id_kabupaten_kota,
            },
            dataType: "json",
            success: (response) => {
                console.log(response);
                let tag_kecamatan =
                    "<option selected disabled>-- Pilih Kecamatan --</option>";
                let kecamatan = response.kecamatan;
                kecamatan.forEach((i) => {
                    tag_kecamatan += `<option value="${i.id}">${i.nama}</option>`;
                });
                $("#kecamatan_domisili").html(tag_kecamatan);
            },
        });
    });
    $("#kecamatan_domisili").on("change", function () {
        let id_kecamatan = $(this).val();

        $.ajax({
            type: "get",
            url: "/data/kelurahan/",
            data: {
                id: id_kecamatan,
            },
            dataType: "json",
            success: (response) => {
                console.log(response);
                let tag_kelurahan =
                    "<option selected disabled>-- Pilih Kelurahan --</option>";
                let kelurahan = response.kelurahan;
                kelurahan.forEach((i) => {
                    tag_kelurahan += `<option value="${i.id}">${i.nama}</option>`;
                });
                $("#kelurahan_domisili").html(tag_kelurahan);
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
