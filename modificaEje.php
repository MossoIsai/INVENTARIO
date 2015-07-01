<?php
  include 'menu.php';
  $ejeRecibido =  $_GET['eje'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar Eje</title>
    <link rel="stylesheet" href="css/principal.css"/>
</head>
<body>
<center><h3>Modifica Eje</h3>
    <form method="POST" action="controll/modEje.php">
      <input type="text" class="form-control" id="name_eje"  name="nombreEje" value="<?php echo $ejeRecibido ?>" /><br/>
      <input type="submit" class="btn btn-primary btn-lg" value="Guardar" id ="ejeNom"/>
    </form>
</center>
</body>
</html>