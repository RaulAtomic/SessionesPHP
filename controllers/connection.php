<?php
include('config.php');
$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}



/* echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos $db es genial." . PHP_EOL;
echo "Información del host: " . mysqli_get_host_info($conn) . PHP_EOL;
 */

?>

<!-- <input type="text" class="text" id="script-input">
<script>
    const scriptInput = document.getElementById("script-input")
    scriptInput.addEventListener("click", ()=>{
        for(let i = 0; i<2 ; i++){
            alert("Hola Mundo");
        }
    })
</script> -->