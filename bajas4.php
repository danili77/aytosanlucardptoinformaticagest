<html>
<head>
	<title>BAJAS</title>
</head>
<body bgcolor="beige">

<?php
	include("datos_conexion.inc");
	$link=mysql_connect ($mysql_server, $mysql_login, $mysql_pass) or die ("Error en la conexión");
	mysql_select_db("bdinformatica", $link);
	$result=mysql_query("select * from telefonosfijos",$link);
?>
<H2 align=center><u>BAJA DE TELÉFONOS FIJOS</u></H2><br>
	<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1 ALIGN="center" bordercolor="blue">
		<TR><TD> <B>Id_linea</B></TD> <TD> <B>Fecha entrega</B> </TD> <TD> <B>Numero largo</B> </TD> <TD> <B>Extensión</B> </TD> <TD> <B>Activo</B> </TD> <TD> <B>Modelo</B> </TD> <TD> <B>N.I.F</B> </TD> <TD> <B>Titular</B> </TD> <TD> <B>Servicio ADSL</B> </TD> <TD> <B>Modalidad ADSL</B> </TD> <TD> <B>RDSI</B> </TD> <TD> <B>Restricción</B> </TD> <TD> <B>Área</B> </TD> <TD> <B>Observaciones</B> </TD> <TD> <B>¿Borrar?</B> </TD></TR>
<?php		

	while($row = mysql_fetch_array($result)) {
		printf("<tr><td>$row[idlinea]</td> <td>$row[fechaasignacion]</td> <td>$row[numero]</td> <td>$row[extension]</td> <td>$row[activo]</td><td>$row[modelo]</td><td>$row[nif]</td><td>$row[titular]</td><td>$row[adsl]</td><td>$row[modadsl]</td><td>$row[rdsi]</td><td>$row[categoria]</td><td>$row[area]</td><td>$row[observaciones]</td><td><a href=\"borra4.php?idlinea=$row[idlinea]\">Borrar</a></td></tr>");
	}
	mysql_close($link);
?>
</table>
</body>
</html>
