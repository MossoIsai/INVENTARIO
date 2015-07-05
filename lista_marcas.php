<!doctype html>
<html lang="es">
<?php
require "menu.php";
session_start();
if($_SESSION["sesionOk"] != "si"){
    header("Location: index.php");
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Lista de Marcas</title>
    <link rel="stylesheet" href="css/principal.css"/>
    <link rel="stylesheet" href="css/filtergrid.css"/>
    <script src="js/tablefilter.js"></script>
</head>
<body>
<center>
    <h3 id="subti">Agregas Marcas</h3>
    <form method="post" action="controll/agregarMarca.php">

        <label>Ingresa el nombre de la Marca: </label>
        <input type="text" class="form-control" placeholder="Marca" id="dispo" name="marca" required=""/><br/>
        <input type="submit" class="btn btn-primary" value="GUARDAR"/>
    </form>
</center>
<br/>
<center>
    <table class="table table-hover table-bordered table-striped" id="tabla-marca">
        <thead>
        <tr>
            <th>#</th>
            <th>MARCA</th>
            <th>ELIMINAR</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include "controll/Conexion.php";

        function statusMarca($nameMarca,$status){
            if($status == 0){
                return '<center><a class="btn btn-success" href="controll/modificaUsuario.php?borrarmarca='.$nameMarca.'">Activado</a></center>';
            }else if($status == 1){
                return  '<center><a class="btn btn-danger" href="controll/modificaUsuario.php?activarmarca='.$nameMarca.'">Borrado</a></center>';
            }
        }
        $consulta = mysqli_query($conex,"CALL consulMarca");
        $contador = 0;
        while($fila = mysqli_fetch_row($consulta)){
            echo "<tr><td>".++$contador."</td><td><a href='modificaMarca.php?idMarca=$fila[0]'>$fila[0]</a></td><td>".statusMarca($fila[0],$fila[1])."</td></tr>";
        }
        ?>
        </tbody>
    </table>
</center>
<style>
    #tabla-marca{
        width: 40%;
    }
</style>
<script>
    var tableMarca = setFilterGrid("tabla-marca");
    $('#dispo').keyup(function(){
        this.value = this.value.toUpperCase();
    });
</script>
</body>
</html>