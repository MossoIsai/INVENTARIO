<!doctype html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<?php
   require "menu.php";
   require_once "Zebra_Pagination.php";
   session_start();
   if($_SESSION["sesionOk"] != "si"){
       header("Location: index.php");
       exit;
   }
if(isset($_GET['repetido'])){
    echo '<script>alert("El Dispositivo ya se encuentra Registrado");</script>';
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Lista de Objetos</title>
    <link rel="stylesheet" href="css/zebra_pagination.css"/>
    <link rel="stylesheet" href="css/filtergrid.css"/>
    <script src="js/tablefilter.js"></script>
</head>
<body>
   <center>
       <h3 >Agregar Dispositivos</h3>
       <form method="post" action="controll/agregarObjeto.php">

        <input type="text" class="form-control" placeholder="Ingresa el nombre del dispositivo" id="dispo" name="objeto" required=""/><br/>
        <input type="submit" class="btn btn-primary" value="GUARDAR"/>

    </form>
    </center>
   <br/>
   <center>
   <table class="table table-hover table-bordered table-striped" id="tabla-obj">
       <thead>
       <tr>
           <th>#</th>
           <th>NOMBRE DISPOSITIVO</th>
           <th>MODIFICAR</th>
       </tr>
       </thead>
       <tbody>
        <?php
          include "controll/Conexion.php";
        $query ="SELECT * FROM OBJETO";
        $res = $conex->query($query);
        $totalRegistros = mysqli_num_rows($res);//numero total de filas

        $paginacion = new Zebra_Pagination();
        $paginacion->records($totalRegistros);
        $paginacion->records_per_page(10);
        $inicio = ($paginacion->get_page()-1)* 10;

        function statusDispositivos($namedispo,$status){
            if($status == 0){
                return '<center><a class="btn btn-success" href="controll/modificaUsuario.php?borrardispo='.$namedispo.'">Activado</a></center>';
            }else if($status == 1){
                return  '<center><a class="btn btn-danger" href="controll/modificaUsuario.php?activardispo='.$namedispo.'">Borrado</a></center>';
            }
        }
          $consulta = mysqli_query($conex,"CALL consulObjetos($inicio,10)");
          $contador = 0;
          while($fila = mysqli_fetch_array($consulta)){
              echo "<tr><td>".++$contador."</td><td><a href='modificaDispoLista.php?dispo=$fila[0]'>$fila[0]</a></td><td>".statusDispositivos($fila[0],$fila[1])."</td></tr>";
          }
        ?>
       </tbody>
       </table>
       </center>
   <?php
     $paginacion->render();
   ?>
   <script>
     $('#dispo').keyup(function(){
     this.value = this.value.toUpperCase();
     });
   </script>
   <script>
       var tablaDispositivos = setFilterGrid("tabla-obj");
   </script>
<style>
    #dispo{
        width: 40%;
    }
    #tabla-obj{
        width: 35%;
    }
</style>
</body>
</html>