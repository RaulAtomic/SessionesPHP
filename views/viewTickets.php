<?php
session_start();
include('../controllers/connection.php');
if(isset($_SESSION['Administrador']) && !empty($_GET['idTicket'])){
    include("../layouts/header.php");
    $idTicket = $_GET['idTicket'];
    $sqlSelect = "SELECT * from ((ticket_genericos inner join areas on ticket_genericos.ID_AREA = areas.ID_AREA)inner join status_ticket on ticket_genericos.ID_STATUS = status_ticket.ID_STATUS) WHERE ID_TICKET = '$idTicket'";
    $executeQuery = mysqli_query($conn, $sqlSelect);
    $objectResult = mysqli_fetch_array($executeQuery, MYSQLI_ASSOC);

    $selectStatus = "SELECT * FROM status_ticket";
    $executeSelect = mysqli_query($conn, $selectStatus);

?>

<div class="container mt-3 mb-5">
    <div class="row justify-content-center mb-3">
          <div class="col-md-4">
            <div class="alert alert-primary">
                <h4>Codigo de ticket : <?php echo $objectResult['CODIGO_TICKET']; ?></h4>
            </div>
          </div>
    </div>
    <div class="row justify-content-center mb-2">
        <div class="col-md-3">
            <input type="text" value="<?php echo $objectResult['NAME_OWNER']; ?>" class="form-control text-center" disabled>
            <small  class="form-text text-muted text-center">Propietario Ticket.</small>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control text-center" value="<?php echo $objectResult['AREA']; ?>" disabled>
            <small  class="form-text text-muted text-center">Area.</small>
        </div>
    </div>
    <div class="row justify-content-center mb-2">
        <div class="col-md-3">
            <input type="text" class="form-control text-center" value="<?php echo $objectResult['ASUNTO']; ?>" disabled>
            <small  class="form-text text-muted text-center">Asunto.</small>
        </div>
        <div class="col-md-3">
            <select name="" id="" class="form-control" disabled>
                <option value="<?php echo $objectResult['STATUS']; ?>"><?php echo $objectResult['STATUS']; ?></option>
            </select>
            <small  class="form-text text-muted text-center">Estatus Ticket.</small>
        </div>
    </div>
    <div class="row justify-content-center mb-2">
        <div class="col-md-6">
            <textarea cols="30" rows="5" class="form-control" disabled><?php echo $objectResult['DESCRIPCION']; ?></textarea>
            <small  class="form-text text-muted text-center">Descripcion de Ticket.</small>
        </div>
    </div>
    <form action="../controllers/updateStatus.php" method="post">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <input type="hidden" name="id-ticket" value="<?php echo $objectResult['ID_TICKET']; ?>">
                <select name="status-ticket" id="" class="form-control">
                    <?php while($raw = $result = mysqli_fetch_array($executeSelect, MYSQLI_ASSOC)): ?>
                        <option value="<?php echo $raw['ID_STATUS']?>"><?php echo $raw['STATUS']?></option>
                    <?php endwhile; ?>
                </select>
                <small  class="form-text text-muted text-center">Actualizar estado de Ticket</small>
            </div>
            <div class="col-md-3">
                <input type="text" id="" class="form-control" disabled value="<?php echo $objectResult['FECHA'];?>">
                <small  class="form-text text-muted text-center">Fecha y Hora de Elaboración de Ticket.</small>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-md-6">
                <button type="submit" class="btn btn-outline-primary btn-block" id="button-update">Update</button>
                <a href="ticketstable.php" class="btn btn-outline-danger btn-block">Regresar</a>
            </div>
        </div>
    </form>
</div>


<?php include("../layouts/footer.php"); ?>
<?php }else{
    header("Location:login.php");
}?>