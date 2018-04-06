<html>
<head>
<title>Consultar base datos "dptoinformatica" Tabla usuarios</title>
</head>
<body bgcolor="beige">
<table align="center" bgcolor="white" border="1">
<tr><td><input type="button" name="imprimir" value="Imprimir lista" id="button"  onClick="window.print();"/></td></tr>
</table>
<?php
include("datos_conexion.inc");
$conexion=mysql_connect($mysql_server,$mysql_login, $mysql_pass) or die ("Error en la conexion");
mysql_select_db("bdinformatica",$conexion);
$sentenciaSQL="SELECT idusuario,fechaalta,activo,soporte,nom_largo,usuario,contraseña,departamento,descripcion FROM usuarios;";
$registros=mysql_query($sentenciaSQL, $conexion);
echo "<h2 align =center><u>LISTA DE USUARIOS</u></h2><br>";
echo "<table border=2 align=center bordercolor=blue>
<tr>
<td><b><center>ID_LINEA</center></b></td>
<td><b><center>FECHA INSERCIÓN</center></b></td>
<td><b><center>USUARIO ACTIVO</center></b></td>
<td><b><center>SOPORTE</center></b></td>
<td><b><center>NOMBRE COMPLETO</center></b></td>
<td><b><center>USUARIO</center></b></td>
<td><b><center>CONTRASEÑA</center></b></td>
<td><b><center>ÁREA</center></b></td>
<td><b><center>OBSERVACIONES</center></b></td>
</tr>";
while($registro=mysql_fetch_row ($registros))
{
echo
"<tr><td>".$registro[0]."</td><td>".$registro[1]."</td><td>".$registro[2]."</td><td>".$registro[3]."</td><td>".$registro[4]."</td><td>".$registro[5]."</td><td>".$registro[6]."</td><td>".$registro[7]."</td><td>".$registro[8]."</td></tr>";
}
?>
</body>
</html>