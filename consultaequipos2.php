<html>
<head>
<title>Consultar base datos "dptoinformática" Tabla Teléfonos móviles</title>
</head>
<body bgcolor="beige">
<table align="center" bgcolor="white" border="1">
<tr><td><input type="button" name="imprimir" value="Imprimir lista" id="button"  onClick="window.print();"/></td></tr>
</table>
<?php
include("datos_conexion.inc");
$conexion=mysql_connect($mysql_server,$mysql_login, $mysql_pass) or die ("Error en la conexion");
mysql_select_db("bdinformatica",$conexion);
$sentenciaSQL="SELECT codigo,idproducto,equipo,modelo,fechainsta,procesador,memoria,discoduro,teclado,raton,titular,area,activo,monitor,nsmonitor,observaciones FROM equipos WHERE idproducto='$_GET[idproducto]' ORDER BY fechainsta;";
$registros=mysql_query($sentenciaSQL, $conexion);
echo "<h2 align =center><u>LISTA DE EQUIPOS INFORMÁTICOS</u></h2><br>";
echo "<table border=2 align=center bordercolor=blue>
<tr>
<td><b><center>CODIGO</center></b></td>
<td><b><center>ID_PRODUCTO</center></b></td>
<td><b><center>EQUIPO</center></b></td>
<td><b><center>MODELO</center></b></td>
<td><b><center>FECHA INSTALACIÓN</center></b></td>
<td><b><center>PROCESADOR</center></b></td>
<td><b><center>MEMORIA</center></b></td>
<td><b><center>DISCO DURO</center></b></td>
<td><b><center>TECLADO</center></b></td>
<td><b><center>RATÓN</center></b></td>
<td><b><center>TITULAR</center></b></td>
<td><b><center>ÁREA</center></b></td>
<td><b><center>ACTIVO</center></b></td>
<td><b><center>MONITOR</center></b></td>
<td><b><center>Nº SERIE DEL MONITOR</center></b></td>
<td><b><center>OBSERVACIONES</center></b></td>
<td><b><center>¿BORRAR?</center></b></td>
</tr>";
while($registro=mysql_fetch_row ($registros))
{
echo "<tr><td>".$registro[0]."</td><td>".$registro[1]."</td><td>".$registro[2]."</td><td>".$registro[3]."</td><td>".$registro[4]."</td><td>".$registro[5]."</td><td>".$registro[6]."</td><td>".$registro[7]."</td><td>".$registro[8]."</td><td>".$registro[9]."</td><td>".$registro[10]."</td><td>".$registro[11]."</td><td>".$registro[12]."</td><td>".$registro[13]."</td><td>".$registro[14]."</td><td>".$registro[15]."</td><td><a href=\"borra6.php?idproducto=$row[idproducto]\">Borrar</a></td></tr>";
}
?>
</body>
</html>