<?php
 include_once "menu.php";
 session_start();
 if($_SESSION["sesionOk"] !=  "si"){
   header("Location: index.php");
 }
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Componentes</title>
    <link rel="stylesheet" href="css/filtergrid.css"/>
    <script src="js/tablefilter.js"></script>
    <script src="js/jquery.js"></script>
    <style>
        #tabla-componentes,#componente{
            width: 35%;

        }
    </style>
</head>
<body>
<center>
    <h3 >Agregar Dispositivos</h3>
    <form method="post" action="controll/agregarObjeto.php">
        <input type="text" class="form-control" placeholder="Ingresa el nombre del componente" id="componente" name="componente" required=""/><br/>
        <input type="submit" class="btn btn-primary" value="GUARDAR"/>
    </form>
</center>
<br/>
<center>
    <table class="table table-hover table-bordered table-striped" id="tabla-componentes">
        <thead>
         <tr>
            <th>#</th>
            <th>NOMBRE COMPONENTE</th>
            <th>ELIMINAR</th>
         </tr>
        </thead>
        <tbody>
        <?php
           //CODE PHP
          include_once "controll/Conexion.php";
          $queryCompo = mysqli_query($conex,"SELECT ComNombre,ComBorrado FROM COMPONENTE");
          $contador = 0;
          function statusComponente($namecompo,$status){
             if($status == 0){
                return '<center><a class="btn btn-success" href="controll/modificaUsuario.php?borrarcompo='.$namecompo.'">Activado</a></center>';
             }else if($status == 1){
                return  '<center><a class="btn btn-danger" href="controll/modificaUsuario.php?activarcompo='.$namecompo.'">Borrado</a></center>';
             }
           }
          if($queryCompo ==  true){
            while($fila = mysqli_fetch_row($queryCompo)){
              echo "<tr><td>".++$contador."</td><td><a>$fila[0]</a></td><td>".statusComponente($fila[0],$fila[1])."</td></tr>";
            }
          }else{
              echo "Error en la consulta de MSQL";
          }
        ?>
        </tbody>
    </table>
    <script>
        var table_components = setFilterGrid("tabla-componentes");

    </script>
</body>
</html>