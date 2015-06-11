<?php
 include("Conexion.php");
 session_start();
 mysqli_query($conex,"CALL cerrarSesion('".$_SESSION["ncontrol"]."')");
 echo $_SESSION["ncontrol"];
 if($_SESSION['sesionOk'] != "si"){
   header("Location:../index.php");
    exit;

 }
 session_destroy();
 header("Location:../index.php");

?>