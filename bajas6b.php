<html>
<head>
	<title>BAJAS</title>
</head>
<body bgcolor="beige">

<?php
	include("datos_conexion.inc");
	$link=mysql_connect ($mysql_server, $mysql_login, $mysql_pass) or die ("Error en la conexión");
	mysql_select_db("bdinformatica", $link);
	$result=mysql_query("select * from equipos where idproducto='$_GET[idproducto]' ORDER BY fechainsta",$link);
?>
<H2 align=center><u> RESULTADO DE LA BUSQUEDA DE EQUIPOS INFORMÁTICOS</u></H2><br>
	<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1 ALIGN="center" bordercolor="blue">
		<TR><TD> <B>Codigo</B></TD> <TD> <B>idproducto</B> </TD> <TD> <B>Equipo</B> </TD> <TD> <B>Modelo</B> </TD> <TD> <B>Fecha instalación</B> </TD> <TD> <B>Procesador</B> </TD> <TD> <B>Memoria</B> </TD> <TD> <B>Disco duro</B> </TD> <TD> <B>Titular</B> </TD> <TD> <B>Área</B> </TD> <TD> <B>Activo</B> </TD> <TD> <B>Monitor</B> </TD> <TD> <B>Nº de serie monitor</B> </TD> <TD> <B>Observaciones</B> </TD> <TD> <B>¿Borrar?</B> </TD><TD> <B>¿Actualizar?</B> </TD></TR>
<?php		

	while($row = mysql_fetch_array($result)) {
		printf("<tr><td>$row[codigo]</td> <td>$row[idproducto]</td> <td>$row[equipo]</td> <td>$row[modelo]</td> <td>$row[fechainsta]</td><td>$row[procesador]</td> <td>$row[memoria]</td><td>$row[discoduro]</td><td>$row[titular]</td><td>$row[area]</td><td>$row[activo]</td><td>$row[monitor]</td><td>$row[nsmonitor]</td><td>$row[observaciones]</td><td><a href=\"borra6.php?idproducto=$row[idproducto]\">Borrar</a></td><td><a href=\"actualizar6.php?idproducto=$row[idproducto]\">Actualizar</a></td></tr>");
	}
	mysql_close($link);
?>
</table>
</body>
</html>