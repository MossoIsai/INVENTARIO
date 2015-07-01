<?php
include "../controll/Conexion.php";
$queryComponentes = mysqli_query($conex,"CALL jsonComponentes");
$jsonObj = array();
while($fila = mysqli_fetch_assoc($queryComponentes)){
    $jsonObj['componente'][] = $fila;
}
$final_resultado = json_encode($jsonObj);
echo $final_resultado;
mysqli_close($conex);
?>