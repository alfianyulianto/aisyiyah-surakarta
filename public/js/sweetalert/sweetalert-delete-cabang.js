$(".delete").each(function (indexInArray, valueOfElement) {
    $(this).on("click", function (e) {
        e.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data cabang!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Berhasil!",
                    text: "Permintaan menghapus data cabang berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 5000,
                });
                $(this).parent().submit();
            } else {
                swal("Data cabang aman, tidak terhapus!");
            }
        });
    });
});
