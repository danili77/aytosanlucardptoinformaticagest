<?php
/** conexion ***************************/
// conectamos a la base de datos
$link = mysql_connect('localhost', 'root', 'root');
if(!$link) {
die("Error al intentar conectar: ".mysql_error());
}
// seleccionamos la base de datos
$db_link = mysql_select_db('bdinformatica', $link);
if(!$db_link) {
die("Error al intentar seleccionar la base de datos". mysql_error());
}
/** fin conexion ************************/
// hacemos una consulta
// para mostrar los registros
$sql = mysql_query("SELECT * FROM emailscorp", $link) or die(mysql_error());
// mostramos los registros
echo "<h2><u><center>BAJA DE REGISTROS</center></u></h2>";
while($row = mysql_fetch_array($sql)){
echo "<B>Titular-Id.cuenta-Descripción actividad: </B>";
echo $row['titular']." - ".$row['idcuenta']." - ".$row['direccioncorreo'].
// mostramos un vinculo Eliminar
// que envia via $_GET
// el ID del registro a eliminar
" - <a href='eliminar1.php?idcuenta=$row[idcuenta]'>Eliminar<br><br></a>"."\n";
}
?>
<html>
<body bgcolor="beige">
<table align="center" border=2  bordercolor="blue" bgcolor="white" cellpadding=2 cellspacing=2>
<tr><td><a href="form1.html">Atras</a></td></tr>
</table>
</html>