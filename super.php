<!DOCTYPE html>
<?php
  require_once("menu.php");
  session_start();
  if($_SESSION["sesionOk"] != "si"){
    header("Location: index.php");
    exit;
 }


?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="css/principal.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!--JQuery-->
    <script src="js/jquery.js">
    </script>
    <title>Usuarios</title>
</head>
<body>
<h3 id="subti">Registrar Usuarios al Sistema </h3>
  <div id="agregar" class="col-md-12">
      <form action="controll/registraUsuario.php" method="post">
      <div class="col-md-4">
          <input type="text" class="form-control" name="nombre" placeholder="Nombre" required="" id="nombre" /><br/>
          <input type="text" class="form-control" name="nempleado" placeholder="Em@il" required="" id="nempleado"/>
      </div>
      <div class="col-md-4">
          <input type="text" class="form-control" name="apellido" placeholder="Apellido" required="" id="apellido"/><br/>
          <select name="cargo" id="" class="form-control">
              <option value="">Selecciona un Cargo</option>
              <?php
                  include("controll/Conexion.php");
                  $id = mysqli_query($conex,"SELECT CargId,CargNombre FROM CARGO");
                  while($fila = mysqli_fetch_array($id)){
                      echo "<option value=".$fila[0].">$fila[1]</option>";
                  }
                 mysqli_close($conex);
              ?>
          </select><br/>

      </div>
      <div class="col-md-4">
          <input type="text" class="form-control" name="pwd" placeholder="password" required="" id="pwd"/><br/>
          <select name="privilegio" id="" class="form-control">
              <option value="">Selecciona un Privilegio</option>
              <?php
                 include "controll/Conexion.php";
                  $resultado =  mysqli_query($conex,"CALL llenaPriv");
                  $conta = 1;
                 while($fila = mysqli_fetch_array($resultado)){
                    echo "<option value=".$conta++.">$fila[0]</option>";
                  }
              mysqli_close($conex);
              ?>
          </select>
      </div>
          <br/>
          <div class="col-lg-12">
              <center>
                  <input type="submit" class="btn btn-lg btn-primary"  value="GUARDAR" id="save">
              </center>
          </div>
      </form><!-- fin del formulario-->
  </div><!-- fin del div principal-->

<!--Buscador de filtrado -->
<center>
  
<div class="col-md-12"><br>
    <div class="input-group input-group-lg" id="user">
        <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
        <input type="text" class="form-control" name="buscar" id="buscador" placeholder="Buscar" required=""><br>
    </div>
    <br/>
</div>
</center>
<div class="table-responsive">
<table class="table table-hover table-bordered table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>EM@IL</th>
        <th>CARGO</th>
        <th>PRIVILEGIO</th>
        <th>ELIMINADOS</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $contadorUsuario = 1;
    //CONSULTA DE TABLA DE USUARIOS
      include "controll/Conexion.php";

       $result = mysqli_query($conex,"CALL consulUsuario");

       while($fila1 = mysqli_fetch_row($result)){
           echo "<tr><td>".$contadorUsuario++."</td><td>$fila1[1]</td><td>$fila1[2]</td><td>$fila1[4]</td><td>$fila1[5]</td><td>$fila1[6]</td><td><center><input type='checkbox' disabled /></center></td></tr>";
       }
      mysqli_close($conex);
    ?>

    </tbody>
</table>
</div>
</body>
<script type="text/javascript">
    //Query para solo aceptar numeeros (nempleado)
   /*$('#nempleado').keyup(function(){

     this.value = this.value.replace(/[^0-9]/g,'');
   });*/

    $('#nombre,#apellido').keyup(function(){
       this.value = this.value.toUpperCase();
    });

</script>
</html>