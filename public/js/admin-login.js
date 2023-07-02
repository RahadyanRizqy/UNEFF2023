$(document).ready(function () {
    $('#btn-login').click(function () {
        var username = $("#username").val();
        var password = $("#password").val();
        var token = $("meta[name='csrf-token']").attr("content");

        var errorMessages = [];

        if (username === "" || username.trim().length === 0) {
            errorMessages.push("Username tidak boleh kosong!");
        } else if (username.indexOf(' ') >= 0) {
            errorMessages.push("Username tidak boleh mengandung spasi!");
        }

        if (password === "" || password.trim().length === 0) {
            errorMessages.push("Password tidak boleh kosong!");
        } else if (password.indexOf(' ') >= 0) {
            errorMessages.push("Password tidak boleh mengandung spasi!");
        }

        if (errorMessages.length > 0) {
            $('#loginError').text(errorMessages.join(' '));
        } else {
            $.ajax({
                url: "/admin-login",
                type: "POST",
                dataType: "JSON",
                cache: false,
                data: {
                    "username": username,
                    "password": password,
                    "_token": token,
                },
                success:function(response){

                    if (response.success) {
                        window.location.href = "/dashboard";
                    } else {
                        console.log(response);
                        $('#loginError').text("Ada kesalahan");

                    }
                    console.log(response);
                },
                error:function(response){
                    console.log(response);
                    $('#loginError').text("Ada kesalahan");
                }
            });
        }
    });
});