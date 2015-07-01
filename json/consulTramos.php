<?php
include "../controll/Conexion.php";
$queryTramos = mysqli_query($conex,"CALL jsonTramo");
$jsonObj = array();
while($fila = mysqli_fetch_assoc($queryTramos)){
    $jsonObj['tramo'][] = $fila;
}
$final_resultado = json_encode($jsonObj);
echo $final_resultado;
mysqli_close($conex);
?>