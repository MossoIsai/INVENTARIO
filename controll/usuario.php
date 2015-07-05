<?php
  include_once 'Conexion.php';
session_start();
if(! isset($_SESSION["ncontrol"])){
    header("Location: ../index.php");
    exit;
}
 $id = $_POST['numId'];
 $nombre = $_POST['nombre'];
 $apellido = $_POST['apellido'];
 $pass = $_POST['pass'];
 $cargo = $_POST['cargo'];
 $privilegio = $_POST['privilegio'];

   $queryChangeUser= mysqli_query($conex," CALL updateUser('$nombre','$apellido','$pass',$cargo,$privilegio,$id,'".$_SESSION["ncontrol"]."')");
    if($queryChangeUser == false){
       echo "Error";
   }else{
       header("Location: ../super.php");
   }




?>