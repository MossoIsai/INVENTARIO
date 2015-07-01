<!DOCTYPE html>
<?php
require_once("menu.php");
session_start();
if($_SESSION["sesionOk"] != "si"){
    header("Location: index.php");
    exit;
}

//echo $_GET['email'];
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="css/principal.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <title>Usuarios</title>
</head>
<body>
<h3 id="subti">MODIFICA CONTRASEÑA</h3>
<form action="controll/modificaUsuario.php" method="post">
    <div align="center">
        <h4 id="subti">Ingresa nueva contraseña</h4>
        <?php
        echo '<h5><center>USUARIO</center></h5>';
        echo '<input type="text" readonly="true" size="40" value="'.$_GET['email'].'" class="form-control" name="usuario" placeholder="Usuario" required="" id="modpass"><br/>';
        ?>
        <h5><center>NUEVA CONTRASEÑA</center></h5>
        <input type="text" size="40" class="form-control" name="contra" placeholder="Nueva contraseña" required="" id="modpass"><br/>
    </div>
    <center><input type="submit" class="btn btn-primary btn-lg"  name="modificar" value="modificar" id="btnguardar"></center><br/>
</form><!-- fin del formulario-->
</div><!-- fin del div principal--> <br/><br/>
</body>

</html>