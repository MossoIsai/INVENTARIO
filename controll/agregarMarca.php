<?php
include "Conexion.php";
session_start();
if(! isset($_SESSION["ncontrol"])){
    header("Location: ../index.php");
    exit;
}
$marca = $_POST['marca'];
mysqli_query($conex,"CALL insertMarca('$marca','".$_SESSION["ncontrol"]."')");

header("Location: ../lista_marcas.php");
?>