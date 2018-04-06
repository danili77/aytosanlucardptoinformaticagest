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
$crear_tabla="CREATE TABLE IF NOT EXISTS telefonosfijos (idlinea VARCHAR(6),activo VARCHAR(30),numero VARCHAR(30),extension VARCHAR(30),modelo VARCHAR(30),adsl VARCHAR(4),modadsl VARCHAR(30),rdsi VARCHAR(4),titular VARCHAR(30),nif VARCHAR(9),area VARCHAR(30),categoria VARCHAR(30),fechaasignacion DATE,observaciones VARCHAR(30), PRIMARY KEY(idlinea));";
if(mysql_query($crear_tabla,$conexion))
{
echo "<br>";
}else{
echo "<br>";
}

$insertar_datos="INSERT telefonosfijos (idlinea,activo,numero,extension,modelo,adsl,modadsl,rdsi,titular,nif,area,categoria,fechaasignacion,observaciones) VALUES ('".$_GET[idlinea]."','".$_GET[activo]."','".$_GET[numero]."','".$_GET[extension]."','".$_GET[modelo]."','".$_GET[adsl]."','".$_GET[modadsl]."','".$_GET[rdsi]."','".$_GET[titular]."','".$_GET[nif]."','".$_GET[area]."','".$_GET[categoria]."','".$_GET[fechaasignacion]."','".$_GET[observaciones]."');";
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
<tr><td><center><a href="form4.html">Atrás</a></center></td></tr>
<tr><td><center><a href="consultatelefonosfijos.php" target="abajo">Actualizar tabla</a></center></td></tr>
</table> 
</body>
</html>