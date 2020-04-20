function on() {
    $("#overlay").css("display", "block");
}
function off() {
    $("#overlay").css("display", "none");
}
function login() {
    $("#result_mex_container").attr("active", "false");
    var contactNumber;
    contactNumber = $('input[name="contactNumber"]').val();
    var password;
    password = $('input[name="password"]').val();
    var token;
    token = $('input[name="_token"]').val();
    validateCredentials(contactNumber, password, token);
    return false;
}
function validateCredentials(user, psw, tk) {
    $.post("login", {
        contactNumber: user,
        password: psw,
        _token: tk
    }, function (data, status) {
        if (data == "Username o password errate") {
            $("#result_mex_container").attr("active", "true").html(data);
        }
        else {
            location.reload();
        }
    });
}
;
