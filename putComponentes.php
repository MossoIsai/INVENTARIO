<?php
include ("controll/Conexion.php");
//Variables a Ingresar
$componente = $_POST['componente'];
$nserie = $_POST['nserie'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$fk_nserie = $_POST['fk_nserie'];

//el Empty por defecto es TRUE
if(empty($componente) ){
    echo "error ".$componente;
} else if(empty($nserie) ){
    echo "error ".$nserie;
}else if(empty($marca)){
    echo "error ".$marca;
} else if( empty($modelo)){
    echo "error ".$modelo;
}else if( empty($fk_nserie)){
    echo "error ".$fk_nserie;
}else
{//Mando respuesta positiva
    echo "1";
    mysqli_query($conex,
        "CALL insertComponentes($componente,'$nserie',$marca,'$modelo','$fk_nserie')");
}


mysqli_close($conex);