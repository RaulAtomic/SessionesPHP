<?php
session_start();
include('../controllers/connection.php');
if(isset($_SESSION["Administrador"])){
    include('../layouts/header.php');
    $select = "SELECT * FROM usuarios ";
    $resultado = mysqli_query($conn, $select);
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET["idUser"])){
            $idUser = htmlspecialchars($_GET['idUser']);
            $sqlSelect = "SELECT * FROM usuarios WHERE id_usuarios = '$idUser'";
            $executeQuery = mysqli_query($conn, $sqlSelect);
            $objectResult = mysqli_fetch_array($executeQuery, MYSQLI_ASSOC);

        }
    }

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h4>Administrar Usuarios del Sistema</h4>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col">UserName</th>
                    <th scope="col">rol</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)):?>
                    <?php
                     if($row['nombre'] === $_SESSION["Administrador"]){
                         continue; 
                        }
                    ?>
                    <tr>
                        <td><?php echo $row['usuario']?></td>
                        <td><?php echo $row['rol']?></td>
                        <td>
                            <a href="../controllers/deleteuser.php?id=<?php echo $row['id_usuarios']; ?>" class="btn btn-outline-danger">Eliminar</a>
                            <a href="tableusers.php?idUser=<?php echo $row['id_usuarios']; ?>" class="btn btn-outline-primary">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($_GET): ?>
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 text-center">
                <h4>Editar User <?php echo $objectResult["usuario"];?></h4>
                <form action="../controllers/updateuser.php" method="post">
                    <input type="hidden" class="form-control mb-2" name="idUser" value="<?php echo $objectResult["id_usuarios"]; ?>">
                    <input type="text" class="form-control mb-2" name="nameUser" value="<?php echo $objectResult["nombre"]; ?>">
                    <input type="text" class="form-control mb-2" name="lastName" value="<?php echo $objectResult["apellido"]; ?>">
                    <input type="text" class="form-control mb-2" name="user" value="<?php echo $objectResult["usuario"]; ?>">
                    <select  class="form-control mb-2" name="rol" id="">
                        <option  value="<?php echo $objectResult['rol'];?>"><?php echo $objectResult['rol'];?></option>
                        <option  value="Empleado">Empleado</option>
                    </select> 
                    <input type="text" class="form-control mb-2" name="passwordUser" value="<?php echo $objectResult["passwd"]; ?>">
                    <input type="submit" class="btn btn-outline-success btn-block mb-2" value="Update">
                    <button class="btn btn-outline-danger btn-block">Cancelar</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php
include('../layouts/footer.php');
}else{
    header('Location:login.php');
}
?>