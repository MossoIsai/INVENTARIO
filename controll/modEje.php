<?php
 include "Conexion.php";
 $name_eje = $_POST['nombreEje'];
  $query =  mysqli_query($conex,"SELECT EjeId FROM EJE WHERE EjeNombre = ".$name_eje);

?>