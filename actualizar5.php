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
$sql = mysql_query("SELECT * FROM telefonosmoviles
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
$fechaasignacion = $_POST['fechaentrega'];
$numero = $_POST['numero'];
$extension = $_POST['extension'];
$activo = $_POST['activo'];
$modificacion = $_POST['modificacion'];
$cotejado = $_POST['cotejado'];
$nif = $_POST['nif'];
$titular = $_POST['titular'];
$domicilio = $_POST['domicilio'];
$restriccion = $_POST['restriccion'];
$lconsumo = $_POST['lconsumo'];
$num_tarjeta = $_POST['num_tarjeta'];
$pin1 = $_POST['pin1'];
$puk1 = $_POST['puk1'];
$imae = $_POST['imae'];
$area = $_POST['area'];
// la consulta UPDATE
$sqlUpdate = mysql_query("UPDATE telefonosmoviles
SET fechaentrega = '$fechaentrega',
numero = '$numero',
extension = '$extension',
activo = '$activo',
modificacion = '$modificacion',
cotejado = '$cotejado',
nif = '$nif',
titular = '$titular',
domicilio = '$domicilio',
restriccion = '$restriccion',
lconsumo = '$lconsumo',
num_tarjeta = '$num_tarjeta',
pin1 = '$pin1',
puk1 = '$puk1',
imae = '$imae',
area = '$area'
WHERE idlinea = '$idlinea'", $link)
or die(mysql_error());
echo "<center><b><br><br>REGISTRO ACTUALIZADO CORRECTAMENTE</b><br><br><table  border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><center><a href=modificarregistro5.php>Atrás</a></center></td></tr>
</table></center>";
}else{
echo "DEBE LLENAR TODOS LOS CAMPOS <table align=center border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><a href=modificarregistro5.php>Atrás</a></td></tr>
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
<b> Activo </b> <input type="checkbox" name="activo" value="<?php echo $row['activo']; ?>" />
<b> Modificación </b> <input type="checkbox" name="modificacion" value="<?php echo $row['modificacion']; ?>" />
<b> Cotejado </b> <input type="checkbox" name="cotejado" value="<?php echo $row['cotejado']; ?>" /><br><br>
<b> Fecha entrega</b>  <input type="text" name="fechaentrega" maxlength="10" value="<?php echo $row['fechaentrega']; ?>" /><br><br>
<b> Numero largo:</b> <input type="text" name="numero" value="<?php echo $row['numero']; ?>" />
<b> Extensión:</b> <input type="text" name="extension" value="<?php echo $row['extension']; ?>" /><br><br>
<b> Modelo:</b> <input type="text" name="modelo" value="<?php echo $row['modelo']; ?>" />
<b> N.I.F:</b> <input type="text" name="nif" maxlength="9" value="<?php echo $row['nif']; ?>" />
<b> Titular:</b> <input type="text" name="titular" value="<?php echo $row['titular']; ?>" /><br><br>
<b> Domicilio:</b> <input type="text" name="domicilio" value="<?php echo $row['domicilio']; ?>" /><br><br>
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
</select>
<b> Restricción:</b><select name="restriccion" value="<?php echo $row['restriccion']; ?>" />
<option>GRUPO 0</option>
<option>GRUPO 1</option>
<option>GRUPO 2</option>
<option>GRUPO 3</option>
</select><br><br>
<b> Limite de consumo:</b> <input type="text" name="lconsumo" value="<?php echo $row['lconsumo']; ?>" />
<b> Modelo del terminal:</b> <input type="text" name="modelo" value="<?php echo $row['modelo']; ?>" />
<b> IMAE del terminal:</b> <input type="text" name="imae" value="<?php echo $row['imae']; ?>" /><br><br>
<input type="hidden" name="idlinea" value="<?php echo $row['idlinea']; ?>" />
</fieldset>
<fieldset>
<legend>Datos de la tarjeta</legend>
<b> Número tarjeta:</b> <input type="text" name="num_tarjeta" value="<?php echo $row['num_tarjeta']; ?>" />
<b> PIN_1:</b> <input type="text" name="pin1" value="<?php echo $row['pin1']; ?>" />
<b> PUK_1:</b> <input type="text" name="puk1" value="<?php echo $row['puk1']; ?>" />
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