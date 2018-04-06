<html>
<body bgcolor="beige">
</body>
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
// recogemos el codigo
// del registro a actualizar
if(isset($_GET['idcuenta'])){
$idcuenta = $_GET['idcuenta'];
// hacemos una consulta
// para mostrar los datos
$sql = mysql_query("SELECT * FROM emailscorp
WHERE idcuenta = $idcuenta", $link)
or die(mysql_error());
$row = mysql_fetch_array($sql);
// advertimos
$mensaje = "Actualizar los datos del titular <b>$row[titular]</b> con email <b>$row[direccioncorreo]</b>e idcuenta <b>$row[idcuenta]</b>  ";
}
// comprobamos si
// ha sido enviado el formulario
if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
// comprobamos que no lleguen campos vacios
if(!empty($_POST['titular']) && !empty($_POST['idcuenta']) && !empty($_POST['direccioncorreo'])){
// creamos las variables
// que vamos a usar en la consulta UPDATE
// y le asignamos sus valores
$idcuenta = $_POST['idcuenta'];
$direccioncorreo = $_POST['direccioncorreo'];
$cuenta = $_POST['cuenta'];
$password = $_POST['password'];
$area = $_POST['area'];
$titular = $_POST['titular'];
$fechacreacion = $_POST['fechacreacion'];
$observaciones = $_POST['observaciones'];
$cargo = $_POST['cargo'];
// la consulta UPDATE
$sqlUpdate = mysql_query("UPDATE altaproductos
SET direccioncorreo = '$direccioncorreo',
cuenta = '$cuenta',
password = '$password',
area = '$area',
titular = '$titular',
fechacreacion = '$fechacreacion'
WHERE idcuenta = '$idcuenta'", $link)
or die(mysql_error());
echo "<center><b><br><br>REGISTRO ACTUALIZADO CORRECTAMENTE</b><br><br><table  border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><a href=actualizar1.php>Atrás</a></td></tr>
</table></center>";
}else{
echo "DEBE LLENAR TODOS LOS CAMPOS <table align=center border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><a href=actualizar1.php>Atrás</a></td></tr>
</table>";
}
}else{
// mostramos el mensaje
echo "<br>";
?>
<!--
el formulario.
los values de los campos
son los valores que optenemos
de la consulta SELECT
-->
<h2><u><center>MODIFICACIÓN DE REGISTROS</center></u></h2>
<form name="actualizar-registro" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<fieldset>
<center>
<b>Id.Cuenta:</b> <input type="text" name="idcuenta" value="<?php echo $row['idcuenta']; ?>" />
<b>Fecha inserción:</b> <input type="text" name="fechacreacion" value="<?php echo $row['fechacreacion']; ?>" /><br><br>
<b>Descripción actividad:</b> <input type="text" name="direccioncorreo" value="<?php echo $row['direccioncorreo']; ?>" /><br><br>
<b>Titular:</b> <input type="text" name="titular" value="<?php echo $row['titular']; ?>" />
<b>Area:</b> <select name="area" value="<?php echo $row['area']; ?>" />
<option>ALCALDIA</option>
<option>ALTERNATIVA SANLUQUEÑA</option>
<option>ARCHIVO</option>
<option>ASESORIA JURIDICA</option>
<option>ATENCION AL CIUDADANO</option>
<option>BIBLIOTECA</option>
<option>CASERO</option>
<option>CENTRALITAS</option>
<option>CIUDADANOS INDEPENDIENTES</option>
<option>COMERCIO</option>
<option>COMITÉ DE EMPRESA</option>
<option>CONSERJERIA</option>
<option>CONTRATACIÓN</option>
<option>CULTURA</option>
<option>DELEGACIÓN ESPECIAL LA JARA</option>
<option>DELEGACIÓN ESPECIAL BONANZA-ALGAIDA</option>
<option>DEPORTE</option>
<option>DIPUTACION</option>
<option>ECONOMÍA Y HACIENDA</option>
<option>ELICODESA</option>
<option>EMULISAN</option>
<option>ENSEÑANZA</option>
<option>EQUIPO DE GOBIERNO</option>
<option>ERESSAN</option>
<option>FIESTAS</option>
<option>FOMENTO EMPRESAS Y FORMACIÓN</option>
<option>GABINETE ALCALDIA</option>
<option>GERENCIA MUNICIPAL URBANISMO</option>
<option>GRUPO MIXTO</option>
<option>IGUALDAD</option>
<option>INFRAESTRUCTURAS</option>
<option>INGRESOS</option>
<option>INNOVACIÓN TECNOLÓGICA Y CALIDAD ADMINISTRATIVA</option>
<option>INSPECTORES DE RENTAS</option>
<option>INTERVENCIÓN</option>
<option>IZQUIERDA UNIDA</option>
<option>JUVENTUD</option>
<option>MEDIO AMBIENTE</option>
<option>NOTIFICADORES</option>
<option>PARTICIPACION CIUDADANA</option>
<option>PARTIDO ANDALUCISTA</option>
<option>PARTIDO POPULAR</option>
<option>PARTIDO SOCIALISTA OBRERO ESPAÑOL</option>
<option>PERSONAL</option>
<option>POBLACIÓN</option>
<option>POLICIA LOCAL</option>
<option>PRENSA</option>
<option>PRESIDENCIA</option>
<option>PROTECCIÓN CIVIL</option>
<option>RECAUDADOR</option>
<option>REGISTRO</option>
<option>RENTAS</option>
<option>SALUD Y CONSUMO</option>
<option>SECRETARIA GENERAL</option>
<option>SERVICIOS SOCIALES</option>
<option>TRÁFICO</option>
<option>TURISMO</option>
</select><br><br>
<b>Id.Cuenta:</b> <input type="text" name="cuenta" value="<?php echo $row['cuenta']; ?>" />
<b>Password:</b> <input type="text" name="password" value="<?php echo $row['password']; ?>" /><br><br>
<b>Cargo:</b> <input type="text" name="cargo" value="<?php echo $row['cargo']; ?>" />
<b>Observaciones:</b> <input type="text" name="observaciones" value="<?php echo $row['observaciones']; ?>" />
</center>
</fieldset>
<br>
<fieldset>
<center>
<input type="submit" name="actualizar" value="Actualizar" />
<input name="borrar" type="reset" value="Borrar formulario"></center><p>
<table align="center" border=2  bordercolor="blue" bgcolor="white" cellpadding=2 cellspacing=2>
<tr><td><a href="form1.html">Atrás</a></td></tr>
</table>
</fieldset>
</form>
<center><p><u><b>Nota:</b></u> Para modificar un registro ya existente poner el mismo código que tenia anteriormente en el campo codigo del formulario.</p></center>
<html>
<body bgcolor="beige">
</body>
</html>
<?php } ?>
</html>