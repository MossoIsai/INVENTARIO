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
    <link rel="stylesheet" href="css/filtergrid.css"/>
    <script src="js/tablefilter.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Lista de Ejes</title>
</head>
<body>
<center><h3>Registro de Eje Carrtero</h3></center>
<form action="controll/registraEje.php" method="post">
    <div align="center">
        <input type="text" size="40"  name="eje" class="form-control" placeholder="Ingresa el eje carretero" required="" id="eje"><br/>
    </div>
    <br/>
    <center><input type="submit" class="btn btn-primary btn-lg" value="REGISTRAR"></center><br/>
</form><!-- fin del formulario-->
</div><!-- fin del div principal--> <br/><br/>
<center>
    <div class="table-responsive" >
        <table class=" table table-bordered table-hover table-striped" id="tabla-ejes">
            <thead>
            <tr>
                <th>#</th>
                <th>EJE</th>
                <th>ELIMINAR</th>

            </tr>
            </thead>
            <tbody>
            <?php
            function modificaEje($nombreEje){
                return "<center><a href='modificaEje.php?eje=$nombreEje'>$nombreEje</a></center>";
            }

            require_once("controll/Conexion.php");

            function statusEje($name_eje,$status){
                if($status == 0){
                    return '<center><a class="btn btn-success" href="controll/modificaUsuario.php?borrarEje='.$name_eje.'">Activado</a></center>';
                }else if($status == 1){
                    return  '<center><a class="btn btn-danger" href="controll/modificaUsuario.php?activarEje='.$name_eje.'">Borrado</a></center>';
                }
            }
            $contador = 0 ;
            $query = mysqli_query($conex,"SELECT EjeNombre,EjeBorrado FROM EJE");
            while($fila =  mysqli_fetch_array($query)){
                echo "<tr><td>".++$contador."</td><td>".modificaEje($fila[0])."</td><td>".statusEje($fila[0],$fila[1])."</td></tr>";
            }
            mysql_close($conex);
            ?>
            </tbody>
        </table>
    </div>
</center>
</body>
<style>
    #eje{
        width: 40%;
    }
    #tabla-ejes{
        width: 35%;
    }
    .table tbody tr:hover td, .table tbody tr:hover th {
        background-color: #faf2cc;
    }
</style>
 <script>
    var tablaEjes = setFilterGrid("tabla-ejes");
 </script>
</html>