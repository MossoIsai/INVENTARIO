<?php
  require_once("menu.php");
  session_start();
  if($_SESSION["sesionOk"] != "si"){
      header("Location: index.php");
      exit;
  }
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="css/principal.css"/>
    <link rel="stylesheet" href="css/smoothness/jquery-ui-1.8.23.custom.css"/>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/filtergrid.css"/>
    <script src="js/tablefilter.js"></script>
    <script src="js/jquery.js"></script>
    <title>Información de los Dispositivos</title>
</head>
<body>
<h3 id="subti">DISPOSITIVOS</h3>
<hr/>
<br/>
<!-- table responsiva -->
<div class="table-responsive">
<table class="table table-hover table-bordered  table-striped" id="tab-dispo">
    <thead>
    <tr>
        <!--Encabezados de la tabla de Computadora-->
        <th>#</th>
        <th>Dispositivo</th>
        <th>N.Serie</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Fecha Levantamiento</th>
        <th>Reemplazado</th>
        <th>Descripcion</th>
        <th>Eje</th>
        <th>Tramo</th>
        <th>Cuerpo</th>
        <th>Cadenamiento</th>
        <th>Fotografias_dispositivo</th>
        <th>Modificar</th>
        <th>Componentes</th>

    </tr>
    </thead>
    <tbody>
       <!-- Contenido de tabla-->
       <?php

         include("controll/Conexion.php");
          include("controll/misMetodos.php");
          $contador = 1;
          $consulta =  mysqli_query($conex," CALL consultaDispositivos");

          while($fila = mysqli_fetch_row($consulta)) {
              echo "<tr><td>" . $contador++ . "</td><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td>".
                  "<td>" . modificaMes($fila[5]) . "</td><td>" . reemplazo($fila[6]) . "
                   </td><td>$fila[7]</td><td>$fila[8]</td><td>$fila[9]</td><td>$fila[10]</td><td>
                   " . cadenamiento($fila[11]) . "+" . cadenamiento($fila[12]) . "</td>
                  <td><a href='viewPic.php?fotos=$fila[14]'>$fila[14]</a></td>
                  <td><a class='btn btn-small btn-success ' href='modificaDispo.php?numeroSerieDispo=$fila[1]'>Editar</a></td>
                  <td>
                  <div class='table-responsive'>
                 <table class='table  table-bordered'>
                 <thead>
                  <th>Componente</th>
                  <th>Nserie</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                 </thead>
                      <tbody>";
              ?>
              <?php
              //Abro nuevamente PHP
              include("controll/Conexion.php");
              $query = mysqli_query($conex,"CALL consulCompo('$fila[1]')");
              while ($fila2 = mysqli_fetch_array($query)) {

                  echo "<tr class='success'><td>$fila2[0]</td><td>$fila2[1]</td><td>$fila2[2]</td><td>$fila2[3]</td></tr>";
              }
              ?>

              <?php
              echo "   </tbody>
                      </table>
                 </div></td></tr>";
          }// fin del WHILE DE ARRIBA

       ?>

    </tbody>
</table>
</div><!--Fin de la tabla responsiva -->


</div>
<script>
    var tf1 = setFilterGrid("tab-dispo");

</script>
</body>
</html>