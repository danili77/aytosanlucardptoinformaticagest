<?php
   include("datos_conexion.inc");
   $link=mysql_connect ($mysql_server, $mysql_login, $mysql_pass) or die ("Error en la conexión");
	mysql_select_db("bdinformatica");
   $idproducto=$_GET[idproducto];
   mysql_query("delete from equipos where idproducto='$idproducto'");
   
   header("Location: bajas6.php");
?>