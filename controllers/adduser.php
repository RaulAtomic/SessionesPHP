<?php
session_start();
include("connection.php");
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if( !empty($_POST["name"]) &&
        !empty($_POST["nameA"]) &&
        !empty($_POST["nameuser"]) && 
        !empty($_POST["roluser"]) && 
        !empty($_POST["password"]) && 
        !empty($_POST["password2"])){
        $name = htmlspecialchars($_POST["name"]);
        $nameA = htmlspecialchars($_POST["nameA"]);
        $userName = htmlspecialchars($_POST["nameuser"]);
        $userRol = htmlspecialchars($_POST["roluser"]);
        $userPassword = htmlspecialchars($_POST["password"]);
        $userPassword2 = htmlspecialchars($_POST["password2"]);
            $sqlQuery = "SELECT * FROM usuarios WHERE usuario = '$userName' ";
            $sqlPrepare = mysqli_query($conn, $sqlQuery);
            $objectResult = mysqli_fetch_array($sqlPrepare, MYSQLI_ASSOC);
            if($objectResult){
                echo "<script>alert('Ya existe el usuario')</script>";
                echo "<script>self.location='../views/adduser.php'</script>";
            }else{
               /*  echo $name . " " . $nameA . " " . $userName . " " . $userRol ." " . $userPassword . " " . $userPassword2; */
                if($userPassword === $userPassword2){
                    $insertData = "INSERT INTO usuarios(nombre, apellido, usuario, passwd, rol) VALUES ('$name','$nameA','$userName','$userPassword','$userRol')";
                    $queryInsert = mysqli_query($conn, $insertData);
                    if($queryInsert){
                        echo "<script>alert('Agregado Exitosamente')</script>";
                        echo "<script>self.location='../views/adduser.php'</script>";
                    }
                }
                else{
                    echo "<script>alert('Las contraseñas no coenciden')</script>";
                    echo "<script>self.location='../views/adduser.php'</script>";
                }

            }

    }else{
        header('Location:../views/adduser.php');
    }
}

?>