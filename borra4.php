<?php
   include("datos_conexion.inc");
   $link=mysql_connect ($mysql_server, $mysql_login, $mysql_pass) or die ("Error en la conexión");
	mysql_select_db("bdinformatica");
   $idlinea=$_GET[idlinea];
   mysql_query("delete from telefonosfijos where idlinea='$idlinea'");
   
   header("Location: bajas4.php");
?>