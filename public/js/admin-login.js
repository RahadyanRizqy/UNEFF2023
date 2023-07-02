$(document).ready(function () {
    $('.warning').css('display', 'none');
    $("#loginForm").submit(function(event) {
        event.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();

        var errorMessages = [];

        if (username === "" || username.trim().length === 0) {
            errorMessages.push("Username harus diisi!");
        } else if (username.indexOf(' ') >= 0) {
            errorMessages.push("Username tidak boleh ada spasi!");
        }

        if (password === "" || password.trim().length === 0) {
            errorMessages.push("Password harus diisi!");
        } else if (password.indexOf(' ') >= 0) {
            errorMessages.push("Password tidak boleh ada spasi!");
        }

        if (errorMessages.length > 0) {
            $('#errorList').empty();
            $('.warning').css('display', 'block');
            errorMessages.forEach(function (errorMessage) {
                $('#errorList').append('<li>' + errorMessage + '</li>');
            });
        } else {
            $("#loginForm").unbind("submit").submit();
        }
    });

    $('#password-lock').click(function() {
        if ($('#password').attr('type') === 'password') {
            $('#password').attr('type', 'text');
            $(this).attr('class', 'fa-regular fa-eye');
            $('#password').attr('placeholder', 'Jeanne220+Vampire');
        } else {
            $('#password').attr('type', 'password');
            $(this).attr('class', 'fa-regular fa-eye-slash');
            $('#password').attr('placeholder', '*****************');
        }
    });
});