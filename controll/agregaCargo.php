<?php
  include("Conexion.php");
 session_start();
 if(! isset($_SESSION["ncontrol"])){
    header("Location: ../index.php");
    exit;
 }
  $cargo = $_POST['cargo'];
  settype($cargo,string);

  mysql_query("CALL insertCargo('".$_SESSION["ncontrol"]."','$cargo')");
  mysql_close($conex);

  header("Location: ../super.php");

?>