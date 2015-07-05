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
}else if(isset($_GET['borrardispo'])){
    $borrar = $_GET['borrardispo'];
    $result = mysqli_query($conex,"UPDATE OBJETO SET ObjBorrado = 1 WHERE ObjNombre ='$borrar'");
    header("Location: ../lista_dispo.php");
}else if(isset( $_GET['activardispo'])){
    $activar = $_GET['activardispo'];
    $result = mysqli_query($conex,"UPDATE OBJETO SET ObjBorrado = 0 WHERE ObjNombre = '$activar'");
    header("Location: ../lista_dispo.php");
}elseif(isset($_GET['borrarEje'])){
    $borrar  = $_GET['borrarEje'];
    $result = mysqli_query($conex,"UPDATE EJE SET EjeBorrado = 1 WHERE EjeNombre ='$borrar' ");
    header("Location: ../listaEjes.php");
}elseif(isset($_GET['activarEje'])){
    $activar = $_GET['activarEje'];
    $result = mysqli_query($conex,"UPDATE EJE SET EjeBorrado = 0 WHERE EjeNombre= '$activar'");
    header("Location: ../listaEjes.php");
}else if(isset($_GET['borrarmarca'])){
    $borrar  = $_GET['borrarmarca'];
    $result = mysqli_query($conex,"UPDATE MARCA SET MarBorrado = 1 WHERE MarNombre ='$borrar' ");
    header("Location: ../lista_marcas.php");
}else if(isset($_GET['activarmarca'])){
    $activar = $_GET['activarmarca'];
    $result = mysqli_query($conex,"UPDATE MARCA SET MarBorrado = 0 WHERE MarNombre = '$activar'");
    header("Location: ../lista_marcas.php");
}else if(isset($_GET['borrarcompo'])){
    $borrar  = $_GET['borrarcompo'];
    $result = mysqli_query($conex,"UPDATE COMPONENTE SET ComBorrado = 1 WHERE ComNombre ='$borrar' ");
    header("Location: ../lista_componentes.php");
}else if(isset($_GET['activarcompo'])){
    $activar = $_GET['activarcompo'];
    $result = mysqli_query($conex,"UPDATE COMPONENTE SET ComBorrado = 0 WHERE ComNombre = '$activar'");
    header("Location: ../lista_componentes.php");
}

?>