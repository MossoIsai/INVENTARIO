<?php
  include "Conexion.php";
 session_start();
if(! isset($_SESSION["ncontrol"])){
    header("Location: ../index.php");
    exit;
}
  $numero_empleado =  $_POST["numero"];
   $total = mysqli_num_rows(mysqli_query($conex,"CALL BuscaXUsuario('".$_SESSION["ncontrol"]."','$numero_empleado')"));

   $consulta = mysqli_query($conex,"CALL BuscaXUsuario('".$_SESSION["ncontrol"]."','$numero_empleado')");
   if($total == 0){
       header("Location: ../modUsuario.php?datosnull=1");
   }else{
     while($fila = mysqli_fetch_row($consulta)){

     }
   }



?>