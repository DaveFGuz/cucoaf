<?php 
require 'conexion.php';


//edita ubicacion
if (!empty($_POST['nombeditUb']) && !empty($_POST['ideU']) && !empty($_POST['codUb2']))
	  {
$ideU = $_POST['ideU'];
	$nombeditUb = $_POST['nombeditUb'];
$codi=$_POST['codUb2'];
$sql = " UPDATE ubicacion set nombre='$nombeditUb',codU='$codi' WHERE idUb='$ideU'";
	$resultado = $mysqli->query($sql);
//$insertar="INSERT INTO ubicacion (nombre) VALUES ('$_POST[nombeditUb]') WHERE $idUb='$_POST[ideU]'";
//$ejecutar=mysqli_query($con,$insertar);

	echo "<script language='javascript'>";
echo  "
         location.href = 'Ubicacion.blade.php?v=2';
         ";
echo "</script>";


}
//edita proveedor
if (!empty($_POST['nomb2']) && !empty($_POST['dir2']) && !empty($_POST['nit2']) && !empty($_POST['cont2']) && !empty($_POST['tel2']) && !empty($_POST['correo2']))  {
$ideU = $_POST['ideU'];
$nombre=$_POST['nomb2'];
$direc=$_POST['dir2'];
$nit=$_POST['nit2'];
$cont=$_POST['cont2'];
$tel=$_POST['tel2'];
$corre=$_POST['correo2'];
$ob=$_POST['obs2'];
$sql ="UPDATE proveedor set nombre='$nombre',direccion='$direc',nit='$nit',contacto='$cont',telefono='$tel',correo='$corre',observacion='$ob' WHERE ide='$ideU'";
$resultado = $mysqli->query($sql);

	echo "<script language='javascript'>";
echo  "
         location.href = 'RegistroProveedor.blade.php?v=2';
         ";
echo "</script>";




}
//editar marca

if (!empty($_POST['nombMar'])){

$ideU = $_POST['ideU'];
	$nombeditUb = $_POST['nombMar'];
	

$sql = " UPDATE marca set nombre='$nombeditUb' WHERE idMarca='$ideU'";
	$resultado = $mysqli->query($sql);


		echo "<script language='javascript'>";
echo  "
         location.href = 'Marcas.blade.php?v=2';
         ";
echo "</script>";



}

//edita movimiento
if (!empty($_POST['nombMo']) && !empty($_POST['ideU']))
	  {
$ideU = $_POST['ideU'];
	$nombMo = $_POST['nombMo'];

$sql = " UPDATE movimiento set nombre='$nombMo' WHERE idMov='$ideU'";
	$resultado = $mysqli->query($sql);
//$insertar="INSERT INTO ubicacion (nombre) VALUES ('$_POST[nombeditUb]') WHERE $idUb='$_POST[ideU]'";
//$ejecutar=mysqli_query($con,$insertar);

	echo "<script language='javascript'>";
echo  "
         location.href = 'Movimiento.blade.php?v=2';
         ";
echo "</script>";

}

//editar clasificacion Activo

if (!empty($_POST['nomAct2']) && !empty($_POST['vida2'])){

$ideU = $_POST['ideU'];
	$nombe = $_POST['nomAct2'];
	$vida = $_POST['vida2'];

$sql = " UPDATE clasificaactivo set nombre='$nombe',vida='$vida' WHERE idClas='$ideU'";
	$resultado = $mysqli->query($sql);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';


	echo "<script language='javascript'>";
echo  "
         location.href = 'clasificacionActivo.blade.php?v=2';
         ";
echo "</script>";


}

//editar Categoria

if (!empty($_POST['nombCat2']) && !empty($_POST['codCat2']) && !empty($_POST['valr2'])){

$ide = $_POST['idCat'];
	$nombe = $_POST['nombCat2'];
	$cod = $_POST['codCat2'];
	$val = $_POST['valr2'];

$sql = " UPDATE categoria set nombre='$nombe',cod='$cod',val='$val' WHERE idCat='$ide'";
	$resultado = $mysqli->query($sql);

	echo "<script language='javascript'>";
echo  "
         location.href = 'Categoria.blade.php?v=2';
         ";
echo "</script>";


}

//editar subCategoria

if (!empty($_POST['nombsub2']) && !empty($_POST['nomsubcatego']) && !empty($_POST['codsub2'])){
$aux=$_POST['idsu'];
$ide = $_POST['nomsubcatego'];
	$nombe = $_POST['nombsub2'];
	$cod = $_POST['codsub2'];
	

$sql = " UPDATE subcategoria set nombre='$nombe',idcat='$ide',codigo='$cod' WHERE idSub='$aux'";
	$resultado = $mysqli->query($sql);



	echo "<script language='javascript'>";
echo  "
         location.href = 'subcategoria.blade.php?v=2';
         ";
echo "</script>";




}

//editar institucion


if (!empty($_POST['nombI']) && !empty($_POST['nombCo']) ){
$aux=1;
$nombI = $_POST['nombI'];
	$nomCo = $_POST['nombCo'];
	
	

$sql = " UPDATE institucion set codigo='$nomCo',Nombre='$nombI' WHERE idIn='$aux'";
	$resultado = $mysqli->query($sql);

	echo "<script language='javascript'>";
echo  "
         location.href = 'IngresaInstitucion.blade.php?v=2';
         ";
echo "</script>";


}

//editar Departamento
if (!empty($_POST['nombDe2']) && !empty($_POST['cod2']) )  {
 
 $nomb=$_POST['nombDe2'];
   $cod=$_POST['cod2'];
   $aux=1;
   $id=$_POST['idDe'];
   
	

$sql = " UPDATE departamento set nombre='$nomb',codigo='$cod' WHERE idDep='$aux'";
	$resultado = $mysqli->query($sql);

echo "<script language='javascript'>";
echo  "
         location.href = 'Departamento.blade.php?v=2';
         ";
echo "</script>";



}

//edita usuario
if (!empty($_POST['nomb']) && !empty($_POST['dir']) && !empty($_POST['dui']) && !empty($_POST['usu']) && !empty($_POST['tel']) && !empty($_POST['tipo'])  && !empty($_POST['contra']) && !empty($_POST['hid']))  {
$est7=1;

$us=$_POST['usu'];
$ps=$_POST['contra'];
$nomb1=$_POST['nomb'];
$dire=$_POST['dir'];
$tele=$_POST['tel'];
$niv=$_POST['tipo'];
$duii=$_POST['dui'];
$idee=$_POST['hid'];

$sql = " UPDATE usuarios set user='$us',pass='$ps',nombre='$nomb1',direccion='$dire',telefono='$tele',nivel='$niv',dui='$duii',estado='$est7' WHERE idusu='$idee'";
	$resultado = $mysqli->query($sql);


 
echo "<script language='javascript'>";
echo  "
         location.href = 'UsuarioMostrar.blade.php?v=2';
         ";
echo "</script>";

}
else{
print '<script language="JavaScript">'; 
print 'alert("Datos incorrectos");'; 
print '</script>'; }

?>