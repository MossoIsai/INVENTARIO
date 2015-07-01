<?php
session_start();
if($_SESSION["sesionOk"] != "si"){
    header("Location: index.php");
    exit;
}
require_once 'Zebra_Pagination.php';
require_once("menu.php");

if(isset($_GET['repetido'])){
    echo '<script>alert("El Dispositivo ya se encuentra Registrado");</script>';
}

?>
<!DOCTYPE html>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/principal.css"/>
    <link rel="stylesheet" href="css/zebra_pagination.css"/>
    <link rel="stylesheet" href="dist/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/filtergrid.css"/>
    <script type="text/javascript" src="js/tablefilter.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!--JQuery-->
    <script src="js/jquery.js">
    </script>
    <title>Usuarios</title>
</head>
<body>
<h3 id="subti">Registrar Usuarios al Sistema </h3>
  <div id="agregar" class="col-md-12 hidden" >
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
    <button class="btn btn-primary" id="adduser">Agregar Usuario</button>

    <br/>
</div>
</center>
<div class="table-responsive" id="tab-user" >
<table class="table table-hover table-bordered table-striped" id="tab-usuario" >
    <thead>
    <tr>
        <th>#</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>CORREO</th>
        <th>CARGO</th>
        <th>PRIVILEGIO</th>
        <th>ELIMINADOS</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //CONSULTA DE TABLA DE USUARIOS
    include "controll/Conexion.php";
    include_once 'controll/modificaUsuario.php';
    $conta = 1;

    //cuando registros tengo de la tabla
    $query ="SELECT UsuNombre FROM USUARIO";
    $res = $conex->query($query);
    $totalRegistros = mysqli_num_rows($res);//numero total de filas

    //registros por pagina
    $resultXpages = 10;

    $paginacion = new Zebra_Pagination();
    $paginacion->records($totalRegistros);
    $paginacion->records_per_page(10);
    $inicio = (($paginacion->get_page()-1)*$resultXpages);

    function statusUsuario($email,$status){
        if($status == 0){
            return '<center><a class="btn btn-danger" href="controll/modificaUsuario.php?email='.$email.'">Borrar</a></center>';
        }else if($status == 1){
            return  '<center><a class="btn btn-success" href="controll/modificaUsuario.php?email1='.$email.'">Activar</a></center>';
        }
    }
    $result = mysqli_query($conex,"CALL consulUsuario($inicio,10)");
    while($fila1 = mysqli_fetch_row($result)){
    echo "<tr>
        <td>".$conta++."</td>
        <td>$fila1[1]</td>
        <td>$fila1[2]</td>
        <td>$fila1[4]</td>
        <td>$fila1[5]</td>
        <td>$fila1[6]</td>
        <td>".statusUsuario($fila1[4],$fila1[7])."</td>

    </tr>";
    }
    mysqli_close($conex);
    ?>

    </tbody>
</table>
</div>
    <?php $paginacion->render(); ?>
</body>
<script type="text/javascript">
   //evento clock sobre agregar usuario
   $('#adduser').click(function () {
       $('#agregar').removeClass('hidden');
       $('#adduser').addClass('hidden');

   });
    //evento sobres el evento del teclado para pasar a mayusculas
    $('#nombre,#apellido').keyup(function(){
       this.value = this.value.toUpperCase();
    });


</script>
<script>
    var tf1 = setFilterGrid("tab-usuario");
</script>
</html>