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
// recogemos el ID
// del registro a actualizar
if(isset($_GET['idarea'])){
$idarea = $_GET['idarea'];
// hacemos una consulta
// para mostrar los datos
$sql = mysql_query("SELECT * FROM areas
WHERE idarea = $idarea", $link)
or die(mysql_error());
$row = mysql_fetch_array($sql);
// advertimos
$mensaje = "<h2 align=center ><u>MODIFICAR DATOS DEL REGISTRO</u></h2> <br> ID_CUENTA: <b>$row[idarea]</b> // DESCRIPCIÓN ÁREA: <b>$row[area]</b>";
}
// comprobamos si
// ha sido enviado el formulario
if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
// comprobamos que no lleguen campos vacios
if(!empty($_POST['idarea']) && !empty($_POST['area'])){
// creamos las variables
// que vamos a usar en la consulta UPDATE
// y le asignamos sus valores
$idarea= $_POST['idarea'];
$area = $_POST['area'];
$observaciones = $_POST['observaciones'];
// la consulta UPDATE
$sqlUpdate = mysql_query("UPDATE areas
SET area = '$area',
observaciones = '$observaciones'
WHERE idarea = '$idarea'", $link)
or die(mysql_error());
echo "<center><b><br><br>REGISTRO MODIFICAQDO CORRECTAMENTE</b><br><br><table  border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><center><a href=modificarregistro3.php>Atrás</a></center></td></tr>
</table></center>";
}else{
echo "DEBE LLENAR TODOS LOS CAMPOS <table align=center border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><a href=modificarregistro3.php>Atrás</a></td></tr>
</table>";
}
}else{
// mostramos el mensaje
echo "<p>".$mensaje."</p>";
?>
<!--
el formulario.
los values de los campos
son los valores que optenemos
de la consulta SELECT
-->
<form name="form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<fieldset><center>
<b>Id_cuenta:</b> <input type="text" name="idarea" value="<?php echo $row['idarea']; ?>" /><br><br>
<b> Descripción área:</b> <select name="area" value="<?php echo $row['area']; ?>" />
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
<b>Observaciones:</b> <input type="text" name="observaciones" value="<?php echo $row['observaciones']; ?>" />
<input type="hidden" name="idarea" value="<?php echo $row['idarea']; ?>" />
</center>
</fieldset><br>
<fieldset>
<center><input type="submit" name="actualizar" value="Actualizar" /></center>
</fieldset>

</form>
<?php } ?>
<html>
<body bgcolor="beige">
</body>
</html>