<!doctype html>
<?php
include_once 'menu.php';
session_start();
if($_SESSION["sesionOk"] != "si"){
    header("Location: index.php");
    exit;
}
?>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="js/jquery.js"></script>
</head>
<body>
 <center><h3>INFORMACIÓN DEL DISPOSITIVO</h3><br/></center>
  <center>
     <div  id="principal">
         <form action="controll/modificaDispositivo.php" method="POST" >
             <label>DISPOSITIVO</label>
             <?php
              include_once 'controll/Conexion.php';
             $numeroSerie = $_GET['numeroSerieDispo'];
               if(isset($numeroSerie)){
                   $query = mysqli_query($conex,"CALL consultaNserie('$numeroSerie')");
                   $fila = mysqli_fetch_row($query);
                   mysqli_close($conex);
                   if($query ==  false) {
                       echo "error";
                   }else { //si la consulta efecitvamente funciona
              echo '<input type="text" name="id"  value="'.$fila[11].'" class="hidden"/>'
             ?>
             <select name="dispositivo" id="dispositivo" class="form-control" disabled="true">
                 <?php
                 include("controll/Conexion.php");
                 $id = mysqli_query($conex,"SELECT ObjId,ObjNombre FROM OBJETO");
                 while($nombreObj = mysqli_fetch_array($id)){
                     if($nombreObj[1] == $fila[0]){
                         echo "<option value=".$nombreObj[0]." selected>$nombreObj[1]</option>";
                     }else{
                         echo "<option value=".$nombreObj[0].">$nombreObj[1]</option>";
                     }
                 }
                 mysqli_close($conex);
                 ?>
             </select>
                  <?php
                       echo "<label>NUMERO DE SERIE</label>
                   <input type='text'' class='form-control'  name='nserie' value='$numeroSerie' id='nserie' disabled/>";
                       echo "<label >FECHA LEVANTAMIENTO</label>
                   <input type='date' class='form-control' id='fecha' name='fecha' value='$fila[4]' disabled/>";
                       echo "<label>MARCA</label>";
                       ?>
                       <select name="marca" id="marca" class="form-control" disabled><br/>
                           <?php
                           include("controll/Conexion.php");
                           $queryMarca = mysqli_query($conex,"SELECT MarId,MarNombre FROM MARCA");
                           while($nameMar = mysqli_fetch_array($queryMarca)){
                               if($nameMar[1] == $fila[2]){
                                   echo "<option value=".$nameMar[0]." selected>$nameMar[1]</option>";
                               }else{
                                   echo "<option value=".$nameMar[0].">$nameMar[1]</option>";
                               }
                           }
                           mysqli_close($conex);

                       echo "</select>
                       <label>MODELO</label><br/>
                    <input type='text' class='form-control' value='$fila[3]' name='modelo' id='modelo' disabled/>
                       <label>REMPLAZADO</label><br/>"
                           ?>
                        <?php
                     if($fila[5] == "0"){
                         echo "<label>No</label><input type='radio' name='reemplazo' value='0' checked disabled id='reemplazoNo'/>";
                         echo "<label>Si</label><input type='radio' name='reemplazo' value='1' disabled id='reemplazoSi'/>";
                     }else{
                         echo "<label>No</label><input type='radio' name='reemplazo' value='0' disabled id='reemplazoNo' />";
                         echo "<label>Si</label><input type='radio' name='reemplazo' value='1' checked  disabled  id='reemplazoSi'/>";
                     }
                     ?>
                 <?php
                       echo "<br><label >DESCRIPCIÓN</label>
                     <textarea id='descripcion' class='form-control' value='' name='descripcion' disabled>$fila[6]</textarea> ";
                       echo "<label>CADENAMIENTO</label><br>
                       <label>Kilometro</label>
                       <input type='text' class='form-control' value='$fila[9]'  id='kilometro'  name='kilometro' disabled>
                       <label>Metros</label>
                       <input type='text' class='form-control' value='$fila[10]' id='metro'  name='metro' disabled>
                       ";
                       echo "<label>CUERPO</label><br>";
                       ?>
                 <?php
                     if($fila[8] == "A"){
                     echo "<label>A</label>
                    <input type='checkbox' name='cuerpo[]' checked id='cuerpoA' disabled value='A'>
                    <label>B</label>
                    <input type='checkbox' name='cuerpo[]' disabled id='cuerpoB' value='B'>
                    <label>C</label>
                    <input type='checkbox' name='cuerpo[]' disabled id='cuerpoC' value='C'></br>";
                     }else if($fila[8] == "B"){
                         echo "<label>A</label>
                    <input type='checkbox' name='cuerpo[]' disabled id='cuerpoA' value='A'>
                    <label>B</label>
                    <input type='checkbox' name='cuerpo[]' checked disabled id='cuerpoB' value='B'>
                    <label>C</label>
                    <input type='checkbox' name='cuerpo[]' disabled id='cuerpoC' value='C'></br>";
                     }else if($fila[8] == "C"){
                         echo "<label>A</label>
                    <input type='checkbox' name='cuerpo[]' disabled id='cuerpoA'value='A'>
                    <label>B</label>
                    <input type='checkbox' name='cuerpo[]' disabled id='cuerpoB' value='B'>
                    <label>C</label>
                    <input type='checkbox' name='cuerpo[]' disabled id='cuerpoC' value='C'></br>";
                     }else if($fila[8] == "A/B"){
                         echo "<label>A</label>
                    <input type='checkbox' name='cuerpo[]' checked disabled id='cuerpoA' value='A'>
                    <label>B</label>
                    <input type='checkbox' name='cuerpo[]' checked disabled id='cuerpoB' value='B'>
                    <label>C</label>
                    <input type='checkbox' name='cuerpo[]' disabled id='cuerpoC' value='C'></br>";
                     }else if($fila[8] == "A/C"){
                         echo "<label>A</label>
                    <input type='checkbox' name='cuerpo[]' checked disabled  id='cuerpoA' value='A'>
                    <label>B</label>
                    <input type='checkbox' name='cuerpo[]' disabled id='cuerpB' value='B'>
                    <label>C</label>
                    <input type='checkbox' name='cuerpo[]' checked disabled id='cuerpoC' value='C'></br>";
                     }else if($fila[8] == "B/C"){
                         echo "<label>A</label>
                    <input type='checkbox' name='cuerpo[]' disabled id='cuerpoA' value='A'>
                    <label>B</label>
                    <input type='checkbox' name='cuerpo[]' checked disabled id='cuerpoB' value='B'>
                    <label>C</label>
                    <input type='checkbox' name='cuerpo[]' checked disabled id='cuerpoC' value='C'></br>";
                     }

                  ?>
             <?php
                  " <label>A</label>
                    <input type='checkbox' name='cuerpo' disabled id='cuerpoA'>
                    <label>B</label>
                    <input type='checkbox' name='cuerpo' disabled id='cuerpoB'>
                    <label>C</label>
                    <input type='checkbox' name='cuerpo' disabled id='cuerpoC'></br>";
                       echo "<label>TRAMO</label>"?>

                           <select name="tramo" id="tramo" class="form-control" disabled><br/>
                               <?php
                               include("controll/Conexion.php");
                               $queryTramo = mysqli_query($conex,"SELECT TraId,TraNombre FROM TRAMO");
                               while($nameTra = mysqli_fetch_array($queryTramo)){
                                   if($nameTra[1] == $fila[7]){
                                       echo "<option value=".$nameTra[0]." selected>$nameTra[1]</option>";
                                   }else{
                                       echo "<option value=".$nameTra[0].">$nameTra[1]</option>";
                                   }
                               }
                               mysqli_close($conex);
                      }
                  }
                 ?>
                        </select><br/>
                           <input type="submit" class="btn btn-small btn-success btn-block btn-lg" id="boton-save" value="GUARDAR"    disabled/>
         </form>
         <br/>
         <button class="btn btn-small btn-warning btn-block btn-lg" id="botonunlock" onclick="habilitar()">MODIFICAR</button>
         <br/><br/>
     </div>
  </center>
 <style>
     input[type='text']{
         width: 40%;
     }

     #dispositivo,#marca,#fecha,#descripcion,#tramo,#eje{
         width: 40%;
     }
     #principal{
         width: 80%;
         margin:  0 auto;
     }
     #boton-save,#botonunlock{
         width: 40%;
     }

 </style>
<script>
    function habilitar() {
       document.getElementById("dispositivo").disabled = false;
       document.getElementById("nserie").disabled = false;
       document.getElementById("fecha").disabled = false;
       document.getElementById("marca").disabled = false;
       document.getElementById("modelo").disabled = false;
       document.getElementById("reemplazoNo").disabled = false;
       document.getElementById("reemplazoSi").disabled = false;
       document.getElementById("descripcion").disabled = false;
       document.getElementById("kilometro").disabled = false;
       document.getElementById("metro").disabled = false;
       document.getElementById("cuerpoA").disabled = false;
       document.getElementById("cuerpoB").disabled = false;
       document.getElementById("cuerpoC").disabled = false;
       document.getElementById("tramo").disabled = false;
       document.getElementById("boton-save").disabled = false;
       document.getElementById("botonunlock").disabled = true;

    }

  $(window).load(function(){
     $("#dispositivo").disabled = true;
  });
</script>
</body>
</html>