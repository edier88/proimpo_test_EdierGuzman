<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro usuarios</title>
    <link rel="icon" type="image/png" href="img/proimpo_logo.png" width='21' height='20'/>
    <!-- Bootstrap 4.5 Jquery 3.3.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="container shadow p-3 mb-5 bg-white rounded my-row-high">
    <div class="my-row-low">
        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #EAEBF5" > -->
        <nav class="navbar navbar-dark" style="background-color: #102EEF">
            <a class="navbar-brand" href="index.php"><img src="img/proimpo_logo.png" width='38' height='35'> Registro de usuarios Proimpo</a>
        </nav>
        </div>
        <div class="form-row justify-content-center my-row-high my-col">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="usuario_edit">Nombre de usuario:</label>
                    <input type="text" class="form-control" name="usuario_create" id="usuario_create">
                    
                </div>
            </div>
        </div>
        <div class="form-row justify-content-center my-col">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="usuario_edit">Password:</label>
                    <input type="password" class="form-control" name="passwd_create" id="passwd_create">
                    
                </div>
            </div>
        </div>
        <div class="form-row justify-content-center my-col">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="usuario_edit">Confirme el Password:</label>
                    <input type="password" class="form-control" name="passwdConfirm_create" id="passwdConfirm_create">
                    
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-col">
            <div class="my-col">
                <input type="button" class="btn btn-primary" id="RegisterUser" value="Registrarse">
            </div>
        </div>
        <div class="row justify-content-center my-row-high">
            <div class="my-col">
                <a href="login.php">Ya tienes una cuenta? Logueate</a>
            </div>
        </div>
        <div class="row justify-content-center my-row-high">
            <div class="my-col">
                <span id="registerLoader"></span>
                <span id="registerResponse"></span>
            </div>
        </div>
    </div>
</body>
<script src="js/register.js"></script>
</html>