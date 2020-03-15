<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-dark" id="sidebar-wrapper">
      <div class="sidebar-heading">
        <div class="row justify-content-center">
          <img src="../images/Admin-Console.png" alt="logo" class="img-fluid mb-3" style="width: 100px;border-radius: 15px; border:solid 1px white;">
          <p class="text-white">Bienvenido <span class='badge badge-secondary'><?php echo $_SESSION["Administrador"]; ?></span></p>
        </div>
      </div>
        <div class="list-group list-group-flush">
          <a href="../views/admin.php" class="list-group-item list-group-item-action bg-light">Panel</a>
          <a href="#" class="list-group-item list-group-item-action bg-light">Tickets</a>
          <a href="#" class="list-group-item list-group-item-action bg-light">Users</a>
          <a href="../controllers/destroy.php" class="list-group-item list-group-item-action bg-light">Salir</a>
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
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opciones
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item " href="#">Perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../controllers/destroy.php">Salir</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>