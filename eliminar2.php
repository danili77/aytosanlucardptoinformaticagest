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
$id_eliminar = $_POST['idusuario'];
$sqlEliminar = mysql_query("DELETE FROM usuarios
WHERE idusuario = $id_eliminar", $link)
or die(mysql_error());
// enviamos un mensage de exito
$mensaje =  "<b><br><br><center>LOS DATOS HAN SIDO ELIMINADOS CON ÉXITO</center></b>";
}
// si no ha sido enviado el formulario aun
// recogemos el ID
// del registro a eliminar
// via $_GET
elseif(isset($_GET['idusuario'])){
$idusuario = $_GET['idusuario'];
// hacemos una consulta
// para mostrar el registro
// que vamos a eliminar
$sql = mysql_query("SELECT * FROM usuarios
WHERE idusuario = $idusuario", $link)
or die(mysql_error());
$row = mysql_fetch_array($sql);
// advertimos
$mensaje =  "<br><br><center>¿Está seguro que quiere eliminar el usuario <b>$row[usuario]</b> con el id de usuario <b>$row[idusuario]</b> y nombre <b>$row[nom_largo]</b>  ?</center>";
}
// mostramos el mensage
echo $mensaje;
?>
<!-- creamos el formulario HTML
que enviara el ID
del registro a eliminar  -->
<form name="eliminar-registro" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
<center><input name="idusuario" type="hidden" value="<?php echo $row['idusuario']; ?>" />
<center><input name="eliminar" type="submit" value="Eliminar"></center>
</form>
<html>
<body bgcolor="beige">
<table align="center" border=2  bordercolor="blue" bgcolor="white" cellpadding=4 cellspacing=4>
<tr><td><a href="form2.html">Atras</a></td></tr>
</table>
</html>