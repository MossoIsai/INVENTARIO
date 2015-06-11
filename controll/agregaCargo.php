<?php
  include("Conexion.php");
 session_start();
 if(! isset($_SESSION["ncontrol"])){
    header("Location: ../index.php");
    exit;
 }
  $cargo = $_POST['cargo'];
  settype($cargo,string);

  mysqli_query($conex,"CALL insertCargo('".$_SESSION["ncontrol"]."','$cargo')");
  mysqli_close($conex);

  header("Location: ../super.php");

?>