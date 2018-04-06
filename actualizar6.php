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
if(isset($_GET['idproducto'])){
$idproducto = $_GET['idproducto'];
// hacemos una consulta
// para mostrar los datos
$sql = mysql_query("SELECT * FROM equipos
WHERE idproducto = $idproducto", $link)
or die(mysql_error());
$row = mysql_fetch_array($sql);
// advertimos
$mensaje = "<h2 align=center><u>ACTUALIZAR DATOS DEL REGISTRO</u></h2> <br> ID_PRODUCTO: <b>$row[idproducto]</b> //CÓDIGO: <b>$row[codigo]</b> // TITULAR:  <b>$row[titular]</b></center>";
}
// comprobamos si
// ha sido enviado el formulario
if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
// comprobamos que no lleguen campos vacios
if(!empty($_POST['idproducto']) && !empty($_POST['codigo']) && !empty($_POST['titular']) && !empty($_POST['equipo'])){
// creamos las variables
// que vamos a usar en la consulta UPDATE
// y le asignamos sus valores
$idproducto= $_POST['idproducto'];
$codigo = $_POST['codigo'];
$equipo = $_POST['equipo'];
$modelo = $_POST['modelo'];
$fechainsta = $_POST['fechainsta'];
$procesador = $_POST['procesador'];
$memoria = $_POST['memoria'];
$discoduro = $_POST['discoduro'];
$teclado = $_POST['teclado'];
$raton = $_POST['raton'];
$titular = $_POST['titular'];
$area = $_POST['area'];
$activo = $_POST['activo'];
$monitor = $_POST['monitor'];
$nsmonitor = $_POST['nsmonitor'];
$observaciones = $_POST['observaciones'];
// la consulta UPDATE
$sqlUpdate = mysql_query("UPDATE equipos
SET codigo = '$codigo',
equipo = '$equipo',
modelo = '$modelo',
fechainsta = '$fechainsta',
procesador = '$procesador',
memoria = '$memoria',
discoduro = '$discoduro',
teclado = '$teclado',
raton = '$raton',
titular = '$titular',
area = '$area',
activo = '$activo',
monitor = '$monitor',
nsmonitor = '$nsmonitor',
observaciones = '$observaciones'
WHERE idproducto = '$idproducto'", $link)
or die(mysql_error());
echo "<center><b><br><br>REGISTRO ACTUALIZADO CORRECTAMENTE</b><br><br><table  border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><center><a href=modificarregistro6.php>Atrás</a></center></td></tr>
</table></center>";
}else{
echo "DEBE LLENAR TODOS LOS CAMPOS <table align=center border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><a href=modificarregistro6.php>Atrás</a></td></tr>
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
<b> Fecha instalación</b>  <input type="text" name="fechainsta" maxlength="10" value="<?php echo $row['fechainsta']; ?>" />
<b> Código</b>  <input type="text" name="codigo"  value="<?php echo $row['codigo']; ?>" /><br><br>
<b> Equipo</b>  <input type="text" name="equipo" maxlength="30" value="<?php echo $row['equipo']; ?>" />
<b> Modelo</b>  <input type="text" name="modelo" maxlength="30" value="<?php echo $row['modelo']; ?>" />
<b> Procesador</b>  <input type="text" name="procesador" maxlength="6" value="<?php echo $row['procesador']; ?>" /><br><br>
<b> Titular:</b> <input type="text" name="titular" size="50" value="<?php echo $row['titular']; ?>" /><br><br>
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
<b> Monitor:</b> <input type="text" name="monitor" value="<?php echo $row['monitor']; ?>" />
<b> Nº de serie monitor:</b> <input type="text" name="nsmonitor" value="<?php echo $row['nsmonitor']; ?>" /><br><br>
<b> Disco duro</b>  <input type="text" name="discoduro" maxlength="10" value="<?php echo $row['discoduro']; ?>" />
<b> Teclado</b>  <input type="text" name="teclado" maxlength="10" value="<?php echo $row['teclado']; ?>" />
<b> Ratón</b>  <input type="text" name="raton" maxlength="10" value="<?php echo $row['raton']; ?>" />
<b> Memoria</b>  <input type="text" name="memoria" maxlength="10" value="<?php echo $row['memoria']; ?>" /><br><br>
<b> Observaciones</b>  <input type="text" name="observaciones" maxlength="10" value="<?php echo $row['observaciones']; ?>" />
<input type="hidden" name="idproducto" value="<?php echo $row['idproducto']; ?>" />
</fieldset>
<fieldset>
<center><input type="submit" name="actualizar" value="Actualizar" /></center>
</fieldset>
</form>
<?php } ?>
<html>
<body bgcolor="beige">

</body>
</html>