<?php
session_start();
/* require_once("connection.php"); */
require_once("deleteUser/delete_user.php");
if($_SERVER['REQUEST_METHOD'] === "GET"){
    $idUser = $_GET["id"];
    deletUser($idUser);
}

?>