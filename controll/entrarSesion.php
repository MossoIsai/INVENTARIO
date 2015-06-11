<?php
/*variable para guardar el usuario
   * y passswors por POST*/
//Con esta session obtengo el nombre del usuario;
$usuario = $_POST["usuario"];
$pass = $_POST["pwd"];
include("Conexion.php");
 //Seteo de las variables a String
settype($usuario,string);
settype($pass,string);
  //Verifico si el usuario existe
  //con ese procedimiento tambien se saca la privlegio
$md5pass = md5($pass);
$ingresaUsuario =  mysqli_query($conex,"CALL ingresaUsuario('$usuario','$md5pass')");
$resultado = mysqli_fetch_array($ingresaUsuario);
/*Imprimo para que ver que privilegio Tiene el Usuario
 Obtengo el Privilegio de la consulta anterior de la tabla USUARIO
*/
    $privilegio =  $resultado['PrivId'];
   //evaluo el privilegio obtenido en 3 categorias
  if($privilegio == 1){
      session_start();//inicia Sesion
      // y manda la siguiente Página
      header("Location:../super.php");
      $_SESSION["sesionOk"] = "si"; //variable de Session

      //obtener el numeroTrabajador  a travez de una variable global de $_SESSION['']
      $_SESSION['ncontrol'] = $usuario;
      mysqli_close($conex);

  }else if($privilegio == 2){
      session_start();
      header("Location:../admon/admon.php");
      $_SESSION["sesionOk"] = "si";
      $_SESSION["ncontrol"] = $usuario;
      mysqli_close($conex);

    }else if($privilegio == 3){
      session_start();
      header("Location: ../usuarios/compuUsuario.php");
      $_SESSION["sesionOk"] = "si";
      $_SESSION["ncontrol"] = $usuario;
     mysqli_close($conex);
    }else{// DE OTRO MODO
      header("Location:../index.php?errorUsuario=1");
      mysqli_close($conex);
  }

?>
