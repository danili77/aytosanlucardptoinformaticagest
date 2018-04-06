<html>
<head>
	<title>BAJAS</title>
</head>
<body bgcolor="beige">

<?php
	include("datos_conexion.inc");
	$link=mysql_connect ($mysql_server, $mysql_login, $mysql_pass) or die ("Error en la conexión");
	mysql_select_db("bdinformatica", $link);
	$result=mysql_query("select * from areas",$link);
?>
<H2 align=center><u>BAJA DE ÁREAS</u></H2><br>
	<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1 ALIGN="center" bordercolor="blue">
		<TR><TD> <B>Id_cuenta</B></TD> <TD> <B> Descripción área</B> </TD> <TD> <B>Observaciones</B> </TD> <TD> <B>¿Borrar?</B> </TD></TR>
<?php		

	while($row = mysql_fetch_array($result)) {
		printf("<tr><td>$row[idarea]</td> <td>$row[area]</td> <td>$row[observaciones]</td><td><a href=\"borra3.php?idarea=$row[idarea]\">Borrar</a></td></tr>");
	}
	mysql_close($link);
?>
</table>
</body>
</html>