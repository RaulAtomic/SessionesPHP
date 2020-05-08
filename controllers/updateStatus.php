<?php
session_start();
include('connection.php');
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(!empty($_POST['id-ticket']) && !empty($_POST['status-ticket'])){
        $idTicket = htmlspecialchars($_POST['id-ticket']);
        $statusTicket = htmlspecialchars($_POST['status-ticket']);
        $queryUpdate = "UPDATE `ticket_genericos` SET `ID_STATUS` = '$statusTicket' WHERE `ticket_genericos`.`ID_TICKET` = '$idTicket'";
        $executeQueryUpdate = mysqli_query($conn, $queryUpdate);
        if($executeQueryUpdate){    
            echo "<script>alert('Estado de Ticket Actualizado')</script>";
            echo "<script>self.location='../views/ticketstable.php'</script>";
        }
    }else{
        header('Location:../views/login.php');
    }
}else{
    header('Location:../views/login.php');
}

?>