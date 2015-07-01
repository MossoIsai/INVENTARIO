<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/principal.css"/>
</head>
<body>


<div class="table-responsive">
    <table class="table table-hover table-bordered  table-striped">
        <thead>
        <tr>
            <!--Encabezados de la tabla de Computadora-->
            <th>#</th>
            <th>Dispositivo</th>
            <th>N.Serie</th>
            <th>Marca</th>

        </tr>
        </thead>
        <tbody>
<?php
//Abro nuevamente PHP
include("controll/Conexion.php");
 $query = mysqli_query($conex,"CALL consulCompo('CAPUFE-2001')");
while ($fila2 = mysqli_fetch_array($query)) {

    echo "<tr><td>$fila2[0]</td><td>$fila2[1]</td><td>$fila2[2]</td><td>$fila2[3]</td></tr>";
}
?>
</tbody>
 </table>
 </div>
</body>
</html>