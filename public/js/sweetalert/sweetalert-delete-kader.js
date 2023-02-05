$(".delete").each(function (indexInArray, valueOfElement) {
    $(this).on("click", function (e) {
        e.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data kader!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, Kader tidak dapat login ke dalam sistem!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        swal({
                            title: "Berhasil!",
                            text: "Permintaan menghapus data kader berhasil!",
                            icon: "success",
                            buttons: false,
                            timer: 5000,
                        });
                        $(this).parent().submit();
                    } else {
                        swal("Data kader aman, tidak terhapus!");
                    }
                });
            } else {
                swal("Data kader aman, tidak terhapus!");
            }
        });
    });
});
