<?php
session_start();
include('connection.php');
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $user = $_POST["username"];
    $password = $_POST["passwd"];
    if(isset($user) && isset($password)){
        $consultaSql = "SELECT * FROM usuarios WHERE usuario = '$user' AND passwd = '$password'";
        $sqlPrepare = mysqli_query($conn, $consultaSql);
        $objectResult = mysqli_fetch_array($sqlPrepare, MYSQLI_ASSOC);
        if($objectResult){
            $_SESSION['Administrador'] = $objectResult['nombre'];
            header('Location:../views/admin.php');
        }else{
            echo '<script languaje = javascript>
            alert ("Datos Incorrectos");
            self.location="../views/login.php"</script>';
        }

    }
}else{
    header('Location:../views/login.php');
}
?>