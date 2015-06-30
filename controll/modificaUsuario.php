<?php
include ("Conexion.php");
session_start();
if(! isset($_SESSION["ncontrol"])){
    header("Location: ../index.php");
    exit;
}

if (isset($_GET['email'])){
    //opcion para borrar el usuario mando el mail para borrarlo
    $borra=mysqli_query($conex,"CALL BorrarUsuario('".$_SESSION['ncontrol']."','".$_GET['email']."')");
    mysqli_close($conex);
    header("Location:../super.php");

} else if (isset($_GET['email1'])){

    echo $_GET['email1'];
    $borra=mysqli_query($conex,"CALL restauraUsuario('".$_SESSION['ncontrol']."','".$_GET['email1']."')");
    mysqli_close($conex);
    header("Location:../super.php");

}else if (isset($_POST['borra'])){
    $borra=mysql_query("CALL borraUsuario('".$_SESSION['ncontrol']."','".$_POST['email']."')");
    mysql_close($conex);
    header("Location:../super.php");

}else if(isset($_POST['resta'])){
    $res=mysql_query("CALL restauraUsuario('".$_SESSION['ncontrol']."','".$_POST['email']."')");
    mysql_close($conex);
    header("Location:../super.php");
}else if(isset($_POST['modifica'])) {
    header("Location:../modificaPass.php?email=".$_POST['email']);
}else if(isset($_POST['modificar'])){
    $contra=mysql_query("CALL modificaContra('".$_POST['contra']."','".$_SESSION['ncontrol']."','".$_POST['usuario']."')");
    header("Location:../super.php");
}else if(isset($_POST['guardar'])){
    $modifica=mysql_query("CALL modificaUsuario('".$_SESSION['ncontrol']."','".$_POST['email1']."','".$_POST['nombre']."','".$_POST['apellido'].
        "','".$_POST['email']."','".$_POST['cargo']."','".$_POST['privilegio']."')");
    echo "<script type=\"text/javascript\">alert(\"Datos modificados con exito\");</script>";
    header("Location:../super.php");
}

?>