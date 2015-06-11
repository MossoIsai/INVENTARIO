<!DOCTYPE html>
<?php

   if(isset($_GET['errorUsuario'])){
       echo '<script>alert("El nombre de usuario y la contraseña que ingresaste no coinciden con nuestros registros." +
                       " Por favor, revisa e inténtalo de nuevo.");</script>';
    }
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LOG-IN</title>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="shortcut icon" href="img/android.png"/>
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>
<body>
	<div id="login">
		<h2><span class="fontawesome-lock"></span>StockDroid</h2>

		<form action="controll/entrarSesion.php" method="POST">
			<fieldset>
			<div class="input-group input-group-lg" id="user">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
               <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Numero Trabajador" required=""><br>
               </div><br>
            <div class="input-group input-group-lg" id="pass">
              <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
               <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" required=""> 
            </div><br>
            <input type="submit" class="btn btn-block btn-success btn-lg" value="Ingresar" >
            <p id="mensje"></p>
			</fieldset>
            
		</form>
	</div> <!-- end login -->

</body>
</html>
