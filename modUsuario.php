<!doctype html>
<?php
require_once("menu.php");
session_start();
if($_SESSION["sesionOk"] !=  "si"){
    header("Location:index.php");
    exit;
}
 $ID = $_GET['id'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/principal.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Reestablecer contraseña</title>
</head>
<body>
<h3 id="subti">Modificar Usuario</h3>
<center>
   <div>
     <form action="controll/password.php" method="POST">
       <?php
        echo "<input type='text' class='form-control hidden' required='' placeholder='Ingresa el correo del empleado' name='id' value='$ID'/>"; ?>
        <input type="text" class="form-control" required="" placeholder="Ingresa tu nueva contraseña" id="centrado" name="newPass"/><br>
        <input type="submit" class="btn btn-block btn-lg btn-success" id="guardar" value="GUARDAR CAMBIOS" name="restablecer"/>
     </form>
   </div>
</center>
<style>
   #guardar{
       width: 30%;
   }
</style>
</body>
</html>