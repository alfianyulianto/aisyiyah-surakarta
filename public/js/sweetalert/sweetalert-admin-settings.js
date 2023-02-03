$(".delete-ortom").each(function (indexInArray, valueOfElement) {
    $(this).on("click", function (e) {
        e.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ortom!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Berhasil!",
                    text: "Permintaan menghapus data ortom berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 5000,
                });
                $(this).parent().submit();
            } else {
                swal("Data ortom aman, tidak terhapus!");
            }
        });
    });
});

$(".delete-potensi").each(function (indexInArray, valueOfElement) {
    $(this).on("click", function (e) {
        e.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data potensi!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Berhasil!",
                    text: "Permintaan menghapus data potensi berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 5000,
                });
                $(this).parent().submit();
            } else {
                swal("Data potensi aman, tidak terhapus!");
            }
        });
    });
});

$(".delete-pekerjaan").each(function (indexInArray, valueOfElement) {
    $(this).on("click", function (e) {
        e.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data pekerjaan!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Berhasil!",
                    text: "Permintaan menghapus data pekerjaan berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 5000,
                });
                $(this).parent().submit();
            } else {
                swal("Data pekerjaan aman, tidak terhapus!");
            }
        });
    });
});

$(".delete-tempat_lahir").each(function (indexInArray, valueOfElement) {
    $(this).on("click", function (e) {
        e.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data tempat lahir!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Berhasil!",
                    text: "Permintaan menghapus data tempat lahir berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 5000,
                });
                $(this).parent().submit();
            } else {
                swal("Data tempat lahir aman, tidak terhapus!");
            }
        });
    });
});

$(".delete-periode").each(function (indexInArray, valueOfElement) {
    $(this).on("click", function (e) {
        e.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data periode!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "Berhasil!",
                    text: "Permintaan menghapus data periode berhasil!",
                    icon: "success",
                    buttons: false,
                    timer: 5000,
                });
                $(this).parent().submit();
            } else {
                swal("Data periode aman, tidak terhapus!");
            }
        });
    });
});
