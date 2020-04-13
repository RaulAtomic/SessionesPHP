<?php
session_start();
include("connection.php");

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(!empty($_POST["idUser"]) 
    && !empty($_POST["nameUser"]) 
    && !empty($_POST["lastName"]) 
    && !empty($_POST["user"]) 
    && !empty($_POST["rol"]) 
    && !empty($_POST["passwordUser"])){
        $idUser = $_POST["idUser"];
        $nameUser = $_POST["nameUser"];
        $lastName = $_POST["lastName"];
        $user = $_POST["user"];
        $rol = $_POST["rol"];
        $passwordUser = $_POST["passwordUser"];
        $sqlQuery = "SELECT * FROM usuarios WHERE id_usuarios = '$idUser'";
            $sqlPrepare = mysqli_query($conn, $sqlQuery);
            $objectResult = mysqli_fetch_array($sqlPrepare, MYSQLI_ASSOC);
            if($objectResult["usuario"] === $user){
                echo "<script>alert('Ya existe el usuario')</script>";
                echo "<script>self.location='../views/tableusers.php'</script>";
            }else{
                $updateDate = "UPDATE `usuarios` SET `nombre` = '$nameUser', `apellido` = '$lastName', `usuario` = '$user', `passwd`= '$passwordUser', `rol` = '$rol'  WHERE `usuarios`.`id_usuarios` = '$idUser'";
                $executeQuery = mysqli_query($conn, $updateDate);
                if($executeQuery){
                    echo "<script>alert('Actualizado Exitosamente')</script>";
                    echo "<script>self.location='../views/tableusers.php'</script>";
                }

            }

    }else{
        header("Location:../views/tableusers.php");
    }
}



?>