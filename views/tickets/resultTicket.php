<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
    include('../../controllers/connection.php');
    $ticketCode = htmlspecialchars($_POST['ticket_id']);
    $queryConsult = "SELECT * from ((ticket_genericos inner join areas on ticket_genericos.ID_AREA = areas.ID_AREA) inner join status_ticket on ticket_genericos.ID_STATUS = status_ticket.ID_STATUS) where ticket_genericos.CODIGO_TICKET = '$ticketCode'";
    $executeQuery = mysqli_query($conn, $queryConsult);
    $resultExecution = mysqli_fetch_array($executeQuery, MYSQLI_ASSOC);
    if(!$resultExecution){
        echo "<script>alert('Confirma que tu ticket sea correcto')</script>";
        echo "<script>self.location='index.php?ticket=getID'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esatdo de Ticket</title>
    <script src="https://kit.fontawesome.com/bd1996d6ad.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/resultTicket.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-dark-danger">
    <div class="container shadow-lg bg-light contenedor-form">
        <div class="row bg-danger justify-content-between p-3" style="border-radius:15px;border:solid 1px red">
            <div class="col-md-5" style="border-radius:15px">
                    <div class="alert alert-success  text-center" role="alert">
                        <h4>Ticket Codigo: <?php echo $resultExecution['CODIGO_TICKET']; ?></h4>
                    </div>
            </div>
            <div class="col-md-2">
                <a href="index.php?ticket=getID" class="text-white float-right"><i class="far fa-lg  fa-window-close"></i></a>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-3 text-center">
                <input type="text" value="<?php echo $resultExecution['NAME_OWNER']; ?>"  id="name-owner" class="form-control mb-2 text-center" disabled>
                <label for="name-owner">Nombre Propietario</label>
            </div>
            <div class="col-md-3 text-center">
                <input type="text" value="<?php echo $resultExecution['AREA']; ?>"  id="name-owner" class="form-control mb-2 text-center" disabled>
                <label for="name-owner">Area de Ticket</label>
            </div>
            <div class="col-md-3 text-center">
                <input type="text" value="<?php echo $resultExecution['STATUS']; ?>"  id="name-owner" class="form-control mb-2 text-center bg-info text-white" disabled>
                <label for="name-owner" class="h6">Estatus Ticket</label>
            </div>            
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-3 text-center">
                <input type="text" value="<?php echo $resultExecution['ASUNTO']; ?>"  id="name-owner" class="form-control mb-2 text-center" disabled>
                <label for="name-owner">Asunto</label>
            </div>
            <div class="col-md-3 text-center">
                <input type="text" value="<?php echo $resultExecution['FECHA']; ?>"  id="name-owner" class="form-control mb-2 text-center" disabled>
                <label for="name-owner">Hora de Creación de Ticket</label>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6 text-center mb-5">
                <textarea  id="" cols="30" rows="5" class="form-control" disabled><?php echo $resultExecution['DESCRIPCION'];?></textarea>
            </div>            
        </div>
    </div>
</body>
</html>
<?php
}else{
    header("Location:index.php");
}
?>