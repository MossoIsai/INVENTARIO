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
    } else{
        return "SI";
    }
}
?>