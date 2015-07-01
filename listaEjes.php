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
    <link rel="stylesheet" href="css/principal.css"/>
    <link rel="stylesheet" href="dist/css/bootstrap-theme.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Usuarios</title>
</head>
<body>
<h3 id="subti">Registro de Eje Carrtero</h3>
<form action="controll/registraEje.php" method="post">
    <div align="center">
        <h4 id="subti">Ingresa Eje Carretero</h4>
        <input type="text" size="40"  name="eje" placeholder="Ej. Mexico-Acapulco" required="" id="eje"><br/>
    </div>
    <br/>
    <center><input type="submit" class="btn btn-warning btn-lg" value="REGISTRAR"></center><br/>
</form><!-- fin del formulario-->
</div><!-- fin del div principal--> <br/><br/>
<center>
    <div class="table-responsive" id="tab-small">
        <table class=" table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Eje</th>
            </tr>
            </thead>
            <tbody>
            <?php

            function modificaEje($nombreEje){
                return "<center><a href='modificaEje.php?eje=$nombreEje'>$nombreEje</a></center>";
            }

            require_once("controll/Conexion.php");

            $contador = 0 ;
            $query = mysqli_query($conex,"SELECT EjeNombre FROM EJE");
            while($fila =  mysqli_fetch_array($query)){
                echo "<tr><td>".++$contador."</td><td>".modificaEje($fila[0])."</td></tr>";
            }
            mysql_close($conex);
            ?>
            </tbody>
        </table>
    </div>
</center>
</body>
 <script>

 </script>
</html>