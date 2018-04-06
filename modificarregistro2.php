<html>
<head>
	<title>MODIFICAR</title>
</head>
<body bgcolor="beige">

<?php
	include("datos_conexion.inc");
	$link=mysql_connect ($mysql_server, $mysql_login, $mysql_pass) or die ("Error en la conexión");
	mysql_select_db("bdinformatica", $link);
	$result=mysql_query("select * from usuarios",$link);
?>
<H2 align=center><u>MODIFICAR DATOS DE USUARIOS</u></H2><br>
	<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1 ALIGN="center" bordercolor="blue">
		<TR><TD> <B>Id_linea</B></TD> <TD> <B>Fecha inserción</B> </TD> <TD> <B>Usuario activo</B> </TD> <TD> <B>Soporte</B> </TD> <TD> <B>Nombre completo</B> </TD> <TD> <B>Usuario</B> </TD> <TD> <B>Contraseña </B> </TD> <TD> <B>Área</B> </TD> <TD> <B>Observaciones</B> </TD> <TD> <B>¿Actualizar?</B> </TD></TR>
<?php		

	while($row = mysql_fetch_array($result)) {
		printf("<tr><td>$row[idusuario]</td> <td>$row[fechaalta]</td> <td>$row[activo]</td> <td>$row[soporte]</td> <td>$row[nom_largo]</td><td>$row[usuario]</td><td>$row[contraseña]</td><td>$row[departamento]</td><td>$row[descripcion]</td><td><a href=\"actualizar2.php?idusuario=$row[idusuario]\">Actualizar</a></td></tr>");
	}
	mysql_close($link);
?>
</table>
</body>
</html>