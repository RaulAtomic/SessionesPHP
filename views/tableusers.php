<?php
session_start();
include('../controllers/connection.php');
if(isset($_SESSION["Administrador"])){
    include('../layouts/header.php');
    $select = "SELECT * FROM usuarios ";
    $resultado = mysqli_query($conn, $select);

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
                            <button class="btn btn-outline-primary">Edit</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
}else{
    header('Location:login.php');
}
?>