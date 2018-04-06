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
$crear_tabla="CREATE TABLE IF NOT EXISTS usuarios (idusuario VARCHAR(6),usuario VARCHAR(20),departamento VARCHAR(20),contraseña VARCHAR(20),fechaalta DATE,descripcion VARCHAR(20),nom_largo VARCHAR(30),activo VARCHAR(30),soporte VARCHAR(20),PRIMARY KEY(idusuario));";
if(mysql_query($crear_tabla,$conexion))
{
echo "<br>";
}else{
echo "<br>";
}

$insertar_datos="INSERT usuarios (idusuario,usuario,departamento,contraseña,fechaalta,descripcion,nom_largo,activo,soporte) VALUES ('".$_GET[idusuario]."','".$_GET[usuario]."','".$_GET[departamento]."','".$_GET[contraseña]."','".$_GET[fechaalta]."','".$_GET[descripcion]."','".$_GET[nom_largo]."','".$_GET[activo]."','".$_GET[soporte]."');";
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
<tr><td><center><a href="form2.html">Atrás</a></center></td></tr>
<tr><td><center><a href="consultausuarios1.php" target="abajo">Actualizar tabla</a></center></td></tr>
</table> 
</body>
</html>