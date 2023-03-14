var form = document.getElementById('login')
    form.addEventListener('submit', function(event) {
        event.preventDefault()
        
        var u_name = document.getElementById('username').value
        var u_password = document.getElementById('password').value

        $.ajax({
            url : 'php/login_contr.php',
            dataType: 'json',
            type: 'POST',
            data : {username:u_name, password:u_password},
            success: function(res){
                if(res == 'error'){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Wrong username or password',
                      })
                    document.getElementById('username').value = ''
                    document.getElementById('password').value = ''
                }
                else{
                    window.location.replace('index.html');
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
