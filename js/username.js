function showUsername(){

    $(document).ready(function(){
        $.ajax({
            type: 'POST',
            url: 'php/get_username.php',
            dataType: 'html',
            success: function (data) {
                if(data=='Login'){
                    window.location.replace('index.html');
                }
                else{
                    $("#username").append(data);
                    var username = $("#username").html();
                    displayYourPosts(username);
                }
            }
        })
      });

    
}

function displayYourPosts(username){
    $.ajax({
        type: 'POST',
        url: 'php/your_posts_contr.php',
        dataType: 'html',
        data : {username:username},
        success: function (data) {
            $("#userPostsDisplay").append(data);
        },
        error: function(){
            alert("NOT SENT");
        },
    })
}