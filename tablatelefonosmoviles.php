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
$crear_tabla="CREATE TABLE IF NOT EXISTS telefonosmoviles (idlinea VARCHAR(6),numero VARCHAR(30),extension VARCHAR(30),modelo VARCHAR(30),imae VARCHAR(30),nif VARCHAR(9),titular VARCHAR(30),fechaentrega DATE,domicilio VARCHAR(30),pin1 VARCHAR(30),puk1 VARCHAR(30),num_tarjeta VARCHAR(30),restriccion VARCHAR(30),area VARCHAR(30),lconsumo VARCHAR(30),activo VARCHAR(30),modificacion VARCHAR(30),cotejado VARCHAR(30), PRIMARY KEY(idlinea));";
if(mysql_query($crear_tabla,$conexion))
{
echo "<br>";
}else{
echo "<br>";
}

$insertar_datos="INSERT telefonosmoviles (idlinea,numero,extension,modelo,imae,nif,titular,fechaentrega,domicilio,pin1,puk1,num_tarjeta,restriccion,area,lconsumo,activo,modificacion,cotejado) VALUES ('".$_GET[idlinea]."','".$_GET[numero]."','".$_GET[extension]."','".$_GET[modelo]."','".$_GET[imae]."','".$_GET[nif]."','".$_GET[titular]."','".$_GET[fechaentrega]."','".$_GET[domicilio]."','".$_GET[pin1]."','".$_GET[puk1]."','".$_GET[num_tarjeta]."','".$_GET[restriccion]."','".$_GET[area]."','".$_GET[lconsumo]."','".$_GET[activo]."','".$_GET[modificacion]."','".$_GET[cotejado]."');";
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
<tr><td><center><a href="form5.html">Atrás</a></center></td></tr>
</table> 
</body>
</html>