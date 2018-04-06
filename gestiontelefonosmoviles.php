<html>
<head>
	<title>busqueda</title>
</head>
<body bgcolor="beige">

<?php
	include("datos_conexion.inc");
	$link=mysql_connect ($mysql_server, $mysql_login, $mysql_pass) or die ("Error en la conexión");
	mysql_select_db("bdinformatica", $link);
	$result=mysql_query("select * from telefonosmoviles",$link);
?>
<H2 align=center><u>RESULTADO DE LA BUSQUEDA DE TELÉFONOS MÓVILES</u></H2><br>
	<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1 ALIGN="center" bordercolor="blue">
		<TR><TD> <B>Id_linea</B></TD> <TD> <B>Fecha entrega</B> </TD> <TD> <B>Numero largo</B> </TD> <TD> <B>Extensión</B> </TD> <TD> <B>Activo</B> </TD> <TD> <B>Modificación</B> </TD> <TD> <B>Cotejado</B> </TD> <TD> <B>Modelo</B> </TD> <TD> <B>N.I.F</B> </TD> <TD> <B>Titular</B> </TD> <TD> <B>Domicilio</B> </TD> <TD> <B>Restricción</B> </TD> <TD> <B>Limite de consumo</B> </TD> <TD> <B>Num_tarjeta</B> </TD> <TD> <B>Pin_1</B> </TD> <TD> <B>Puk_1</B> </TD> <TD> <B>IMAE del terminal</B> </TD> <TD> <B>Área</B> </TD> <TD> <B>¿Borrar?</B> </TD><TD> <B>¿Actualizar?</B> </TD></TR>
<?php		

	while($row = mysql_fetch_array($result)) {
		printf("<tr><td>$row[idlinea]</td> <td>$row[fechaentrega]</td> <td>$row[numero]</td> <td>$row[extension]</td> <td>$row[activo]</td><td>$row[modificacion]</td> <td>$row[cotejado]</td><td>$row[modelo]</td><td>$row[nif]</td><td>$row[titular]</td><td>$row[domicilio]</td><td>$row[restriccion]</td><td>$row[lconsumo]</td><td>$row[num_tarjeta]</td><td>$row[pin1]</td><td>$row[puk1]</td><td>$row[imae]</td><td>$row[area]</td><td><a href=\"borra5.php?idlinea=$row[idlinea]\">Borrar</a></td><td><a href=\"actualizar5.php?idlinea=$row[idlinea]\">Actualizar</a></td></tr>");
	}
	mysql_close($link);
?>
</table><br>
<table align="center" border=2  bordercolor="blue" bgcolor="white" cellpadding=2 cellspacing=2>
<tr><td><center><a href="formbusquedatelefonosmoviles.html">Atrás</a></center></td></tr>
</table> 
</body>
</html>