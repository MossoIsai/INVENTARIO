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
    <title>Modifica Marca</title>
</head>
<body>
<center>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css"/>
    <h2>Modifica Marca</h2>
    <?php

    echo "<input type='text' class='form-control hidden'  name='name_marca' id='marca' required='' value='".$_GET['idMarca']."'/>";
    ?>
    <form action="modificaMarca.php" method="POST">
        <?php
        echo'<input type="text" class="form-control" required="" name="new_mar" id="name_marca" value="'. $_GET['idMarca'].'" placeholder="Ingresa el nuevo valor de la marca"/><br>';
        echo'<input type="input" class=" btn btn-primary btn-lg" value="GUARDAR" id="salvar"/>';
    ?>
    </form>
    <?php
/*
        include "controll/Conexion.php";
        $name_marca = $_POST['name_marca'];
        $new_marca = $_POST['new_mar'];
        $queryUpdateMarca = mysqli_query($conex,"UPDATE MARCA SET Marnombre = '$new_marca' WHERE MarNombre = '$name_marca' ");
       if($queryUpdateMarca  == true){
         header("Location: modificaMarca.php");
       }else{
           echo 'Error en la consulta de MYSQL';
       }*/

    ?>
</center>
<style>
 #salvar,#name_marca{
     width: 35%;
 }
</style>
<script>
    var tableMarca = setFilterGrid("tabla-marca");
    $('#dispo').keyup(function(){
        this.value = this.value.toUpperCase();
    });
</script>
</body>
</html>