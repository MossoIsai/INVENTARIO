<!Doctype html>
<?php
  require_once("menu.php");
  session_start();
  if($_SESSION["sesionOk"] != "si"){
      header("Location: index.php");
      exit;
  }
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Bitacora</title>
    <link rel="stylesheet" href="css/principal.css"/>
</head>
<body>
 <h3 id="subti">Bitacora</h3>
 <!-- BUSCADOR-->
<div class="col-md-12">
    <div class="input-group input-group-lg" id="user">
        <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
        <input type="text" class="form-control" name="buscar" id="buscador" placeholder="Buscar Registro" required=""><br>
    </div><br>
</div> <!-- fin del buscador de la tabla-->



 <!-- Tabla reponsiva -->
 <div class="table-responsive">
  <table class="table table-hover table-bordered table-striped">
     <thead>
     <tr>
         <th>#</th>
         <th>NOMBRE</th>
         <th>CONSULTA</th>
         <th>FECHA LEVANTAMIENTO</th>
     </tr>
     </thead>
     <tbody>
     <?php
      include "controll/Conexion.php";
       $resultado = mysqli_query($conex,"CALL consulBit");

     
     //funcion para modificar el mes
      function modificaMes($cadena)
      {
          $mes = substr($cadena, 5, 2);
          $entero = intval($mes);
          $meses = array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jul', 'Jun', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');
          for ($i = 0; $i < sizeof($meses); $i++) {
              if ($entero -1 == $i) {
                  $valor = $meses[$i];
              }
          }
        return  $valorfinal = str_replace($mes, $valor, $cadena);
      }//fin del metodo

        while($fila = mysqli_fetch_array($resultado)){
          echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>".modificaMes($fila[3])."</td></tr>";
        }
       mysqli_close($conex);
     ?>

     </tbody>
  </table>
 </div>
</body>
</html>