<?php
session_start();
include("connection.php");
if($_SERVER['REQUEST_METHOD'] === "GET"){
    $idUser = $_GET["id"];
    $sqlDelet = "DELETE FROM usuarios WHERE id_usuarios = '$idUser' LIMIT 1";
    $executeQuery = mysqli_query($conn, $sqlDelet);
    if($executeQuery){
        echo "<script>alert('Borrado Exitosamente')</script>";
        echo "<script>self.location='../views/tableusers.php'</script>";
    }
}

?>