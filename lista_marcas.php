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
    <link rel="stylesheet" href="dist/css/bootstrap.min.css"/>
</head>
<body>
<h3 id="subti">Agregas Marcas</h3>
<hr/>
<center>
    <form method="post" action="controll/agregarMarca.php">

        <label>Ingresa el nombre de la Marca: </label>
        <input type="text" class="form-control" placeholder="Marca" id="dispo" name="marca" required=""/><br/>
        <input type="submit" class="btn btn-primary" value="GUARDAR"/>
    </form>
</center>
<br/>
<center>
    <table class="table table-hover table-bordered table-striped" id="tableObjeto">
        <thead>
        <tr>
            <th>#</th>
            <th>MARCA</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include "controll/Conexion.php";
        $consulta = mysqli_query($conex,"CALL consulMarca");
        $contador = 0;
        while($fila = mysqli_fetch_row($consulta)){
            echo "<tr><td>".++$contador."</td><td>$fila[0]</td></tr>";
        }
        ?>
        </tbody>
    </table>
</center>
<script>
    $('#dispo').keyup(function(){
        this.value = this.value.toUpperCase();
    });
</script>
</body>
</html>