<?php
session_start();
include('../controllers/connection.php');
if(isset($_SESSION['Administrador'])){
    include("../layouts/header.php");

    $selectManyTables = "SELECT ticket_genericos.ID_TICKET, ticket_genericos.CODIGO_TICKET, status_ticket.STATUS, areas.AREA from ((ticket_genericos inner join areas on ticket_genericos.ID_AREA = areas.ID_AREA)inner join status_ticket on ticket_genericos.ID_STATUS = status_ticket.ID_STATUS)";
    $queryExecute = mysqli_query($conn, $selectManyTables);


?>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
            <input type="text" name="" id=""  class="form-control" placeholder="Codigo Ticket">
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a href="../controllers/generar-pdf.php" class="btn btn-primary float-right" target="_blank">Generar PDF<a>
        </div>
    </div>
    <table class="table table-sm mt-2 table-hover table-bordered text-center">
    <thead class="bg-primary text-white">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Ticket Code</th>
        <th scope="col">AREA</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($queryExecute)): ?>
        <tr class="<?php echo $row["STATUS"] === "Cerrado"? "table-warning text-dark":"table-primary"; ?>">
            <th scope="row"><?php echo $row["ID_TICKET"]; ?></th>
            <td><?php echo $row["CODIGO_TICKET"]; ?></td>
            <td><?php echo $row["AREA"]; ?></td>
            <td><?php echo $row["STATUS"]; ?></td>
            <td>
                <a href="../controllers/deleticket.php?id=<?php echo $row['ID_TICKET']; ?>" class="text-danger text-trash-hover"><i class="far fa-trash-alt"></i></a>
                <a href="viewTickets.php?idTicket=<?php  echo $row['ID_TICKET'];?>" class="text-info ml-2"><i class="far fa-eye"></i></a>
                <a href="../controllers/ticket-pdf.php?id=<?php echo $row['ID_TICKET']; ?>" class="text-primary ml-2" target="_blank"><i class="far fa-file-pdf"></i></a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
    </table>
</div>
<?php include("../layouts/footer.php"); ?>
<?php }else{
    header("Location:login.php");
}?>