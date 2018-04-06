<?php
   include("datos_conexion.inc");
   $link=mysql_connect ($mysql_server, $mysql_login, $mysql_pass) or die ("Error en la conexión");
	mysql_select_db("bdinformatica");
   $idusuario=$_GET[idusuario];
   mysql_query("delete from usuarios where idusuario='$idusuario'");
   
   header("Location: bajas2.php");
?>