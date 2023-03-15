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

function toggleDark(){
    
    // const darkToggle = document.querySelector('.toggle-dark');
    // document.documentElement.classList.toggle('dark');

    const htmlElement = document.documentElement;
  htmlElement.classList.toggle('dark');

  if (htmlElement.classList.contains('dark')) {
    localStorage.setItem('darkMode', 'on');
    $('#moon').hide();
    $('#sun').show();
  } else {
    localStorage.setItem('darkMode', 'off');
    $('#moon').show();
    $('#sun').hide();
  }

}

window.addEventListener('load', function () {
    const htmlElement = document.documentElement;
    const darkMode = localStorage.getItem('darkMode');
    if (darkMode === 'on') {
      htmlElement.classList.add('dark');
      $('#moon').hide();
      $('#sun').show();
    }

  });

