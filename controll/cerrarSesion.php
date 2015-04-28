<?php
 include("Conexion.php");
 session_start();
 mysql_query("CALL cerrarSesion(".$_SESSION["ncontrol"].")");
 if($_SESSION['sesionOk'] != "si"){
   header("Location:../index.php");
    exit;
     session_destroy();
 }
 session_destroy();
 header("Location:../index.php");

?>