<?php
   include 'controll/Conexion.php';

  $myJsonObtenido = $_GET['myGSON'];

   $array = json_decode($myJsonObtenido);
   foreach ($array as $obj) {

       $cuerpo = $obj->cuerpo;
       $descripcion = $obj->descripcion;
       $fecha_compra = $obj->fecha_compra;
       $fecha_levanta = $obj->fecha_levanta;
       $fotoPath = $obj->foto;
       $modelo = $obj->modelo;
       $nserie = $obj->nserie;
       $reemplazo = $obj->reemplazo;
       $usuario = $obj->usuario;
       $IdUser = $obj->iduser;
       $kilometro = $obj->kilometro;
       $marca = $obj->marca;
       $mts = $obj->mts;
       $objeto = $obj->objeto;
       $tramo = $obj->tramo;

       mysqli_query($conex, "CALL insertPrincipal('$usuario','$nserie','$fecha_levanta','$fecha_compra','
       $reemplazo','$descripcion','$modelo','$fotoPath',$kilometro,$mts,$marca,$IdUser,'$cuerpo',$tramo,$objeto)");
       $ruta = "FOTO/";
       if (isset($fotoPath)) { //si esque existe la variable
           //creando carpeta
           mkdir($ruta . $fotoPath, 755);
       }
       echo "1";
   }

?>