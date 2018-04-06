<?php
   include("datos_conexion.inc");
   $link=mysql_connect ($mysql_server, $mysql_login, $mysql_pass) or die ("Error en la conexión");
	mysql_select_db("bdinformatica");
   $idarea=$_GET[idarea];
   mysql_query("delete from areas where idarea='$idarea'");
   
   header("Location: bajas3.php");
?>