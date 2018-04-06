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
mysql_select_db("bdinformatica",$conexion);
}else{
echo "<br>";
}
}
$crear_tabla="CREATE TABLE IF NOT EXISTS equipos (codigo VARCHAR(6),idproducto VARCHAR(6),equipo VARCHAR(30),modelo VARCHAR(30),fechainsta DATE,procesador VARCHAR(4),memoria VARCHAR(4),discoduro VARCHAR(5), teclado VARCHAR(30), raton VARCHAR(30), observaciones VARCHAR(30),titular VARCHAR(30),area VARCHAR(30),activo VARCHAR(3),monitor VARCHAR(30),nsmonitor VARCHAR(30),PRIMARY KEY(idproducto));";
if(mysql_query($crear_tabla,$conexion))
{
echo "<br>";
}else{
echo "<br>";
}


$insertar_datos="INSERT equipos (codigo,idproducto,equipo,modelo,fechainsta,procesador,memoria,discoduro,teclado,raton,observaciones,titular,area,activo,monitor,nsmonitor) VALUES ('".$_GET[codigo]."','".$_GET[idproducto]."','".$_GET[equipo]."','".$_GET[modelo]."','".$_GET[fechainsta]."','".$_GET[procesador]."','".$_GET[memoria]."','".$_GET[discoduro]."','".$_GET[teclado]."','".$_GET[raton]."','".$_GET[observaciones]."','".$_GET[titular]."','".$_GET[area]."','".$_GET[activo]."','".$_GET[monitor]."','".$_GET[nsmonitor]."');";
if(mysql_query($insertar_datos,$conexion))
{
echo "<b><center>LOS DATOS HAN SIDO INSERTADOS EN LA BASE DE DATOS CON ÉXITO</center></b><br>";
}
else{
echo "<b><center>SE HA PRODUCIDO UN ERROR Y LOS DATOS NO HAN SIDO INSERTADOS.</center></b><br>";
} 
?>
<html>
<body bgcolor="beige">
<table align="center" border=2  bordercolor="blue" bgcolor="white" cellpadding=6 cellspacing=5>
<tr><td><center><a href="form6.html">Atrás</a></center></td></tr>
</table> 
</body>
</html>