<?php 
if(!isset($_SESSION)) 
    { 
session_start();
}

if (empty($_SESSION['usuario'])) {

      echo "<script language='javascript'>";
echo  "
         location.href = '../login.php';
         ";
echo "</script>";

}
  
  
require 'conexion.php';

$con=mysqli_connect('localhost','root','','finanzas');
if (!$con) {
  echo "Erick no se esta conectando gommennasai";

}else {echo "Erick se esta conectando desu"; }

 $base=mysqli_select_db($con,'finanzas');
if (!$base) {
  echo "Erick no se encontro la base gommennasai";
}

 //inserta pago de cuota

 if (!empty($_POST['monto']) && !empty($_POST['total']))  {
  $saldo= $_POST['saldo'];
  $tipo= $_POST['tipo'];
  $numero=$_POST['numero'];
  $fechapa=$_POST['fe'];
  $atraso=$_POST['atraso'];
  $mora=$_POST['mora'];
  $total=$_POST['total'];
  $idPre= $_POST['pres'];
  $cuota=$_POST['cuota'];

  $insertar="INSERT INTO pagos (saldo,tipo,numero,fechapago,atraso,mora,total,idPres,cuota) VALUES ('$saldo','$tipo','$numero','$_POST[fe]','$atraso','$mora','$total','$idPre','$cuota')";
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