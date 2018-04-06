<html>
<head>
<title>Consultar base datos "almacen" Tabla Entradas</title>
</head>
<body bgcolor="beige">
<table align="center" bgcolor="white" border="1">
<tr><td><input type="button" name="imprimir" value="Imprimir lista" id="button"  onClick="window.print();"/></td></tr>
</table>
<?php
include("datos_conexion.inc");
$conexion=mysql_connect($mysql_server,$mysql_login, $mysql_pass) or die ("Error en la conexion");
mysql_select_db("bdinformatica",$conexion);
$sentenciaSQL="SELECT idcuenta,direccioncorreo,cuenta,password,area,titular,fechacreacion,cargo,observaciones FROM emailscorp;";
$registros=mysql_query($sentenciaSQL, $conexion);
echo "<h2 align =center><u>LISTA DE E-MAILS CORPORATIVOS</u></h2><br>";
echo "<table border=2 align=center bordercolor=blue>
<tr>
<td><b><center>IDCUENTA</center></b></td>
<td><b><center>DIRECCIONCORREO</center></b></td>
<td><b><center>CUENTA</center></b></td>
<td><b><center>PASSWORD</center></b></td>
<td><b><center>AREA</center></b></td>
<td><b><center>TITULAR</center></b></td>
<td><b><center>FECHA INSERCIÓN</center></b></td>
<td><b><center>CARGO</center></b></td>
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