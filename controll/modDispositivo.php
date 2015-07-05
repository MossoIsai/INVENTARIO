<?php
  include_once 'Conexion.php';
 $dispo = $_POST['dispo'];
 $nameDispo = $_POST['namedispo'];
  $queryUpdateDispo = mysqli_query($conex,"UPDATE OBJETO SET ObjNombre = '$nameDispo' WHERE ObjNombre ='$dispo' ");
   mysqli_close($conex);
  if($queryUpdateDispo == false){
      echo "Error";
  }else {

      header("Location: ../lista_dispo.php");
  }
?>