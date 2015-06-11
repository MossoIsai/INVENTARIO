<?php
  include "Conexion.php";
session_start();
if(! isset($_SESSION["ncontrol"])){
    header("Location: ../index.php");
    exit;
}
$objeto = $_POST['objeto'];
  mysqli_query($conex,"CALL insertObjetos('".$_SESSION["ncontrol"]."','$objeto')");

 header("Location: ../lista_dispo.php");
?>