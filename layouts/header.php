<?php
    include('../controllers/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Gauss</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/simple-sidebar.css">
    <script src="https://kit.fontawesome.com/bd1996d6ad.js" crossorigin="anonymous"></script>
    <script src="../assets/app.js" defer></script>
</head>
<body>
<?php if(isset($_SESSION["Administrador"])){
    ?>
<?php include('sidebar.php'); ?>
        <?php }else{ ?>
            <div class="container-fluid p-3 bg-dark">
                <div class="row justify-content-center">
                    <div class="col-md-4 text-center">
                            <h4 class="text-white">Gauss Jordan</h4>
                    </div>
                </div>
            </div>
        <?php };?>