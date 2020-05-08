
<?php
include("../../controllers/consultaTablas.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container-fluid bg-dark p-4">
    </div>
    <?php if(!empty($_GET['ticket']) && ($_GET['ticket'] === "getID")){?>
        <?php $getClass = 1 ;?>
            <div class="container mt-5 shadow-lg">
                <div class="row justify-content-center p-3">
                    <div class="col-md-4 text-center mt-5 p-4 bg-dark" style="border-radius:15px">
                        <h4 class="text-white">Ingresar Codigo de Ticket</h4>
                        <form action="resultTicket.php" method="post">
                        <input type="text" name="ticket_id" class="form-control mb-3 bg-dark text-white" required autocomplete="off">
                        <button class="btn btn-outline-primary btn-block mb-2">Ticket</button>
                        </form>
                        <a href="index.php" class="btn btn-outline-danger btn-block">Cancelar</a>
                    </div>
                </div>
            </div>
    <?php }else{?>
    <div class="container mt-3 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10"> 
                <p class="display-4">Crear Ticket </p>
            </div>
        </div>
        <form action="../../controllers/consultaTablas.php" method="post">
        <div class="row justify-content-center">
                <div class="col-md-10">
                    <input type="text" name="nameOwner" id="" class="form-control" placeholder="Nombre quien redacta : (opcional)" autocomplete="off">
                    <small  class="form-text text-muted  mb-3">Nombre de Redactor.</small>
                </div>
                <div class="col-md-5">
                    <input type="text" name="asunto" id="" class="form-control " placeholder="Asunto :" required autocomplete="off">
                    <small  class="form-text text-muted  mb-3">Asunto.</small>
                </div>
                <div class="col-md-5">
                    <select name="area" id="" class="form-control" required>
                        <?php while($row = mysqli_fetch_array($executeQuery ,MYSQLI_ASSOC)): ?>
                            <option value="<?php echo $row['ID_AREA']?>"><?php echo $row['AREA']?></option>
                        <?php endwhile; ?>
                    </select>
                    <small  class="form-text text-muted  mb-3">Area.</small>
                </div>
                <div class="col-md-10">
                    <textarea name="problema" id="" cols="30" rows="6" class="form-control mb-3" placeholder="Describir Problema :" required></textarea>
                </div>
                <div class="col-md-10">
                    <button type="submit" class="btn btn-outline-primary btn-block">Enviar</button>
                    <a href="index.php?ticket=<?php echo "getID"; ?>" class="btn btn-outline-success btn-block">Consultar Ticket</a>
                </div>
        </div>
        </form>
    </div>
    <?php }; ?>
</body>
</html>