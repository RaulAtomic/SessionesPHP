<?php
include('../controllers/connection.php');
if(isset($_SESSION["Administrador"])){
  $querySlcNum = "SELECT * from ticket_genericos where ID_STATUS = 3";
  $resultQuery = mysqli_query($conn, $querySlcNum);
  $row_cnt = mysqli_num_rows($resultQuery);
?>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-dark" id="sidebar-wrapper">
      <div class="sidebar-heading">
        <div class="row justify-content-center">
          <img src="../images/Admin-Console.png" alt="logo" class="img-fluid mb-3" style="width:100px;">
          <p class="text-white">Bienvenido <span class='badge badge-secondary'><?php echo $_SESSION["Administrador"]; ?></span></p>
        </div>
      </div>
        <div class="list-group list-group-flush">
          <a href="../views/admin.php" class="list-group-item list-group-item-action bg-light">Panel<i class="fas fa-columns float-right"></i></a>
          <a href="../views/ticketstable.php" class="list-group-item list-group-item-action bg-light">Tickets<span class="badge badge-info ml-2"><?php echo $row_cnt; ?></span><i class="fas fa-ticket-alt float-right"></i></a>
          <a href="#" class="list-group-item list-group-item-action bg-light">Calendar<i class="far fa-calendar-alt float-right"></i></a>
          <a href="#" class="list-group-item list-group-item-action bg-light">Alumnos<i class="fas fa-user-friends float-right"></i></a>
          <a href="../controllers/destroy.php" class="list-group-item list-group-item-action bg-light">Salir <i class="fas fa-sign-out-alt float-right"></i></a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
         <button class="btn btn-primary" id="menu-toggle"><span class="navbar-toggler-icon"></span></button> 

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Link</a>
            </li>
            <li class="nav-item dropdown dropDown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opciones
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item " href="#">Perfil<i class="fas fa-user-cog float-right"></i></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../controllers/destroy.php">Salir<i class="fas fa-sign-out-alt float-right"></i></a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <?php
      }else{
        header("Location:../views/login.php");
      }
      ?>