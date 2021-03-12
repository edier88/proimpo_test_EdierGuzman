LoginUser.addEventListener("click", () => {

    $.ajax({
        url:'controller/userController.php',
        type: "POST",
        data: {
            "user":usuario_login.value,
            "passwd":passwd_login.value,
            "dataUsuario":true,
            "accion":"login"
        },
        beforeSend: function(objeto){
            //$("#loaderListInternet").html("<img src='../imagenes/loader.gif'>");
            loginLoader.innerHTML = "<img src='img/MetroLoader.gif' width='50' height='50'>"
            loginResponse.innerHTML = ""
        },
        success:function(data){
            if(JSON.parse(data) == true){
                window.location.href="index.php";
            } else {
                loginLoader.innerHTML = ""
                loginResponse.innerHTML = `<div class="alert alert-danger" role="alert">Contraseña o nombre de usuario incorrectos!</div>`
            }
        }
    })

})