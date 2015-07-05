<?php
  include_once 'Conexion.php';
  session_start();
if(! isset($_SESSION["ncontrol"])){
    header("Location: ../index.php");
    exit;
}

  $dispositivo = $_POST['dispositivo'];
  $nserie = $_POST['nserie'];
  $fecha = $_POST['fecha'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $reemplazo = $_POST['reemplazo'];
  $descripcion = $_POST['descripcion'];
  $kilometro = $_POST['kilometro'];
  $metro = $_POST['metro'];
  $cuerpo = $_POST['cuerpo'];
  $tramo = $_POST['tramo'];
  $idDispo = $_POST['id'];
  $cuerposList[] = '';

  if(empty($cuerpo)){
    echo '<script>alert("Es necesario Seleccionar un cuerpo");</script>';
  }else {
      for ($i = 0; $i < 3; $i++) {
          $cuerposList[$i] = $cuerpo[$i];
      }
      $kuerpo = $cuerposList[0] . $cuerposList[1] . $cuerposList[2];
      if (strcmp($kuerpo, "A") == 0) {
          $final = "A";
      } elseif (strcmp($kuerpo, "B") == 0) {
          $final = "B";
      } elseif (strcmp($kuerpo, "C") == 0) {
          $final = "C";
      } elseif (strcmp($kuerpo, "AB") == 0) {
          $final = "A/B";
      } elseif (strcmp($kuerpo, "AC") == 0) {
          $final = "A/C";
      } elseif (strcmp($kuerpo, "BC") == 0) {
          $final = "B/C";
      }

      mysqli_query($conex, "CALL updateDispo($dispositivo,'$nserie','$fecha',$marca,'$modelo','$reemplazo','$descripcion',$kilometro,$metro,'$final',$tramo,$idDispo,'" . $_SESSION["ncontrol"] . "')");
  }
header("Location: ../dispositivos.php");




?>