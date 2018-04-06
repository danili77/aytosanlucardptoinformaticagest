<?php
   include("datos_conexion.inc");
   $link=mysql_connect ($mysql_server, $mysql_login, $mysql_pass) or die ("Error en la conexión");
	mysql_select_db("bdinformatica");
   $idcuenta=$_GET[idcuenta];
   mysql_query("delete from emailscorp where idcuenta='$idcuenta'");
   
   header("Location: bajas.php");
?>
