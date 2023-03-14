var form = document.getElementById('signup')
    form.addEventListener('submit', function(event) {
        event.preventDefault()
        
        var u_name = document.getElementById('username').value
        var u_password = document.getElementById('password').value
        var u_password_verify = document.getElementById('password1').value

        $.ajax({
            url : 'php/signup_contr.php',
            dataType: 'json',
            type: 'POST',
            data : {username:u_name, password:u_password, password1:u_password_verify},
            success: function(res){
                if(res == 'error username'){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Username taken',
                      })
                    document.getElementById('username').value = ''
                    document.getElementById('password').value = ''
                    document.getElementById('password1').value = ''
                }
                else if(res == 'error password'){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Password does not match',
                      })
                    document.getElementById('password').value = ''
                    document.getElementById('password1').value = ''
                }
                else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucessfully signed up!',
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location.replace('index.html');
                        }
                    })
                }
            },
            error: function(){
                alert("NOT SENT")
            },
        })

    })

    function goBack(){
        window.history.back();
    }

const togglePassword = document.getElementById("togglePassword");
const passwordInput = document.getElementById("password");

togglePassword.addEventListener("click", function () {
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", type);
  togglePassword.textContent = type === "password" ? "Show" : "Hide";
});

const togglePassword1 = document.getElementById("togglePassword1");
const passwordInput1 = document.getElementById("password1");

togglePassword1.addEventListener("click", function () {
  const type = passwordInput1.getAttribute("type") === "password" ? "text" : "password";
  passwordInput1.setAttribute("type", type);
  togglePassword1.textContent = type === "password" ? "Show" : "Hide";
});
