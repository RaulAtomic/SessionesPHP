<?php
session_start();
include('../controllers/connection.php');
if(isset($_SESSION['Administrador'])){
    include('../layouts/header.php');    

?>
    <div class="container mt-5">
        <div class="row justify-content-between">
                <div class="col-md-4">
                    <div class="card hover-card" style="width: 18rem;">
                        <img src="images/check.png" class="card-img-top img-fluid" alt="..." style="height:280px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Tickets</h5>
                            <p class="card-text">Administrar Panel de Tickets</p>
                            <a href="#" class="btn btn-outline-primary btn-block">Go</a>
                        </div>
                    </div>
                </div>
            <div class="col-md-4">
            <div class="card hover-card" style="width: 18rem;">
                        <img src="images/addcuztomer.png" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Agregar Usuario</h5>
                        <p class="card-text">Agrega Usuarios a tu lista.</p>
                        <a href="adduser.php" class="btn btn-outline-primary btn-block">Go</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card hover-card" style="width: 18rem;">
                        <img src="images/crud.png" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Actuliza Datos</h5>
                        <p class="card-text">Actualiza Algunos Datos.</p>
                        <a href="tableusers.php" class="btn btn-outline-primary btn-block">Go</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include('../layouts/footer.php');
}else{
    header("Location:login.php");
}
?>