<?php
 include_once 'Conexion.php';
session_start();
if($_SESSION["sesionOk"] !=  "si"){
    header("Location:index.php");
    exit;
}else {
    $ID = $_POST['id'];
    $newPass = $_POST['newPass'];
    $queryUpdatePass = mysqli_query($conex,"CALL updatePass('$newPass','".$_SESSION["sesionOk"]."',$ID)");
    if($queryUpdatePass == false){
        echo "Error";
    }else {
        header("Location: ../super.php");
    }
}
?>