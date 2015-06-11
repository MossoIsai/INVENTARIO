<?php
 include ("Conexion.php");
 session_start();
 if(! isset($_SESSION["ncontrol"])){
     header("Location: ../index.php");
     exit;
 }
  /** DATOS DE USUARIO OBTENIDOS POR [POST]*/
 $nameUsuario = $_POST["nombre"];
 $apellido = $_POST["apellido"];
 $pass = $_POST["pwd"];
 $nempleado = $_POST["nempleado"];
 $cargo = $_POST["cargo"];
 $priv = $_POST["privilegio"];



 //primer parametro para el StoreProcedure
 $consulta = mysqli_query($conex,"CALL insertUsuario('".$_SESSION["ncontrol"]."','$nameUsuario','$apellido','$pass','$nempleado',$cargo,$priv)");
   mysqli_close($conex);

 header("Location:../super.php");

?>