<!doctype html>
<?php
  require_once("menu.php");
  session_start();
 if($_SESSION["sesionOk"] !=  "si"){
    header("Location:index.php");
    exit;
 }
  if(isset($_GET["datosnull"])){
      echo "<script>alert('El usuario no se encuentra registrado en la Base de Datos')</script>";
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/principal.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Modifica Usuario</title>
</head>
<body>
 <h3 id="subti">Modificar Usuario</h3>
 <div>
     <form action="controll/buscaNumero.php" method="POST">
         <input type="text" class="form-control" required="" placeholder="Ingresa el numero de empleado" id="centrado" name="numero"/><br>
         <input type="submit" class=" btn btn-lg btn-info btn-block" id="btnbusca" value="BUSCAR"/>
     </form>
 </div>
 <hr>

 <div id="agregar" class="col-md-12">
     <form action="controll/registraUsuario.php" method="post">
         <div class="col-md-4">
             <input type="text" class="form-control" name="nombre" placeholder="Nombre" required="" id="nombre" /><br/>
             <input type="text" class="form-control" name="nempleado" placeholder="Numero Empleado" required="" id="nempleado"/>
         </div>
         <div class="col-md-4">
             <input type="text" class="form-control" name="apellido" placeholder="Apellido" required="" id="apellido"/><br/>
             <select name="cargo" id="" class="form-control">
                 <option value="">Selecciona un Cargo</option>
                 <?php
                 include("controll/Conexion.php");
                 $contador = 1;
                 $consulta =  mysqli_query($conex,"CALL llenaCargo");

                 while($fila = mysql_fetch_array($consulta)){
                     echo "<option value=".$contador++.">$fila[0]</option>";
                 }
                 mysqli_close($conex);
                 ?>
             </select> <br>
         </div>
         <div class="col-md-4">
             <input type="text" class="form-control" name="pwd" placeholder="password" required="" id="pwd"/><br/>
             <select name="privilegio" id="" class="form-control">
                 <option value="">Selecciona un Privilegio</option>
                 <?php
                 include "controll/Conexion.php";
                 $resultado =  mysqli_query($conex,"CALL llenaPriv");
                 $conta = 1;
                 while($fila = mysql_fetch_array($resultado)){
                     echo "<option value=".$conta++.">$fila[0]</option>";
                 }
                 mysqli_close($conex);
                 ?>
             </select><br>
         </div>
         <center>
           <input type="submit" class="btn btn-primary btn-lg" value="GUARDAR CAMBIOS" id="guardaCambios" >        
         </center>
     </form><!-- fin del formulario-->
 </div><!-- fin del div principal-->

 <script type="text/javascript">
     //Query para solo aceptar numeeros (nempleado)
     $('#nuum,#centrado').keyup(function(){

         this.value = this.value.replace(/[^0-9]/g,'');
     });

     $('#nombre,#apellido,#cargo').keyup(function(){
         this.value = this.value.toUpperCase();
     });
 </script>
</body>
</html>