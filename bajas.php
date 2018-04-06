<html>
<head>
	<title>BAJAS</title>
</head>
<body bgcolor="beige">

<?php
	include("datos_conexion.inc");
	$link=mysql_connect ($mysql_server, $mysql_login, $mysql_pass) or die ("Error en la conexión");
	mysql_select_db("bdinformatica", $link);
	$result=mysql_query("select * from emailscorp",$link);
?>
<H2 align=center><u>BAJA DE EMAILS,CORPORATIVOS</u></H2><br>
	<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1 ALIGN="center" bordercolor="blue">
		<TR><TD> <B>Id_cuenta</B></TD> <TD> <B>Descripción actividad</B> </TD> <TD> <B>Cuenta</B> </TD> <TD> <B>Password</B> </TD> <TD> <B>Area</B> </TD> <TD> <B>Titular</B> </TD> <TD> <B>Fecha inserción</B> </TD> <TD> <B>Cargo</B> </TD> <TD> <B>Observaciones</B> </TD> <TD> <B>¿Borrar?</B> </TD></TR>
<?php		

	while($row = mysql_fetch_array($result)) {
		printf("<tr><td>$row[idcuenta]</td> <td>$row[direccioncorreo]</td> <td>$row[cuenta]</td> <td>$row[password]</td> <td>$row[area]</td><td>$row[titular]</td><td>$row[fechacreacion]</td><td>$row[cargo]</td><td>$row[observaciones]</td><td><a href=\"borra.php?idcuenta=$row[idcuenta]\">Borrar</a></td></tr>");
	}
	mysql_close($link);
?>
</table>
</body>
</html>
