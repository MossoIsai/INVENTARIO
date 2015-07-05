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
    <link rel="stylesheet" href="css/zebra_pagination.css"/>
    <link rel="stylesheet" href="css/filtergrid.css"/>
    <script type="text/javascript" src="js/tablefilter.js"></script>
    <link rel="stylesheet" href="dist/css/bootstrap-theme.min.css"/>
</head>
<body>
 <center><h3>Bitacora</h3></center>
 <!-- Tabla reponsiva -->
 <div class="table-responsive"  >
  <table class="table table-hover table-bordered table-striped" id="tab-bitacora">
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
     include "Zebra_Pagination.php";
     include "controll/Conexion.php";

     $query ="SELECT * FROM BITACORA";
     $res = $conex->query($query);
     $totalRegistros = mysqli_num_rows($res);//numero total de filas

     $paginacion = new Zebra_Pagination();
     $paginacion->records($totalRegistros);
     $paginacion->records_per_page(50);
     $inicio = ($paginacion->get_page()-1)* 50;

       $resultado = mysqli_query($conex,"CALL consulBit($inicio,50)");

     
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
     <?php
     $paginacion->render();
     ?>
 </div>
 <style>
     .table tbody tr:hover td, .table tbody tr:hover th {
         background-color: #faf2cc;
     }
 </style>
<script>
    var tabBitacora = setFilterGrid("tab-bitacora");
</script>
</body>
</html>