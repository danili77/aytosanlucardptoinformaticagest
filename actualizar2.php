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
if(isset($_GET['idusuario'])){
$idusuario = $_GET['idusuario'];
// hacemos una consulta
// para mostrar los datos
$sql = mysql_query("SELECT * FROM usuarios
WHERE idusuario = $idusuario", $link)
or die(mysql_error());
$row = mysql_fetch_array($sql);
// advertimos
$mensaje = "<h2 align=center><u>MODIFICAR DATOS DEL REGISTRO</u></h2> <br> ID_LINEA: <b>$row[idusuario]</b> // NOMBRE COMPLETO:  <b>$row[nom_largo]</b></center>";
}
// comprobamos si
// ha sido enviado el formulario
if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
// comprobamos que no lleguen campos vacios
if(!empty($_POST['idusuario']) && !empty($_POST['nom_largo']) && !empty($_POST['usuario']) && !empty($_POST['contrase�a'])){
// creamos las variables
// que vamos a usar en la consulta UPDATE
// y le asignamos sus valores
$idusuario= $_POST['idusuario'];
$fechaalta = $_POST['fechaalta'];
$activo = $_POST['activo'];
$soporte = $_POST['soporte'];
$nom_largo = $_POST['nom_largo'];
$usuario = $_POST['usuario'];
$contrase�a = $_POST['contrase�a'];
$departamento = $_POST['departamento'];
$descripcion = $_POST['descripcion'];
// la consulta UPDATE
$sqlUpdate = mysql_query("UPDATE usuarios
SET fechaalta = '$fechaalta',
activo = '$activo',
soporte = '$soporte',
nom_largo = '$nom_largo',
usuario = '$usuario',
contrase�a = '$contrase�a',
departamento ='$departamento',
descripcion ='$descripcion'
WHERE idusuario = '$idusuario'", $link)
or die(mysql_error());
echo "<center><b><br><br>REGISTRO ACTUALIZADO CORRECTAMENTE</b><br><br><table  border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><center><a href=actualizar2.php>Atr�s</a></center></td></tr>
</table></center>";
}else{
echo "DEBE LLENAR TODOS LOS CAMPOS <table align=center border=2  bordercolor=blue bgcolor=white cellpadding=2 cellspacing=2>
<tr><td><a href=actualizar2.php>Atr�s</a></td></tr>
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
<b>Fecha inserci�n:</b> <input type="text" name="fechaalta" value="<?php echo $row['fechaalta']; ?>" />
<b>Usuario activo</b>  <input type="text" name="activo" value="<?php echo $row['activo']; ?>" />
<b>Soporte:</b> <select name="soporte" value="<?php echo $row['soporte']; ?>" />
<option>Usuario</option>
<option>Router</option>
<option>AS400</option>
<option>Switch</option>
</select><br><br>
<b>Nombre completo:</b> <input type="text" name="nom_largo" value="<?php echo $row['nom_largo']; ?>" /><br><br>
<b>Usuario:</b> <input type="text" name="usuario" value="<?php echo $row['usuario']; ?>" />
<b>Contrase�a:</b> <input type="text" name="contrase�a" value="<?php echo $row['contrase�a']; ?>" /><br><br>
<b>Area:</b> <select name="departamento" value="<?php echo $row['departamento']; ?>" />
<option>ALCALDIA</option>
<option>ALTERNATIVA SANLUQUE�A</option>
<option>ARCHIVO</option>
<option>ASESORIA JURIDICA</option>
<option>ATENCION AL CIUDADANO</option>
<option>BIBLIOTECA</option>
<option>CASERO</option>
<option>CENTRALITAS</option>
<option>CIUDADANOS INDEPENDIENTES</option>
<option>COMERCIO</option>
<option>COMIT� DE EMPRESA</option>
<option>CONSERJERIA</option>
<option>CONTRATACI�N</option>
<option>CULTURA</option>
<option>DELEGACI�N ESPECIAL LA JARA</option>
<option>DELEGACI�N ESPECIAL BONANZA-ALGAIDA</option>
<option>DEPORTE</option>
<option>DIPUTACION</option>
<option>ECONOM�A Y HACIENDA</option>
<option>ELICODESA</option>
<option>EMULISAN</option>
<option>ENSE�ANZA</option>
<option>EQUIPO DE GOBIERNO</option>
<option>ERESSAN</option>
<option>FIESTAS</option>
<option>FOMENTO EMPRESAS Y FORMACI�N</option>
<option>GABINETE ALCALDIA</option>
<option>GERENCIA MUNICIPAL URBANISMO</option>
<option>GRUPO MIXTO</option>
<option>IGUALDAD</option>
<option>INFRAESTRUCTURAS</option>
<option>INGRESOS</option>
<option>INNOVACI�N TECNOL�GICA Y CALIDAD ADMINISTRATIVA</option>
<option>INSPECTORES DE RENTAS</option>
<option>INTERVENCI�N</option>
<option>IZQUIERDA UNIDA</option>
<option>JUVENTUD</option>
<option>MEDIO AMBIENTE</option>
<option>NOTIFICADORES</option>
<option>PARTICIPACION CIUDADANA</option>
<option>PARTIDO ANDALUCISTA</option>
<option>PARTIDO POPULAR</option>
<option>PARTIDO SOCIALISTA OBRERO ESPA�OL</option>
<option>PERSONAL</option>
<option>POBLACI�N</option>
<option>POLICIA LOCAL</option>
<option>PRENSA</option>
<option>PRESIDENCIA</option>
<option>PROTECCI�N CIVIL</option>
<option>RECAUDADOR</option>
<option>REGISTRO</option>
<option>RENTAS</option>
<option>SALUD Y CONSUMO</option>
<option>SECRETARIA GENERAL</option>
<option>SERVICIOS SOCIALES</option>
<option>TR�FICO</option>
<option>TURISMO</option>
</select><br><br> 
<b>Observaciones:</b> <input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>" />
<input type="hidden" name="idusuario" value="<?php echo $row['idusuario']; ?>" />
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