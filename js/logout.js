function logout(){
    $.ajax({
        type: 'POST',
        url: 'php/logout_contr.php',
        dataType: 'html',
        success: function (data) {
            window.location.replace('index.html');
        }
    })
}
