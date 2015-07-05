<?php
include "../controll/Conexion.php";
$queryUsuarios = mysqli_query($conex,"CALL consulMarca");
$jsonObj = array();
while($fila = mysqli_fetch_assoc($queryUsuarios)){
    $jsonObj['marca'][] = $fila;
}
$final_resultado = json_encode($jsonObj);
echo $final_resultado;
mysqli_close($conex);
?>