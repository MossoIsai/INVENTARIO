<?php
  include "../controll/Conexion.php";
  $queryUsuarios = mysql_query("CALL consulUsuario");
  $jsonObj = array();
  while($fila = mysql_fetch_array($queryUsuarios)){
      $jsonObj[] = $fila;
  }
  $final_resultado = json_encode($jsonObj);
 echo $final_resultado;
?>