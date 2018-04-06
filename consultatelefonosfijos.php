<html>
<head>
<title>Consultar base datos "dptoinformática" Tabla Teléfonos fijos</title>
</head>
<body bgcolor="beige">
<table align="center" bgcolor="white" border="1">
<tr><td><input type="button" name="imprimir" value="Imprimir lista" id="button"  onClick="window.print();"/></td></tr>
</table>
<?php
include("datos_conexion.inc");
$conexion=mysql_connect($mysql_server,$mysql_login, $mysql_pass) or die ("Error en la conexion");
mysql_select_db("bdinformatica",$conexion);
$sentenciaSQL="SELECT idlinea,fechaasignacion,numero,extension,activo,modelo,nif,titular,adsl,modadsl,rdsi,categoria,area,observaciones FROM telefonosfijos;";
$registros=mysql_query($sentenciaSQL, $conexion);
echo "<h2 align =center><u>LISTA DE TELÉFONOS FIJOS</u></h2><br>";
echo "<table border=2 align=center bordercolor=blue>
<tr>
<td><b><center>ID_LINEA</center></b></td>
<td><b><center>FECHA ENTREGA</center></b></td>
<td><b><center>NUMERO LARGO</center></b></td>
<td><b><center>EXTENSIÓN</center></b></td>
<td><b><center>ACTIVO</center></b></td>
<td><b><center>MODELO</center></b></td>
<td><b><center>N.I.F</center></b></td>
<td><b><center>TITULAR</center></b></td>
<td><b><center>ADSL</center></b></td>
<td><b><center>MODALIDAD ADSL</center></b></td>
<td><b><center>RDSI</center></b></td>
<td><b><center>CATEGORIA</center></b></td>
<td><b><center>ÁREA</center></b></td>
<td><b><center>OBSERVACIONES</center></b></td>
</tr>";
while($registro=mysql_fetch_row ($registros))
{
echo "<tr><td>".$registro[0]."</td><td>".$registro[1]."</td><td>".$registro[2]."</td><td>".$registro[3]."</td><td>".$registro[4]."</td><td>".$registro[5]."</td><td>".$registro[6]."</td><td>".$registro[7]."</td><td>".$registro[8]."</td><td>".$registro[9]."</td><td>".$registro[10]."</td><td>".$registro[11]."</td><td>".$registro[12]."</td><td>".$registro[13]."</td></tr>";
}
?>
</body>
</html>