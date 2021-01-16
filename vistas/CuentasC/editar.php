<?php 
require 'conexion.php';

//editar Credito
if (!empty($_POST['nombcre']) && !empty($_POST['minip']) && !empty($_POST['inter']) && !empty($_POST['pmax']) && !empty($_POST['maxp']) && !empty($_POST['gara'])){

$ide = $_POST['idCre'];
	$nombe = $_POST['nombcre'];
	$mini = $_POST['minip'];
	$inte = $_POST['inter'];
	$plazo = $_POST['pmax'];
	$maxp = $_POST['maxp'];
	$ga = $_POST['gara'];

$sql = " UPDATE creditos set tipo='$nombe',plazom='$plazo',cmax='$maxp',cmin='$mini',garantia='$ga',interes='$inte' WHERE idCre='$ide'";
	$resultado = $mysqli->query($sql);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost/cucoaf/vistas/CuentasC/creditos.blade.php');

}

//editar Cliente
if (!empty($_POST['nomb']) && !empty($_POST['dui']) && !empty($_POST['tel']) && !empty($_POST['Ocup']) && !empty($_POST['dir'])  && !empty($_POST['nit']) && !empty($_POST['depa']) && !empty($_POST['fecha']))  {

$ideC= $_POST['ideC'];
$nombre=$_POST['nomb'];
$ape=$_POST['ape'];
$nit=$_POST['nit'];
$dui=$_POST['dui'];
$tel=$_POST['tel'];
$dep=$_POST['depa'];
$oc=$_POST['Ocup'];
$oc=$_POST['repre'];
$direc=$_POST['dir'];
$sql ="UPDATE cliente set nombre='$nombre',apellido='$ape',dui='$dui',nit='$nit',repre='$repre',tel='$tel',ocupacion='$oc',depa='$dep',direc='$direc' WHERE idCliente='$ideC'";
$resultado = $mysqli->query($sql);

header('Location: http://localhost/cucoaf/vistas/CuentasC/RegistroCliente.blade.php');

}

else{
print '<script language="JavaScript">'; 
print 'alert("Datos incorrectos");'; 
print '</script>'; }

?>