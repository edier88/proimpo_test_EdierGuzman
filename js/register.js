usuario_create.addEventListener("keyup", () =>{validarCampo(usuario_create, /^[a-zA-Z0-9]+$/g)})
passwd_create.addEventListener("keyup", () => {validarPasswords(passwd_create.value, passwdConfirm_create.value, passwdConfirm_create)})
passwdConfirm_create.addEventListener("keyup", () => {validarPasswords(passwd_create.value, passwdConfirm_create.value, passwdConfirm_create)})

RegisterUser.addEventListener("click", ()=>{

    if(validarCampo(usuario_create, /^[a-zA-Z0-9]+$/g)==false){
        registerResponse.innerHTML = `<div class="alert alert-danger" role="alert">Verifique el nombre de usuario, no debe contener espacios, ni guiones ni puntos. Sólo se admiten minúsculas, mayúsculas y números</div>`
    } else if (validarPasswords(passwdConfirm_create.value, passwd_create.value, passwdConfirm_create) == false){
        registerResponse.innerHTML = `<div class="alert alert-danger" role="alert">Los passwords no concuerdan. Escriba la misma contraseña en ambos campos</div>`
    } else{
        $.ajax({
            url:'controller/userController.php',
            type: "POST",
            data: {
                "user":usuario_create.value,
                "passwd":passwd_create.value,
                "dataUsuario":true,
                "accion":"register"
            },
            beforeSend: function(objeto){
                registerLoader.innerHTML = "<img src='img/MetroLoader.gif' width='50' height='50'>"
                registerResponse.innerHTML = ""
            },
            success:function(data){
                console.log(data)
                registerLoader.innerHTML = ""

                if(JSON.parse(data) == 1){
                    registerResponse.innerHTML = `<div class="alert alert-success" role="alert">Registro correcto. Dé click <a href="index.php">aquí</a> Para loguearse</div>`
                    //window.location.href="index.php";
                } else {
                    registerLoader.innerHTML = ""
                    registerResponse.innerHTML = `<div class="alert alert-danger" role="alert">Ocurrió un problema al guardar el registro, verifique los campos o contáctese con Servicio al Cliente</div>`
                }
            }
        })
    }
})

// Función que valida los campos del formulario para que cumplan el formato
function validarCampo(campo, regex){
    var response = false
    if(!regex.exec(campo.value)){
        campo.setAttribute("class", "form-control is-invalid")
        campo.parentElement.appendChild(document.createElement("div"))
        campo.parentElement.children[2].setAttribute("class","invalid-feedback")
        campo.parentElement.children[2].innerHTML = "No cumple el formato"
        response = false
    }else{
        campo.setAttribute("class", "form-control is-valid")
        if(campo.parentElement.children[2]){
            campo.parentElement.children[2].innerHTML = ""
        }
        response = true
    }
    return response
}

// Función que valida las dos contraseñas insertadas por el usuario
function validarPasswords(passwd1, passwd2, campo){
    var response = false
    if (passwd1 != passwd2){
        campo.setAttribute("class", "form-control is-invalid")
        campo.parentElement.appendChild(document.createElement("div"))
        campo.parentElement.children[2].setAttribute("class","invalid-feedback")
        campo.parentElement.children[2].innerHTML = "Passwords no concuerdan"
        response = false
    } else{
        campo.setAttribute("class", "form-control is-valid")
        if(campo.parentElement.children[2]){
            campo.parentElement.children[2].innerHTML = ""
        }
        response = true
    }
    return response
}