<!doctype html>
<?php
   require_once("menu.php");
   session_start();
   if($_SESSION["sesionOk"] != "si"){
       header("index.php");
       exit;
   }
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/principal.css"/>
    <title>Computadora</title>
</head>
<body>
<h3 id="subti">DISPOSITIVOS</h3>
<hr/>
 <!-- Buscador -->
 <center> 
 <div class="col-md-12">
    <div class="input-group input-group-lg" id="user">
        <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
        <input type="text" class="form-control" name="buscar" id="buscador" placeholder="Buscar" required=""><br>
    </div>
    <br/>
</div>
</center>


<!-- table responsiva -->
<div class="table-responsive">
<table class="table table-hover table-bordered  table-striped">
    <thead>
    <tr>
        <!--Encabezados de la tabla de Computadora-->
        <th>#</th>
        <th>Dispositivo</th>
        <th>N.Serie</th>
        <th>Precio</th>
        <th>Fecha.Registro</th>
        <th>Fecha.Compra</th>
        <th>Reemplazado</th>
        <th>Descripcion</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Eje</th>
        <th>Tramo</th>
        <th>Kilometro</th>
        <th>Metro</th>
        <th>Fotos</th>
    </tr>
    </thead>
    <tbody>
       <!-- Contenido de tabla-->
       <?php
         include("controll/Conexion.php");
          include("controll/misMetodos.php");
          $contador = 1;
          $consulta =  mysql_query(" CALL consultaDispositivos");
          while($fila = mysql_fetch_array($consulta)){
              echo "<tr><td>".$contador++."</td><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>".modificaMes($fila[3])."</td><td>".modificaMes($fila[4]).
                  "</td><td>".reemplazo($fila[5])."</td><td>$fila[6]</td><td>$fila[7]</td><td>$fila[8]</td><td>$fila[9]</td><td>$fila[10]</td><td>$fila[11]</td><td>$fila[12]</td><td><a href=''>$fila[13]</a></td> </tr>";
          }
       mysql_close($conex);
       ?>
    </tbody>
</table>
</div><!--Fin de la tabla responsiva -->

</body>
</html>