<?php
session_start();
/* include('../controllers/connection.php'); */
if(isset($_SESSION['Administrador'])){
    include('../layouts/header.php');
    include('../controllers/consultas/consultas.php');    
    $tickets = numberRows("ticket_genericos", "NUMBERS");
    $numberUsers = numberRows("usuarios", "NUMBERS");
?>
    <div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../images/INSTITUTO-GAUSS-JORDAN.png" class="d-block w-100 img-fluid" style="height:200px" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../images/Simple-Tickets-Logo.png" class="d-block w-100 img-fluid" style="height:200px" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row justify-content-center mt-5">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Inbox</div>
                        <div class="card-body">
                            <h5 class="card-title">Total de Tickets <span class="badge badge-dark ml-4"><?php echo $tickets; ?></span></h5>
                        </div>
                    </div>
                </div>
            <div class="col-md-3">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Usuarios</div>
                        <div class="card-body">
                            <h5 class="card-title">Usuarios<span class="badge badge-dark ml-4"><?php echo $numberUsers; ?></span></h5>
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