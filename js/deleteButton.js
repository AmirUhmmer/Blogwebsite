function deleteButton(button) {
    // Get the data attributes from the button element
    var id = button.dataset.id;

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url : 'php/delete_contr.php',
            dataType: 'html',
            type: 'POST',
            data : {id},
            success: function(res){
                Swal.fire({
                    icon: 'success',
                    title: 'Your story has been deleted.',
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.reload();
                    }
                })
                console.log(res);
            },
            error: function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                  })
            },
            beforeSend: function(){
                
            },
            complete: function(){
               
           }
        })
        }
      })

    
}