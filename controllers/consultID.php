<?php
include('connection.php');
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(!empty($_POST["matricula"])){
        $matricula = htmlspecialchars($_POST["matricula"]);
        $consultaQuery  = "SELECT alumno.ID_ALUMNO, alumno.MATRICULA, alumno.NOMBRE, alumno.APELLIDO, especialidad.ESPECIALIDAD, grado.GRADO from ((alumno INNER JOIN especialidad ON  alumno.ESPECIALIDAD = especialidad.ID_ESPECIALIDAD)INNER JOIN grado ON alumno.GRADO = grado.ID_GRADO) WHERE alumno.MATRICULA = '$matricula'";
        $sqlPrepare = mysqli_query($conn, $consultaQuery);
        $objectResult = mysqli_fetch_array($sqlPrepare, MYSQLI_ASSOC);
        $idAlumno = isset($objectResult["ID_ALUMNO"]) ? $objectResult["ID_ALUMNO"] : 0 ;
        if($objectResult){
            $insertData = "INSERT INTO ticket_alumnos(ID_ALUMNO) VALUES('$idAlumno')";
            $executeQ = mysqli_query($conn, $insertData);
            echo $objectResult["NOMBRE"] . " " . $objectResult["GRADO"]. " " .$objectResult["APELLIDO"]. $objectResult["ID_ALUMNO"];
        }else{
            echo '<script languaje = javascript>
            alert ("Datos Incorrectos");
            self.location="../formAlumnos/index.php"</script>';
        }
        
    }else{
        header("Location:../formAlumnos/index.php");
    }
}else{
    header("Location:../formAlumnos/index.php");
}