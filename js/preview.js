// function previewImage(event) {
//     const reader = new FileReader();
//     reader.onload = function() {
//         const previewImg = document.getElementById("preview-img");
//         previewImg.src = reader.result;
//     };
//     reader.readAsDataURL(event.target.files[0]);

//     const fileNameInput = document.getElementById("filename");
//     fileNameInput.value = event.target.files[0].name;
// }

function previewImageAdd() {
    var fileInput = document.getElementById('picture');
    var previewImg = document.getElementById('previewPicAdd');
    
    // Check if a file has been selected
    if (fileInput.files && fileInput.files[0]) {
        // Create a new FileReader instance
        var reader = new FileReader();
        
        // Set the onload event handler to update the preview image when the file has been read
        reader.onload = function(e) {
            previewImg.src = e.target.result;
        }
        
        // Read the selected file as a data URL
        reader.readAsDataURL(fileInput.files[0]);
    }
}

function previewImageEdit() {
    var fileInput = document.getElementById('pictureToEdit');
    var previewImg = document.getElementById('previewPicEdit');
    var input = document.getElementById("pictureToEdit");
    
    // Check if a file has been selected
    if (fileInput.files && fileInput.files[0]) {
        // Create a new FileReader instance
        var reader = new FileReader();
        
        // Set the onload event handler to update the preview image when the file has been read
        reader.onload = function(e) {
            previewImg.src = e.target.result;
        }
        
        // Read the selected file as a data URL
        reader.readAsDataURL(fileInput.files[0]);
    }
}