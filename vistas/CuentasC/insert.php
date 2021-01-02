<?php 

require 'conexion.php';

$con=mysqli_connect('localhost','root','','finanzas');
if (!$con) {
  echo "Erick no se esta conectando gommennasai";

}else {echo "Erick se esta conectando desu"; }

 $base=mysqli_select_db($con,'finanzas');
if (!$base) {
  echo "Erick no se encontro la base gommennasai";
}
//inserta Cliente

if (!empty($_POST['nomb']) && !empty($_POST['dui']) && !empty($_POST['tel']) && !empty($_POST['Ocup']) && !empty($_POST['dir']) && !empty($_POST['nit']) && !empty($_POST['depa']) && !empty($_POST['fecha']))  {

$est=1;
$insertar="INSERT INTO cliente (nombre, apellido,dui,nit,repre,tel, ocupacion, depa,fecha,direc,estado,tipo) VALUES ('$_POST[nomb]','$_POST[ape]','$_POST[dui]','$_POST[nit]','$_POST[repre]','$_POST[tel]','$_POST[Ocup]','$_POST[depa]','$_POST[fecha]','$_POST[dir]','$est','$est')";
$ejecutar=mysqli_query($con,$insertar);

header('Location: http://localhost:8081/cucoaf/vistas/CuentasC/RegistroCliente.blade.php');

}
else{
print '<script language="JavaScript">'; 
print 'alert("Datos incorrectos");'; 
print '</script>'; }

//inserta Credito
if (!empty($_POST['nombcre']) && !empty($_POST['minip']) && !empty($_POST['inter']) && !empty($_POST['pmax']) && !empty($_POST['maxp']))  {
 $val=1;
$insertar="INSERT INTO creditos (tipo,plazom,cmax,cmin,garantia,interes) VALUES ('$_POST[nombcre]','$_POST[pmax]','$_POST[maxp]','$_POST[minip]','$_POST[gara]','$_POST[inter]')";
$ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/CuentasC/creditos.blade.php');
}else{
print '<script language="JavaScript">'; 
print 'alert("Datos incorrectos");'; 
print '</script>'; }


//inserta Prestamo
if (!empty($_POST['tipo']) && !empty($_POST['plazo']) && !empty($_POST['monto']) && !empty($_POST['fecha']) && !empty($_POST['cuota']))  {
  $ideC= $_POST['ideC'];
  $saldo= $_POST['saldo'];
  $esta= "Pendiente";
  $mon=$_POST['monto'];
  $pla=$_POST['plazo'];
  $cuota=$_POST['cuota'];
  $insertar="INSERT INTO prestamo (monto,plazo,fechafinan,cuota,saldo,estado,idCli,idCre) VALUES ('$mon','$pla','$_POST[fecha]','$cuota','$saldo','$esta','$ideC','$_POST[tipo]')";
  $ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/CuentasC/RegistroCliente.blade.php');
}else{
print '<script language="JavaScript">'; 
print 'alert("Datos incorrectos");'; 
print '</script>';
 }

 //inserta pago de cuota

 if (!empty($_POST['monto']) && !empty($_POST['fechap']) && !empty($_POST['total']) && !empty($_POST['mora']) && !empty($_POST['atraso']))  {
  $saldo= $_POST['saldo'];
  $tipo= $_POST['tipo'];
  $numero=$_POST['numero'];
  $fechapa=$_POST['fechap'];
  $atraso=$_POST['atraso'];
  $mora=$_POST['mora'];
  $total=$_POST['total'];
  $idPre= $_POST['pres'];
  $cuota=$_POST['cuota'];

  $insertar="INSERT INTO pagos (saldo,tipo,numero,fechapa,atraso,mora,total,idPre,cuota) VALUES ('$saldo','$tipo','$numero','$fechapa','$atraso','$mora','$total','idPre','$cuota')";
  $ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/CuentasC/RegistroCliente.blade.php');
}else{
print '<script language="JavaScript">'; 
print 'alert("Datos incorrectos");'; 
print '</script>';
 }
//HASTA AQUI
?>
