<?php
  include "../controll/Conexion.php";
  $consulta =  mysqli_query($conex,"CALL consulObjetosJson");
  $jsonArray =  array();
   while($fila= mysqli_fetch_assoc($consulta)){
     $jsonObj['objeto'][] = $fila;
    }
 $final_resultado = json_encode($jsonObj);
 echo $final_resultado;
 mysqli_close($conex);
?>