function showPostSnippet(){
    $.ajax({
        type: 'GET',
        url: 'php/post_snippet.php',
        dataType: 'html',
        success: function (data) {
            $("#postSnippets").append(data);
        }
    })
}

function showFullStory(){
    
    var urlParams = new URLSearchParams(window.location.search);
    var postId = urlParams.get('post_id');

    $.ajax({
        type: 'GET',
        url: 'php/view_full_story.php',
        dataType: 'html',
        data: {postId:postId},
        success: function (data) {
            $("#postFull").append(data);
        },
        error: function () {
            alert("error");
        },
        
    })
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
    }
