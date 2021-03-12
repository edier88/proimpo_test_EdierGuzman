
window.onload = cargarData()

// Validaciones de los campos de edición de usuario
usuario_edit.addEventListener("keyup", () =>{validarCampo(usuario_edit, /^[a-zA-Z0-9]+$/g)})
nombres_edit.addEventListener("keyup", () =>{validarCampo(nombres_edit, /^[a-z A-ZñÑáéíóú]+$/g)})
apellidos_edit.addEventListener("keyup", () =>{validarCampo(apellidos_edit, /^[a-z A-ZñÑáéíóú]+$/g)})
email_edit.addEventListener("keyup", () =>{validarCampo(email_edit, /^[0-9a-z-_.]+\@(\w+\.\w+)+$/g)})
genero_edit.addEventListener("change", () =>{validarCampo(genero_edit, /^M$|^F$/g)})
fechaNacimiento_edit.addEventListener("keyup", () =>{validarCampo(fechaNacimiento_edit, /^\d{4}\-\d{2}\-\d{2}$/g)})
municipio_edit.addEventListener("change", () =>{validarCampo(municipio_edit, /^Cali$|^Yumbo$|^Palmira$|^Jamundí$/g)})
direccion_edit.addEventListener("keyup", () =>{validarCampo(direccion_edit, /^.+$/g)})
passwd_edit.addEventListener("keyup", () => {validarPasswords(passwd_edit.value, passwdConfirm_edit.value, passwdConfirm_edit)})
passwdConfirm_edit.addEventListener("keyup", () => {validarPasswords(passwd_edit.value, passwdConfirm_edit.value, passwdConfirm_edit)})


// Función que se ejecuta tras efectuarse el eveneto de click en el botón de "Actualizar Datos"
updateUserData.addEventListener("click", () => {

    if(validarCampo(usuario_edit, /^[a-zA-Z0-9]+$/g)==false || validarCampo(nombres_edit, /^[a-z A-ZñÑáéíóú]+$/g)==false || validarCampo(apellidos_edit, /^[a-z A-ZñÑáéíóú]+$/g)==false || validarCampo(email_edit, /^[0-9a-z-_.]+\@(\w+\.\w+)+$/g)==false || validarCampo(genero_edit, /^M$|^F$/g)==false || validarCampo(fechaNacimiento_edit, /^\d{4}\-\d{2}\-\d{2}$/g)==false || validarCampo(municipio_edit, /^Cali$|^Yumbo$|^Palmira$|^Jamundí$/g)==false || validarCampo(direccion_edit, /^.+$/g)==false){
        response.innerHTML = `<div class="alert alert-danger" role="alert">Verifique que todos los campos estén bien diligenciados</div>`
    } else if (validarPasswords(passwdConfirm_edit.value, passwd_edit.value, passwdConfirm_edit) == false){
        response.innerHTML = `<div class="alert alert-danger" role="alert">Los passwords no concuerdan. Escriba la misma contraseña en ambos campos</div>`
    } else{

        if (confirm('¿Estas seguro de editar este usuario de la base de datos?')){

            $.ajax({
                url:'controller/userController.php',
                type: "POST",
                data: {
                    "id_usuario":id_edit.value,
                    "usuario":usuario_edit.value,
                    "nombres":nombres_edit.value,
                    "apellidos":apellidos_edit.value,
                    "email":email_edit.value,
                    "genero":genero_edit.value,
                    "fechaNacimiento":fechaNacimiento_edit.value,
                    "municipio":municipio_edit.value,
                    "direccion":direccion_edit.value,
                    "passwd":passwd_edit.value,
                    "dataUsuario":true,
                    "accion":"edit"
                },
                beforeSend: function(objeto){
                    loader.innerHTML = "<img src='img/MetroLoader.gif' width='50' height='50'>"
                    response.innerHTML = ""
                },
                success:function(data){
                    
                    loader.innerHTML = ""
                    data = JSON.parse(data)
                    if(data.BDresponse === 1){
                        response.innerHTML = `<div class="alert alert-success" role="alert">Datos actualizados correctamente</div>`
                        if(data.cambioUserName === 1){
                            window.location.href="logout.php";
                        }
                    } else{
                        response.innerHTML = `<div class="alert alert-success" role="alert">Ocurrió un error, verifique los datos insertados o comuníquese con Servicio al Cliente</div>`
                    }
                    
                    
                }
            })
        }
    }
})

LoadUserData.addEventListener("click", () => {
    cargarData()
})

ResetFields.addEventListener("click", () => {
    loader.innerHTML = ""
    response.innerHTML = ""
    usuario_edit.value = ""
    usuario_edit.setAttribute("class", "form-control")
    nombres_edit.value = ""
    nombres_edit.setAttribute("class", "form-control")
    apellidos_edit.value = ""
    apellidos_edit.setAttribute("class", "form-control")
    email_edit.value = ""
    email_edit.setAttribute("class", "form-control")
    genero_edit.value = ""
    genero_edit.setAttribute("class", "form-control")
    fechaNacimiento_edit.value = ""
    fechaNacimiento_edit.setAttribute("class", "form-control")
    municipio_edit.value = ""
    municipio_edit.setAttribute("class", "form-control")
    direccion_edit.value = ""
    direccion_edit.setAttribute("class", "form-control")
    passwd_edit.value = ""
    passwd_edit.setAttribute("class", "form-control")
    passwdConfirm_edit.value = ""
    passwdConfirm_edit.setAttribute("class", "form-control")
})

// Función que carga los datos del formulario desde la base de datos
function cargarData(){

    $.ajax({
        url:'controller/userController.php',
        data: {
            "id_usuario":id_edit.value,
            "dataUsuario":true,
            "accion":"show"
        },
        beforeSend: function(objeto){
            loader.innerHTML = "<img src='img/MetroLoader.gif' width='50' height='50'>"
            response.innerHTML = ""
        },
        success:function(data){
            loader.innerHTML = ""
            data = JSON.parse(data)
            usuario_edit.value = data[0].usuario
            nombres_edit.value = data[0].nombres
            apellidos_edit.value = data[0].apellidos
            email_edit.value = data[0].email
            genero_edit.value = data[0].genero
            fechaNacimiento_edit.value = data[0].fecha_nacimiento
            municipio_edit.value = data[0].municipio
            direccion_edit.value = data[0].direccion
        }
    })
}

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