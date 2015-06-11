<?php
//funcion para modificar el mes
function modificaMes($cadena)
{
    $mes = substr($cadena, 5, 2);
    $entero = intval($mes);
    $meses = array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jul', 'Jun', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');
    for ($i = 0; $i < sizeof($meses); $i++) {
        if ($entero -1 == $i) {
            $valor = $meses[$i];
        }
    }
    return  $valorfinal = str_replace($mes, $valor, $cadena);
}//fin del metodo
function reemplazo($cadena){
    if($cadena == 0 ){
        return "NO";
    } else if($cadena == 1){
        return "SI";
    }
}
function cadenamiento($valor){
    $longitud = strlen($valor );
    if($longitud == 3){
        return $valor;
    } else if($longitud == 2){
        return "0".$valor;
    } else if($longitud == 1){
        return "00".$valor;
    }

}
?>