<?php
session_start();
if(isset($_SESSION['Administrador'])){
    include("../layouts/header.php");
    include('../controllers/consultas/consultas.php'); 
    $queryExecute = selectTablesInner("INNER", "CONSULTA");
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
            <form action="" method="POST">
                <input type="text" name="ticket-id" id=""  class="form-control" placeholder="Codigo Ticket" autocomplete="off">
                <button class="btn btn-outline-warning btn-block mt-2">Buscar</button>
            </form>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a href="../controllers/generar-pdf.php" class="btn btn-primary float-right" target="_blank">Generar PDF<a>
        </div>
    </div>
    <table class="table table-sm mt-2 table-hover table-bordered text-center">
    <thead class="bg-primary text-white">
        <tr>
<!--         <th scope="col">ID</th> -->
        <th scope="col">Ticket Code</th>
        <th scope="col">AREA</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php if($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["ticket-id"])){
        $ticketId = htmlspecialchars($_POST["ticket-id"]);
        $raw = selectTablesInner("IDUSER", $ticketId);
            if(!$raw){
                echo "<script>alert('No se encontro ese ticket')</script>";
            }else{
        ?>
        <tr class="<?php echo $raw["STATUS"] === "Cerrado"? "table-warning text-dark":"table-primary"; ?>">
            <td><?php echo $raw["CODIGO_TICKET"]; ?></td>
            <td><?php echo $raw["AREA"]; ?></td>
            <td><?php echo $raw["STATUS"]; ?></td>
            <td>
                <a href="../controllers/deleticket.php?id=<?php echo $raw['ID_TICKET']; ?>" class="text-danger text-trash-hover"><i class="far fa-trash-alt"></i></a>
                <a href="viewTickets.php?idTicket=<?php  echo $raw['ID_TICKET'];?>" class="text-info ml-2"><i class="far fa-eye"></i></a>
                <a href="../controllers/ticket-pdf.php?id=<?php echo $raw['ID_TICKET']; ?>" class="text-primary ml-2" target="_blank"><i class="far fa-file-pdf"></i></a>
            </td>
        </tr>
    <?php }}else{while($row = mysqli_fetch_assoc($queryExecute)): ?>
        <tr class="<?php echo $row["STATUS"] === "Cerrado"? "table-warning text-dark":"table-primary"; ?>">
            <!-- <th scope="row"><?php /* echo $row["ID_TICKET"]; */ ?></th> -->
            <td><?php echo $row["CODIGO_TICKET"]; ?></td>
            <td><?php echo $row["AREA"]; ?></td>
            <td><?php echo $row["STATUS"]; ?></td>
            <td>
                <a href="../controllers/deleticket.php?id=<?php echo $row['ID_TICKET']; ?>" class="text-danger text-trash-hover"><i class="far fa-trash-alt"></i></a>
                <a href="viewTickets.php?idTicket=<?php  echo $row['ID_TICKET'];?>" class="text-info ml-2"><i class="far fa-eye"></i></a>
                <a href="../controllers/ticket-pdf.php?id=<?php echo $row['ID_TICKET']; ?>" class="text-primary ml-2" target="_blank"><i class="far fa-file-pdf"></i></a>
            </td>
        </tr>
    <?php endwhile;} ?>
    </tbody>
    </table>
</div>
<?php include("../layouts/footer.php"); ?>
<?php }else{
    header("Location:login.php");
}?>