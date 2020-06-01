<?php
session_start();
/* include('../controllers/connection.php'); */
if(isset($_SESSION["Administrador"])){
    include('../controllers/consultas/consultas.php'); 
    $resultado = numberRows("usuarios", "DATA");
    include('../layouts/header.php');

?>
<div class="container mt-3">
    <div class="row justify-content-center" id="table-users">
        <div class="col-md-10 text-center">
            <h4 class="mb-4">Administrar Usuarios del Sistema</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">rol</th>
                    <th scope="col">Acción</th>
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
                            <a href="../controllers/deleteuser.php?id=<?php echo $row['id_usuarios']; ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
                            <a href="tableusers.php?idUser=<?php echo $row['id_usuarios']; ?>" id="update-user" class="btn btn-outline-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php /* if($_GET): */ 
        if(isset($_GET["idUser"])){
            $idUser = htmlspecialchars($_GET['idUser']);
            $sqlSelect = "SELECT * FROM usuarios WHERE id_usuarios = '$idUser'";
            $executeQuery = mysqli_query($conn, $sqlSelect);
            $objectResult = mysqli_fetch_array($executeQuery, MYSQLI_ASSOC);
    ?>    
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
                    <a href="tableusers.php" class="btn btn-outline-danger btn-block">Cancelar</a>
                </form>
            </div>
        </div>
    <?php }; ?>
</div>

<div class="container" id="modal-warning" style="display:none">
        <div class="row justify-content-center mt-5">
            <div class="col-md-2"></div>
            <div class="col-md-6 text-center  shadow-lg mt-5" style="height:300px;">
                <h5 class="mt-5">¿Seguro que quieres eliminar este Usuario?</h5>
                <div class="row mt-5 justify-content-center">
                <div class="col-sm-3"><button class="btn btn-lg btn-success " id="button-cancel">No</button></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3"><button class="btn btn-lg btn-danger ">Si</button></div>
                </div>
            </div>
        </div>

        <div class="row bg-danger p-1" style="margin-top:100px;"></div>
        <div class="row bg-primary p-1 mt-1" ></div>

</div>
<script>
    const tableUser = document.getElementById("table-users");
    const updateUser = document.getElementById("update-user");
    const buttonDelet =  document.getElementById("button-delet");
    const modalWarning = document.getElementById("modal-warning");
    const btnCancel = document.getElementById("button-cancel");
    const tableUsers = document.getElementById("container-table-users");
    
        
        updateUser.addEventListener("click", ()=>{
            tableUser.style.display = "none";
            
        })

        btnCancel.addEventListener("click", ()=>{
            
            modalWarning.style.display = "none";
            tableUsers.style.display= "block";
        })

        buttonDelet.addEventListener("click", ()=>{
            
            modalWarning.style.display = "block";
            tableUsers.style.display= "none";
        })
</script>
<?php
include('../layouts/footer.php');
}else{
    header('Location:login.php');
}
?>