<?php
include('connection.php');
if($_SERVER['REQUEST_METHOD'] === "GET"){
    if(!empty($_GET['id'])){
        $numeroId  = $_GET['id'];
        $sqlDelet = "DELETE FROM ticket_genericos WHERE ID_TICKET = '$numeroId' LIMIT 1";
        $executeQuery = mysqli_query($conn, $sqlDelet);
        if($executeQuery){
            echo "<script>alert('Borrado Exitosamente')</script>";
            echo "<script>self.location='../views/ticketstable.php'</script>";
        }
    }else{
        header("Location:../views/ticketstable.php");
    }

}else{
    header("Location:../views/ticketstable.php");
}


?>