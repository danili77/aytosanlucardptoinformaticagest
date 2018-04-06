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
$crear_tabla="CREATE TABLE IF NOT EXISTS emailscorp (idcuenta VARCHAR(6),direccioncorreo VARCHAR(20),cuenta VARCHAR(20),password VARCHAR(20),area VARCHAR(20),titular VARCHAR(20),fechacreacion DATE,observaciones VARCHAR(30),cargo VARCHAR(20),PRIMARY KEY(idcuenta));";
if(mysql_query($crear_tabla,$conexion))
{
echo "<br>";
}else{
echo "<br>";
}

$insertar_datos="INSERT emailscorp (idcuenta,direccioncorreo,cuenta,password,area,titular,fechacreacion,observaciones,cargo) VALUES ('".$_GET[idcuenta]."','".$_GET[direccioncorreo]."','".$_GET[cuenta]."','".$_GET[password]."','".$_GET[area]."','".$_GET[titular]."','".$_GET[fechacreacion]."','".$_GET[observaciones]."','".$_GET[cargo]."');";
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
<tr><td><center><a href="form1.html">Atrás</a></center></td></tr>
</table> 
</body>
</html>