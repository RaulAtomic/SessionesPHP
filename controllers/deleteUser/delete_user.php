<?php



function deletUser(int $idUser){
    require_once("connection.php");
    if(isset($idUser)){
        $sqlDelet = "DELETE FROM usuarios WHERE id_usuarios = '$idUser' LIMIT 1";
        $sqlDelet = mysqli_query($conn, $sqlDelet);
        if($sqlDelet){
            echo "<script>alert('Borrado Exitosamente')</script>";
            echo "<script>self.location='../views/tableusers.php'</script>";
        }
    }

}

//$executeQuery

