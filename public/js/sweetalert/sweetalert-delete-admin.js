$(".delete-daerah").each(function (indexInArray, valueOfElement) {
    $(this).on("click", function (e) {
        e.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data admin daerah!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Berhasil!",
                    text: "Permintaan menghapus data admin daerah berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 5000,
                });
                $(this).parent().submit();
            } else {
                swal("Data admin daerah aman, tidak terhapus!");
            }
        });
    });
});

$(".delete-cabang").each(function (indexInArray, valueOfElement) {
    $(this).on("click", function (e) {
        e.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data admin cabang!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Berhasil!",
                    text: "Permintaan menghapus data admin cabang berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 5000,
                });
                $(this).parent().submit();
            } else {
                swal("Data admin cabang aman, tidak terhapus!");
            }
        });
    });
});
$(".delete-ranting").each(function (indexInArray, valueOfElement) {
    $(this).on("click", function (e) {
        e.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data admin ranting!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Berhasil!",
                    text: "Permintaan menghapus data admin ranting berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 5000,
                });
                $(this).parent().submit();
            } else {
                swal("Data admin ranting aman, tidak terhapus!");
            }
        });
    });
});
