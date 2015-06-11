<?php
  include ("controll/Conexion.php");
  //Variables a Ingresar

  $usuario = $_POST['usuario'];
  $nserie = $_POST['nserie'];
  $fecha_levanta = $_POST['fech_levanta'];
  $fecha_compra = $_POST['fecha_compra'];
  $reemplazo = $_POST['reemplazo'];
  $descripcion = $_POST['descri'];
  $modelo = $_POST['modelo'];
  $fotoPath = $_POST['foto_path'];
  $kilometro = $_POST['kilometro'];
  $mts = $_POST['mts'];
  $marca = $_POST['marca'];
  $IdUser = $_POST['iduser'];
  $cuerpo = $_POST['cuerpo'];
  $tramo = $_POST['tramo'];
  $objeto = $_POST['objeto'];


  //if(empty($POST['usuario']) ){

      // creamos el JSON
      //$response["success"] = 0;

/*
  }else{
      $response["success"] = 1;
      $response["message"] = "bien hecho";

      die(json_encode($response));
 }*/


//mysqli_query($conex,"CALL insertPrincipal('$usuario','$nserie','$fecha_levanta','$fecha_compra',$reemplazo,'$descripcion','$modelo','$fotoPath',$kilometro,$mts,$marca,$IdUser,'$cuerpo',$tramo,$objeto)");
 mysqli_query($conex,"CALL insertPrincipal('$usuario','$nserie','$fecha_levanta','$fecha_compra','$reemplazo','$descripcion','$modelo','$fotoPath',$kilometro,$mts,$marca,$IdUser,'$cuerpo',$tramo,$objeto)");

$response["message"] = "Por favor ingresa los datos". "usuario=".$usuario." nserie=".$nserie." fecha_levanta=".$fecha_levanta." fechacompra=".$fecha_compra.
    " reemplazo=".$reemplazo." descripcion=".$descripcion." modelo=".$modelo." foto=".$fotoPath." kilometro=".$kilometro." metros=".$mts." marca=".$marca." idUser=".$IdUser." cuerpo=".$cuerpo." tramo=".$tramo." objeto=".$objeto;

die(json_encode($response));
//usuario=isaimosso&nserie=10090258&fech_levanta=2015-05-30+20%3A36%3A53&fecha_compra=2015-5-30&reemplazo=0&descri=fix&modelo=k34&foto_path=null_Sat-30-May-2015-15%3A35&kilometro=20&mts=40&marca=5&iduser=8&cuerpo=A&tramo=13&objeto=7
mysqli_close($conex);
 //header("Location: dispositivos.php");



?>