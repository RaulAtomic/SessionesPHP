<?php
session_start();
include('../controllers/connection.php');
if(isset($_SESSION['Administrador'])){
    header('Location:admin.php');    
}else{
    include('../layouts/header.php');
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-body">
                <form method="post" name="form"  action="../controllers/login.php">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Ingresa tu usuario"
                        autocomplete="off" autofocus required><br>
                    <div class="form-group">
                        <input type="password" name="passwd" class="form-control" placeholder="Ingresa contraseña"
                        autocomplete="off" required>
                    </div>
                    <input type="submit" class="btn btn-outline-success btn-block" name="send" value="Ingresar">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
?>