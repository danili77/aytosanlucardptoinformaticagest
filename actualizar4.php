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
if(isset($_GET['idlinea'])){
$idlinea = $_GET['idlinea'];
// hacemos una consulta
// para mostrar los datos
$sql = mysql_query("SELECT * FROM telefonosfijos
WHERE idlinea = $idlinea", $link)
or die(mysql_error());
$row = mysql_fetch_array($sql);
// advertimos
$mensaje = "<h2 align=center><u>ACTUALIZAR DATOS DEL REGISTRO</u></h2> <br> ID_LINEA: <b>$row[idlinea]</b> //NUMERO LARGO: <b>$row[numero]</b> // TITULAR:  <b>$row[titular]</b></center>";
}
// comprobamos si
// ha sido enviado el formulario
if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
// comprobamos que no lleguen campos vacios
if(!empty($_POST['idlinea']) && !empty($_POST['numero']) && !empty($_POST['titular']) && !empty($_POST['nif'])){
// creamos las variables
// que vamos a usar en la consulta UPDATE
// y le asignamos sus valores
$idlinea= $_POST['idlinea'];
$fechaasignacion = $_POST['fechaasignacion'];
$numero = $_POST['numero'];
$extension = $_POST['extension'];
$activo = $_POST['activo'];
$nif = $_POST['nif'];
$titular = $_POST['titular'];
$adsl = $_POST['adsl'];
$modadsl = $_POST['modadsl'];
$rdsi = $_POST['rdsi'];
$categoria = $_POST['categoria'];
$area = $_POST['area'];
$observaciones = $_POST['observaciones'];
// la consulta UPDATE
$sqlUpdate = mysql_query("UPDATE telefonosfijos
SET fechaasignacion = '$fechaasignacion',
numero = '$numero',
extension = '$extension',
activo = '$activo',
nif = '$nif',
titular = '$titular',
adsl = '$adsl',
modadsl = '$modadsl',
rdsi = '$rdsi',
categoria = '$categoria',
area = '$area',
observaciones = '$observaciones'
WHERE idlinea = '$idlinea'", $link)
or die(mysql_error());
echo "<center><b><br><br>REGISTRO ACTUALIZADO CORRECTAMENTE</b><br><br><table  border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><center><a href=modificarregistro4.php>Atrás</a></center></td></tr>
</table></center>";
}else{
echo "DEBE LLENAR TODOS LOS CAMPOS <table align=center border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><a href=modificarregistro4.php>Atrás</a></td></tr>
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
<b> Fecha entrega</b>  <input type="text" name="fechaasignacion" maxlength="10" value="<?php echo $row['fechaasignacion']; ?>" /><br><br>
<b> Numero largo:</b> <input type="text" name="numero" value="<?php echo $row['numero']; ?>" />
<b> Extensión:</b> <input type="text" name="extension" value="<?php echo $row['extension']; ?>" />
<b> Activo</b> <input type="checkbox" name="activo" value="<?php echo $row['activo']; ?>" /><br><br>
<b> Modelo:</b> <input type="text" name="modelo" value="<?php echo $row['modelo']; ?>" />
<b> N.I.F:</b> <input type="text" name="nif" maxlength="9" value="<?php echo $row['nif']; ?>" />
<b> Titular:</b> <input type="text" name="titular" value="<?php echo $row['titular']; ?>" /><br><br>
<b>Servicio ADSL </b><input type="checkbox" name="adsl" value="<?php echo $row['adsl']; ?>" />
<b> Modalidad ADSL:</b> <input type="text" name="modadsl" value="<?php echo $row['modadsl']; ?>" />
<b> RDSI</b> <input type="checkbox" name="rdsi" value="<?php echo $row['rdsi']; ?>" />
<b> Restricción:</b><select name="categoria" value="<?php echo $row['categoria']; ?>" />
<option>GRUPO 0</option>
<option>GRUPO 1</option>
<option>GRUPO 2</option>
<option>GRUPO 3</option>
</select><br><br>
<b> Area:</b> <select name="area" value="<?php echo $row['area']; ?>" />
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
<b> Observaciones:</b> <input type="text" name="observaciones" size="6" value="<?php echo $row['observaciones']; ?>" />
<input type="hidden" name="idlinea" value="<?php echo $row['idlinea']; ?>" />
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