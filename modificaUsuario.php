<!doctype html>
<?php
include_once 'menu.php';
session_start();
if($_SESSION["sesionOk"] != "si"){
    header("Location: index.php");
    exit;
}
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Modifica usuarios</title>
    <script src="js/jquery.js"></script>
</head>
<body>
<center><h3>INFORMACIÓN DEL USUARIO</h3><br/></center>
<center>
    <div id="form_usuario">
        <form action="controll/usuario.php" method="POST">
            <label>NOMBRE</label>
            <?php
             include_once 'controll/Conexion.php';
             $email = $_GET['emailUser'];
             if(isset($email)) {
            $queryInfoUsuario = mysqli_query($conex, "CALL buscaUsuario('$email')");
            $fila = mysqli_fetch_row($queryInfoUsuario);
            if ($queryInfoUsuario == false) {
                echo "Error";
            } else { //Si esta funcionando el query ya la conexion
            echo "<input type='text' name='numId' value='$fila[6]' class='hidden' >";
            echo "<input type='text' class='form-control' name='nombre' id='nombre' value='$fila[0]' disabled/>";
            echo "<label>APELLIDO</label>";
            echo "<input type='text' class='form-control' name='apellido' id='apellido' value='$fila[1]' disabled>";
            echo '<label>CORREO</label>';
            echo "<input type='text' class='form-control' name='pass' id='pass' value='$fila[3]' disabled>";
            echo '<label>CARGO</label>';
            ?>
            <select name="cargo" id="cargo" class="form-control" disabled>
                <?php
                mysqli_close($conex);
                include 'controll/Conexion.php';
                $ids = mysqli_query($conex, "SELECT CargId,CargNombre FROM CARGO");
                if ($ids == false) {
                    echo "<script>alert('Error');</script>";
                } else {
                    while ($carg = mysqli_fetch_row($ids)) {
                        if ($carg[1] == $fila[4]) {
                            echo "<option value='$carg[0]' selected>$carg[1]</option>";
                        } else {
                            echo "<option value='$carg[0]'>$carg[1]</option>";
                        }
                    }
                }
                mysqli_close($conex);

                ?>
            </select>
            <label>PRIVILEGIO</label>
            <select name="privilegio" id="privilegio" class="form-control" disabled>
                <?php
                mysqli_close($conex);
                include 'controll/Conexion.php';
                $ids = mysqli_query($conex, "SELECT PrivId,PrivNombre FROM PRIVILEGIO");
                if ($ids == false) {
                    echo "<script>alert('Error');</script>";
                } else {
                    while ($carg = mysqli_fetch_row($ids)) {
                        if ($carg[1] == $fila[5]) {
                            echo "<option value='$carg[0]' selected>$carg[1]</option>";
                        } else {
                            echo "<option value='$carg[0]'>$carg[1]</option>";
                        }
                    }
                }


                ?>
            </select><br/>
            <input type="submit" class="btn btn-success btn-lg btn-blog" id="save" disabled value="GUARDAR"/>
        </form>
    </div>
    <br/>
    <button class="btn btn-lg btn-block btn-warning" onclick="hablilitar()" id="modificar">MODIFICAR</button>
    <br/>
    <?php
    echo "<a class='btn btn-lg btn-block btn-warning' id='contra' href='modUsuario.php?id=$fila[6]'>REESTABLECER CONTRASEÑA</a>";
       }
     }
    ?>
</center>
<style>
    input[type ='text']{
        width: 40%;
    }
    #privilegio,#cargo{
        width: 40%;
    }
    #save,#modificar,#contra{
        width: 40%;
    }
</style>
<script>
 function hablilitar(){
     document.getElementById('nombre').disabled = false;
     document.getElementById('apellido').disabled = false;
     document.getElementById('pass').disabled = false;
     document.getElementById('privilegio').disabled = false;
     document.getElementById('cargo').disabled = false;
     document.getElementById('save').disabled = false;
 }

</script>

</body>
</html>