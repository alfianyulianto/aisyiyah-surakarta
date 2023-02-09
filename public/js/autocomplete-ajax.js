$(document).ready(function () {
    // autocomplete tempat_lahir
    function get_tempat_lahir() {
        return $.ajax({
            type: "get",
            url: "/data/tempat/lahir",
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

    // autocomplete pekerjaan
    function get_pekerjaan() {
        return $.ajax({
            type: "get",
            url: "/data/pekerjaan",
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
});
