function posts(){
    $.ajax({
        type: 'GET',
        url: 'php/post_page.php',
        dataType: 'html',
        success: function (data) {
            $("#postSnippets").append(data);
        }
    })
}
