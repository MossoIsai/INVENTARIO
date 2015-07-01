<!doctype html>
<?php
require_once("menu.php");
session_start();
if($_SESSION["sesionOk"] !=  "si"){
    header("Location:index.php");
    exit;
}
if(isset($_GET["datosnull"])){
    echo "<script>alert('El usuario no se encuentra registrado en la Base de Datos')</script>";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/principal.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Modifica Usuario</title>
</head>
<body>
<h3 id="subti">Modificar Usuario</h3>
<div>
    <form action="modUsuario.php" method="POST">
        <input type="text" class="form-control" required="" placeholder="Ingresa el correo del empleado" id="centrado" name="email"/><br>
        <input type="submit" class="btn btn-block btn-lg btn-primary" id="btnbusca" value="BUSCAR" name="buscar"/>
    </form>
    <?php
    include("controll/Conexion.php");
    if (isset($_POST['buscar'])){//valida que se haya presionado enviar y generado los Ã­ndices en el Arreglo $_POST con las variables del formulario
        if (empty($_POST['email'])){//valida que en los formularios se haya escrito algo
            echo "debes llenar todos los <a href='formulario.htm'>campos</a> ";
        } else{
            $buscador = mysqli_query($conex,"CALL buscaUsuario('".$_POST['email']."')");//CALL buscaUsuario('mherrera@capufe.com.mx')");
            $fila = mysqli_fetch_array($buscador);
            if($buscador == false){
                die(mysql_error());
            }
            mysqli_close($conex);
            if($fila == 0){
                //echo "imprime scrit";
                echo "<script type=\"text/javascript\">alert(\"El usuario no existe\");</script>";
            }else{

                //echo $fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5];
                echo '<hr>';
                echo '<form action="controll/modificaUsuario.php" method="post">';
                echo '<div class="col-md-4">';
                echo '<h5><center>NOMBRE</center></h5>';
                echo '<input type="text" value="'.$fila[0].'" class="form-control" name="nombre" placeholder="Nombre" required="" id="nombre" /><br/>';
                echo '<h5><center>CARGO</center></h5>';
                echo '<select name="cargo" id="cargo" class="form-control">';
                echo '<option value="">Selecciona un Cargo</option>';
                ?>
                <?php
                include("controll/Conexion.php");
                $id = mysqli_query($conex,"SELECT CargId,CargNombre FROM CARGO");
                while($carg = mysqli_fetch_array($id)){
                    if($carg[0]==$fila[4]){
                        echo "<option value=".$carg[0]." selected>$carg[1]</option>";
                    }else{
                        echo "<option value=".$carg[0].">$carg[1]</option>";
                    }
                }
                mysqli_close($conex);
                echo '</select><br/>';
                echo '<input type="text" style="visibility:hidden" value="'.$fila[3].'" class="form-control" name="email1" placeholder="password" required="" id="email"/><br/>';
                echo '</div>';
                // echo '<input type="text" value="'.$fila[3].'" class="form-control" name="nempleado" placeholder="Correo Electronico" required="" id="nempleado"/></div>';
                echo '<div class="col-md-4">';
                echo '<h5><center>APELLIDO</center></h5>';
                echo '<input type="text" value="'.$fila[1].'" class="form-control" name="apellido" placeholder="Apellido" required="" id="apellido"/><br/>';
                echo '<h5><center>PRIVILEGIO</center></h5>';
                echo '<select name="privilegio" id="privilegio" class="form-control">';
                echo '<option value="">Selecciona un Privilegio</option>';
                ?>
                <?php
                include "controll/Conexion.php";
                $resultado =  mysqli_query($conex,"SELECT PrivId,PrivNombre FROM PRIVILEGIO");
                $conta = 1;
                while($priv = mysqli_fetch_array($resultado)){
                    if($priv[0]==$fila[5]){
                        echo "<option value=".$priv[0]." selected>$priv[1]</option>";
                    }else{
                        echo "<option value=".$priv[0].">$priv[1]</option>";
                    }
                }
                mysqli_close($conex);
                echo '</select>';
                echo '<br>';
                echo '<input type="submit" class="btn btn-block btn-lg btn-warning "  name="modifica" value="MODIFICA CONTRASEÑA" id="btncentrar"><br/></div>';
                echo '<div class="col-md-4">';
                echo '<h5><center>EMAIL</center></h5>';
                echo '<input type="text" value="'.$fila[3].'" class="form-control" name="email" placeholder="password" required="" id="email"/><br/>';
                /*Si no esta borrado*/
                if($fila[6]==0){
                    echo '<h5><center>¿DESEA BORRAR?</center></h5>';
                    echo '<input type="submit" class="btn btn-block btn-lg btn-warning "  name="borra" value="BORRAR" id="btncentrar"><br/>';
                /*Si esta borrado*/
                }else if($fila[6] == 1){
                    echo '<h5><center>¿DESEA RESTAURAR?</center></h5>';
                    echo '<input type="submit" class="btn btn-block btn-lg btn-warning "  name="resta" value="RESTAURAR" id="btncentrar"><br/>';
                }
                echo '</div>';
                echo '<input type="submit" class="btn btn-block btn-lg btn-primary "  name="guardar" value="GUARDAR" id="btncentrar"><br/>';
                echo '</form>';

            }
            //echo "Bienvenido ".$_POST['email'];
        }
    }else {
        //echo "debes llenar el formulario";
    }
    ?>
</div>
<hr>

<script type="text/javascript">
    //Query para solo aceptar numeeros (nempleado)
    $('#nuum').keyup(function(){

        this.value = this.value.replace(/[^0-9]/g,'');
    });

    $('#nombre,#apellido,#cargo').keyup(function(){
        this.value = this.value.toUpperCase();
    });
</script>
</body>
</html>