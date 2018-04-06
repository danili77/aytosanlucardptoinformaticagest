<html>
<head>
<title>Consultar base datos "dptoinformática" Tabla Teléfonos móviles</title>
</head>
<body bgcolor="beige">
<?php
include("datos_conexion.inc");
$conexion=mysql_connect($mysql_server,$mysql_login, $mysql_pass) or die ("Error en la conexion");
mysql_select_db("bdinformatica",$conexion);
$sentenciaSQL="SELECT idlinea,fechaentrega,numero,extension,activo,modificacion,cotejado,modelo,nif,titular,domicilio,restriccion,lconsumo,num_tarjeta,pin1,puk1,imae,area FROM telefonosmoviles;";
$registros=mysql_query($sentenciaSQL, $conexion);
echo "<h2 align =center><u>LISTA DE TELÉFONOS MÓVILES</u></h2><br>";
echo "<table border=2 align=center bordercolor=blue>
<tr>
<td><b><center>ID_LINEA</center></b></td>
<td><b><center>FECHA ENTREGA</center></b></td>
<td><b><center>NUMERO LARGO</center></b></td>
<td><b><center>EXTENSIÓN</center></b></td>
<td><b><center>ACTIVO</center></b></td>
<td><b><center>MODIFICACIÓN</center></b></td>
<td><b><center>COTEJADO</center></b></td>
<td><b><center>MODELO</center></b></td>
<td><b><center>N.I.F</center></b></td>
<td><b><center>TITULAR</center></b></td>
<td><b><center>DOMICILIO</center></b></td>
<td><b><center>RESTRICCIÓN</center></b></td>
<td><b><center>LIMITE CONSUMO</center></b></td>
<td><b><center>NUMERO TARJETA</center></b></td>
<td><b><center>PIN_1</center></b></td>
<td><b><center>PUK_1</center></b></td>
<td><b><center>IMAE DEL TERMINAL</center></b></td>
<td><b><center>ÁREA</center></b></td>
</tr>";
while($registro=mysql_fetch_row ($registros))
{
echo "<tr><td>".$registro[0]."</td><td>".$registro[1]."</td><td>".$registro[2]."</td><td>".$registro[3]."</td><td>".$registro[4]."</td><td>".$registro[5]."</td><td>".$registro[6]."</td><td>".$registro[7]."</td><td>".$registro[8]."</td><td>".$registro[9]."</td><td>".$registro[10]."</td><td>".$registro[11]."</td><td>".$registro[12]."</td><td>".$registro[13]."</td><td>".$registro[14]."</td><td>".$registro[15]."</td><td>".$registro[16]."</td><td>".$registro[17]."</td></tr>";
}
?>
</body>
</html>