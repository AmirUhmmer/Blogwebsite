var form = document.getElementById('addPostForm')
    form.addEventListener('submit', function(event) {
        event.preventDefault()
        
        let formData = new FormData(form);

        $.ajax({
            url : 'php/add_post_contr.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res){
                Swal.fire({
                    icon: 'success',
                    title: 'Your work has been saved',
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.reload();
                    }
                    document.getElementById('titleToAdd').value = ''
                    document.getElementById('contentToAdd').value = ''
                    document.getElementById('picture').value = ''
                })
            },
            error: function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                  })
            },
        })

    })

function showAddPost(){
    $('#addPostInput').show()
    $('#caption1').hide()
    $('#userTable').hide()
    $('#goTop').hide()
}

function cancelButton(){
    $('#addPostInput').hide()
    $('#caption1').show()
    $('#userTable').show()
    $('#goTop').show()
}