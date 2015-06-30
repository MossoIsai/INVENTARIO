<?php
  include "Conexion.php";
session_start();
if(! isset($_SESSION["ncontrol"])){
    header("Location: ../index.php");
    exit;
}
$objeto = $_POST['objeto'];
  $repetido = mysqli_query($conex,"SELECT ObjNombre FROM OBJETO WHERE ObjNombre='$objeto'");
   echo mysqli_error($conex);
  //echo $objeto;

  if(mysqli_num_rows($repetido) !=0){
      header("Location: ../lista_dispo.php?repetido=1");

  }else{

      mysqli_query($conex,"CALL insertObjetos('".$_SESSION["ncontrol"]."','$objeto')");
      header("Location: ../lista_dispo.php");
  }
?>