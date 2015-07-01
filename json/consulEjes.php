<?php
include "../controll/Conexion.php";
$queryEjes = mysqli_query($conex,"CALL jsonEje");
$jsonObj = array();
while($fila = mysqli_fetch_assoc($queryEjes)){
    $jsonObj['eje'][] = $fila;
}
$final_resultado = json_encode($jsonObj);
echo $final_resultado;
mysqli_close($conex);
?>