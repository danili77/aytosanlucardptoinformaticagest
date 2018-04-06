<?php
include("datos_conexion.inc");
$conexion=mysql_connect($mysql_server,$mysql_login,$mysql_pass)or die ("Error en la conexion");
echo "<br>";
if(mysql_select_db("bdinformatica",$conexion))
{
echo "<br>";
}else{
if(mysql_query("CREATE DATABASE bdinformatica",$conexion))
{
echo "<br>";
mysql_select_db("proyecto",$conexion);
}else{
echo "<br>";
}
}
$crear_tabla="CREATE TABLE IF NOT EXISTS claves (user VARCHAR(20),pass VARCHAR(15),PRIMARY KEY(user));";
if(mysql_query($crear_tabla,$conexion))
{
echo "<br>";
}else{
echo "<br>";
}

$insertar_datos="INSERT claves (user,pass) VALUES ('".$_GET[user]."','".$_GET[pass]."');";
if(mysql_query($insertar_datos,$conexion))
{
echo "<b><center>USUARIO REGISTRADO CON ÉXITO</center></b><br>";
}
else{
echo "<b><center>SE HA PRODUCIDO UN ERROR Y NO HAS SIDO REGISTRADO.</center></b><br>";
} 
?>
<html>
<body bgcolor="beige">
<table align="center" border=2  bordercolor="blue" bgcolor="white" cellpadding=6 cellspacing=5>
<tr><td><center><a href="formregistrousuarios.html">Atrás</a></center></td></tr>
</table> 
</body>
</html>