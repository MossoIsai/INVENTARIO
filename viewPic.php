<?php
$carpetaFotos = $_GET['fotos'];
$ruta = "FOTO/".$carpetaFotos."/";
$filehandler = opendir($ruta);
while($file = readdir($filehandler)){
    if($file != "." && $file != ".."){
        $tamano = getimagesize($ruta.$file);
        echo "<div>
                 <div>
                  <img src ='$ruta$file' $tamano[3]>
                 </div>
                <div";
    }
}
closedir($filehandler);
?>