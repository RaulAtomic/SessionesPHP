<?php
include('connection.php');
$selectQuery = 'SELECT * FROM areas';
$executeQuery = mysqli_query($conn, $selectQuery);

if($_SERVER['REQUEST_METHOD'] === "POST"){
   if(!empty($_POST['asunto']) && !empty($_POST['area']) && !empty($_POST['problema'])){
        $nombrePropietario = htmlspecialchars($_POST['nameOwner']);
        $asunto = htmlspecialchars($_POST['asunto']);
        $area = htmlspecialchars($_POST['area']);
        $area = intval($area);
        $problema = htmlspecialchars($_POST['problema']);
        $randomCode = rand(100,1000);
        $randomCode .= "GJT";
        $inserData = "INSERT INTO ticket_genericos(NAME_OWNER, CODIGO_TICKET, ID_AREA, ASUNTO, DESCRIPCION, ID_STATUS)VALUES('$nombrePropietario', '$randomCode', '$area', '$asunto', '$problema', 3)";
        $executeCode = mysqli_query($conn, $inserData);
        if($executeCode){
            echo "<script>alert('Favor de Guardar Tu codigo ya que con el podras consultar el resultado de tu ticket: $randomCode')</script>";
            echo "<script>self.location='../views/tickets/index.php'</script>";
        } 
   }else{
       header('Location:../views/tickets/index.php');
   }
}
?>