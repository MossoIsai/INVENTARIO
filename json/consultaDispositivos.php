<?php
  include "../controll/Conexion.php";
   $consulta = mysql_query("CALL consultaDispositivos");
   $jsonObjeto =  array();
   while($fila = mysql_fetch_array($consulta)){
       $jsonObjeto[] =  $fila;
   }
   $jsonfinal = json_encode($jsonObjeto);
   echo $jsonfinal;
?>