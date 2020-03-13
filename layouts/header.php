<?php
    include('../controllers/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Gauss</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="../assets/app.js" defer></script>
</head>
<body>
<div class="container-fluid p-3 bg-dark mb-2">
    <div class="row <?php echo  isset($_SESSION["Administrador"]) ? "justify-content-around align-items-center" : "justify-content-center"; ?>">
       <div class="col-md-4 text-center">
            <h4 class="text-white"><?php echo  isset($_SESSION["Administrador"]) ? "Bienvenido <span class='badge badge-secondary'>".$_SESSION["Administrador"]."</span>" : "Gauss Jordan"; ?></h4>
       </div>
       <?php
        if(isset($_SESSION["Administrador"])){
       ?>
       <div class="col-md-4">
        <ul class="nav justify-content-center" style="border:solid 1px white;border-radius:15px;">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="../views/admin.php">Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Add User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Delete</a>
                </li>
            </ul>
       </div>
        <div class="col-md-4 text-center">
                <button class="btn btn-outline-success" ><a href="../controllers/destroy.php" class="text-white">Log Out</a></button>
        </div>
        <?php } ?>
    </div>
</div>
    
