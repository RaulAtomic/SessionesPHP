<?php
    session_start();
    include('../controllers/connection.php');
    if(isset($_SESSION['Administrador'])){
        include('../layouts/header.php');
?>

<div class="container mt-5"> 
    <div class="row justify-content-center">
        <div class="col-md-5 text-center">
            <h4>Agregar Nuevo Usuario</h4>
            <form action="../controllers/adduser.php" method="post">
            <input type="text" name="name" id="" class="form-control mb-2" placeholder="Nombre:" autocomplete="off">
            <input type="text" name="nameA" id="" class="form-control mb-2" placeholder="Apellido:" autocomplete="off">
                <input type="text" name="nameuser" id="" class="form-control mb-2" placeholder="Nombre Usuario:" autocomplete="off">
                <select name="roluser" id="" class="form-control mb-2">
                    <option value="administrador">Administrador</option>
                    <option value="gerente">Gerente</option>
                    <option value="empleado">Empleado</option>
                </select>
                <input type="password" name="password" id="" class="form-control mb-2" placeholder="Agregar Password:" autocomplete="off">
                <input type="password" name="password2" id="" class="form-control mb-2" placeholder="Confirmar Password:" autocomplete="off">
                <button type="submit" class="btn btn-outline-primary btn-block">Agregar</button>
            </form>
        </div>
    </div>
</div>

<?php
    }else{
        header('Location:login.php');
    }
?>