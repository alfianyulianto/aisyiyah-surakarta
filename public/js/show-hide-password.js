// fas fa-eye-slash
$(document).ready(function () {
    $(".toggle-password").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#password");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    $(".toggle-new-password").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#password_baru");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
});
