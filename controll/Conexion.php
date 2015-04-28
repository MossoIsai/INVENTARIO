<?php
   $conex = mysql_connect("localhost","root","isai.190")
        or die("No tiene permiso para este Sitio\t".mysql_error());
    mysql_select_db("INVENTARIOCAPUFE",$conex)
      or die("No pudo acceder a la Base de Datos\t".mysql_error());
?>