<?php
require "menu.php";
session_start();
if($_SESSION["sesionOk"] != "si"){
    header("Location: index.php");
    exit;

}

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modifica Dispositivo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <script src="js/jquery.js"></script>
</head>
<body>
  <center><h2>Modifica Usuario</h2></center>
  <center>
  <form action="controll/modDispositivo.php" method="POST">
      <?php
      echo "<input type='text' class='form-control hidden' placeholder='Ingresa el nombre del dispositivo' id='dispo' required='' name='dispo' value='".$dispo = $_GET['dispo']."'/><br>";
      echo "<input type='text' class='form-control' placeholder='Ingresa el nombre del dispositivo' id='namedispo'  name='namedispo' value='".$dispo = $_GET['dispo']."'/>";
     ?>
      <br/><input type="submit" class="btn btn-primary " value="GUARDAR"/>
  </form>
  </center>
</body>
<style>
  #dispo,#namedispo{
      width: 40%;
  }
</style>
<script>
    $('#namedispo').keyup(function(){
        this.value = this.value.toUpperCase();
    });
</script>
</html>