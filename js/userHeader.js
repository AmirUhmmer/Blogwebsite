function userHeader(){
    $.ajax({
        type: 'POST',
        url: 'php/session_checker.php',
        dataType: 'html',
        success: function (data) {
            if(data != 'Login') {
                $("#userHeader").append('<a href="user_profile.html">Profile</a>');
            }
            else {
                $("#userHeader").append('<a href="login.html">Login</a>');
            }
        }
    })
}