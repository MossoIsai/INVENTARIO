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
    <link rel="stylesheet" href="dist/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/principal.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Usuarios</title>
    <script src="js/jquery.js"></script>
</head>
<body>
<h3 id="subti">Registro de Tramo Carrtero</h3>
<form action="controll/registraTramo.php" method="post">
    <div align="center">
        <h4 id="subti">Selecciona Eje</h4>
        <!-- cuando un cambio en el Item onchange-->
        <select name="eje"  id="Eje" class="form-control" required=""  >
            <option value="">Selecciona un Tramo Carretero</option>
            <?php
            include("controll/Conexion.php");
            $id = mysqli_query($conex,"CALL consulEje");
            while($fila = mysqli_fetch_array($id)){
                echo "<option value=".$fila[0].">$fila[1]</option>";
            }
            mysqli_close($conex);
            ?>
        </select>
        <h4 id="subti">Ingresa Eje Carretero</h4>
        <input type="text" size="40" class="form-control" name="eje" placeholder="Ej. Mexico-Acapulco" required="" id="eje"><br/>
    </div>
    <center><input type="submit" class="btn btn-lg btn-warning "  value="GUARDAR" id="btnguardar"></center><br/>
</form><!-- fin del formulario-->
</div><!-- fin del div principal-->
<br/><br/>
<center>
    <div class="table-responsive" id="tab-p">
        <table class=" table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>TRAMO</th>
            </tr>
            </thead>
            <tbody id="cuerpo">
            <?php
            require("controll/Conexion.php");
            $contador = 0 ;
            $valor =  $_GET['variable'];
            $query = mysqli_query($conex,"CALL consulTramo('$valor')");
            while($fila2 =  mysqli_fetch_row($query)){
                echo "<tr><td>".++$contador."</td><td>$fila2[0]</td></tr>";
             }
            ?>
            </tbody>
        </table>
    </div>
</center>
</body>
<script>
    $('#Eje').change(function () {
        var lista = document.getElementById("Eje");
        var indiceSeleccionado = lista.selectedIndex;
        var opcionSeleccionada = lista.options[indiceSeleccionado].text;
        //var textoSeleccionado = opcionSeleccionada.text;
        document.location.href="listaTramos.php?variable="+opcionSeleccionada;

    });
</script>

</html>