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
// comprovamos si
// ha sido enviado el formulario
if(isset($_POST['eliminar']) && $_POST['eliminar'] == 'Eliminar'){
// creamos la consulta
// que eliminara el registro
// que viene via $_POST
$id_eliminar = $_POST['idcuenta'];
$sqlEliminar = mysql_query("DELETE FROM emailscorp
WHERE idcuenta = $id_eliminar", $link)
or die(mysql_error());
// enviamos un mensage de exito
$mensaje =  "<b><br><br><center>LOS DATOS HAN SIDO ELIMINADOS CON ÉXITO</center></b>";
}
// si no ha sido enviado el formulario aun
// recogemos el ID
// del registro a eliminar
// via $_GET
elseif(isset($_GET['idcuenta'])){
$idcuenta = $_GET['idcuenta'];
// hacemos una consulta
// para mostrar el registro
// que vamos a eliminar
$sql = mysql_query("SELECT * FROM emailscorp
WHERE idcuenta = $idcuenta", $link)
or die(mysql_error());
$row = mysql_fetch_array($sql);
// advertimos
$mensaje =  "<br><br><center>¿Está seguro que quiere eliminar el email <b>$row[direccioncorreo]</b> con id_cuenta <b>$row[idcuenta]</b> y titular <b>$row[titular]</b>  ?</center>";
}
// mostramos el mensage
echo $mensaje;
?>
<!-- creamos el formulario HTML
que enviara el ID
del registro a eliminar  -->
<form name="eliminar-registro" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
<center><input name="idcuenta" type="hidden" value="<?php echo $row['idcuenta']; ?>" />
<center><input name="eliminar" type="submit" value="Eliminar"></center>
</form>
<html>
<body bgcolor="beige">
<table align="center" border=2  bordercolor="blue" bgcolor="white" cellpadding=4 cellspacing=4>
<tr><td><a href="form1.html">Atras</a></td></tr>
</table>
</html>