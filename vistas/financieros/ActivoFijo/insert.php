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
//inserta proveedor
$est=1;
if (!empty($_POST['nomb']) && !empty($_POST['dir']) && !empty($_POST['nit']) && !empty($_POST['cont']) && !empty($_POST['tel']) && !empty($_POST['correo']))  {

$insertar="INSERT INTO proveedor (nombre, direccion, nit, contacto, telefono, correo, observacion,estado) VALUES ('$_POST[nomb]','$_POST[dir]','$_POST[nit]','$_POST[cont]','$_POST[tel]','$_POST[correo]','$_POST[obs]','$est')";
$ejecutar=mysqli_query($con,$insertar);

header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/RegistroProveedor.blade.php');

}


//insertar movimiento

if (!empty($_POST['nombMov']))  {
$est=1;
$insertar="INSERT INTO movimiento (nombre,estado) VALUES ('$_POST[nombMov]','$est')";
$ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/Movimiento.blade.php');

}
//insertar marca

if (!empty($_POST['nombProd'])){
$est=1;
$insertar="INSERT INTO marca (nombre,estado) VALUES ('$_POST[nombProd]','$est')";
$ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/Marcas.blade.php');

}
//inserta clasificacion activo
if (!empty($_POST['nomAct']))  {
$est=1;
$insertar="INSERT INTO clasificaactivo (nombre,vida,estado) VALUES ('$_POST[nomAct]','$_POST[vida]','$est')";
$ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/clasificacionActivo.blade.php');
}


//insertar Ubicacion

if (!empty($_POST['nombUb']) && !empty($_POST['codUb']))  {
$est=1;

$insertar="INSERT INTO ubicacion (nombre,estado,codU) VALUES ('$_POST[nombUb]','$est','$_POST[codUb]')";
$ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/ubicacion.blade.php');

}

//inserta Categoria
if (!empty($_POST['nombcat']) && !empty($_POST['cod']) )  {
 $val=1;
$insertar="INSERT INTO Categoria (nombre,cod,val,vidautil,vidaeco,estado) VALUES ('$_POST[nombcat]','$_POST[cod]','$_POST[val]','$_POST[vidU]','$_POST[vidE]','$val')";
$ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/Categoria.blade.php');
}

//inserta subCategoria
if (!empty($_POST['nombsub']) && !empty($_POST['nomcatego']) && !empty($_POST['codsub']))  {

 $val=1;
   $aux=$_POST['nomcatego'];
   
   $idc="SELECT idCat FROM Categoria WHERE cod='$aux'";
     
$ejecutar1=mysqli_query($con,$idc);
$fila = mysqli_fetch_assoc($ejecutar1);
$insertar="INSERT INTO subcategoria (nombre,idcat,codigo,estado) VALUES ('$_POST[nombsub]','$fila[idCat]','$_POST[codsub]','$val')";

$ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/subcategoria.blade.php');
}

//inserta Activo
if (!empty($_POST['codi']) && !empty($_POST['idcat']) && !empty($_POST['sub']) && !empty($_POST['des']) && !empty($_POST['ubica2']))  {
  $va2=1;
  $aux=$_POST['sub'];
   $sentencia = "SELECT * FROM subcategoria WHERE codigo='$aux'"; 
   $ejecutar=mysqli_query($con,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
     

    $aux2=$_POST['ubica2'];
   $sentencia2 = "SELECT * FROM ubicacion WHERE codU='$aux2'"; 
   $ejecutar2=mysqli_query($con,$sentencia2);
   $fila2 = mysqli_fetch_assoc($ejecutar2);
       

$insertar="INSERT INTO activo (codAct,descrip,idCat,idSub,estado,idUb) VALUES ('$_POST[codi]','$_POST[des]','$_POST[idcat]','$fila[idSub]','$va2','$fila2[idUb]')";
$ejecutar=mysqli_query($con,$insertar);



echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/CompraIngresar.blade.php');
}

//inserta Datos de compraIngresar
//DESDE AQUI HA CAMBIADO
if (!empty($_POST['prov']) && !empty($_POST['serie']) && !empty($_POST['fecha']) && !empty($_POST['prec']) && !empty($_POST['ubica']) && !empty($_POST['condi'])  && !empty($_POST['idac']) )  {

$fe=$_POST['fecha'];
$tfecha=date("Y-m-d",strtotime($fe));//fecha de inicio de uso
ini_set('date.timezone', 'America/El_Salvador');


$Hoy=date("Y/m/d");//fecha de adquisicion
$vidautil=0; 
$est=1;
 $dona="";
  $aux=$_POST['idac'];
  $aux2=$_POST['dona'];
  $aux3=$_POST['condi'];
  if ($aux2==1) {
    $dona="SI"; 
  }else{$dona="NO";}
if ($aux3=="Nuevo"){
  $sentencia2 = "SELECT idCat FROM activo WHERE idAc='$aux'"; 
   $ejecutar2=mysqli_query($con,$sentencia2);
   $fila2 = mysqli_fetch_assoc($ejecutar2);
   $sentencia1 = "SELECT vidautil FROM categoria WHERE idCat='$fila2[idCat]'"; 
   $ejecutar1=mysqli_query($con,$sentencia1);
   $fila1 = mysqli_fetch_assoc($ejecutar1);
    $vidautil=$fila1[vidautil];
  }else{
    $vidautil=$_POST['vi'];
  }

$insertar="INSERT INTO compras (idProv,fecha,condicion,precioUni,codAct,donado,estado) VALUES ('$_POST[prov]','$tfecha','$_POST[condi]','$_POST[prec]','$_POST[idac]','$dona','$est')";
$ejecutar=mysqli_query($con,$insertar);

$va=1;

$sql = " UPDATE activo set estadoBoton='$va' WHERE idAc='$aux'";
  $resultado = $mysqli->query($sql);
//insertar en tabla detalle de activo
$insertar2="INSERT INTO detalle_activo (serie,fecha_adqui,fecha_inicio,valor_historico,donado,vidautil_restante,marca_id,ubi_id,activofijo_id) VALUES ('$_POST[serie]','$tfecha','$Hoy','$_POST[prec]','$dona','$vidautil','$_POST[marca]','$_POST[ubica]','$_POST[idac]')";
$ejecutar3=mysqli_query($con,$insertar2);

echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/Comprar.blade.php');
}

echo $_POST['idAc'].$_POST['condiM'].$_POST['nfac'].$_POST['fech'].$_POST['prec'];
//inserta Venta
if (!empty($_POST['idAc']) && !empty($_POST['condiM']) && !empty($_POST['nfac']) && !empty($_POST['fech']) && !empty($_POST['prec']))  {
 $val=2;
$aux5=$_POST['idAc'];

$insertar="INSERT INTO venta (idActi,idMovi,factNum,fecha,precVenta) VALUES ('$_POST[idAc]','$_POST[condiM]','$_POST[nfac]','$_POST[fech]','$_POST[prec]')";
$ejecutar=mysqli_query($con,$insertar);


$sql = " UPDATE activo set estado='$val' WHERE idAc='$aux5'";
  $resultado = $mysqli->query($sql);

header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/factura.blade.php');
}

//inserta Reevaluacion
if (!empty($_POST['ideA']) && !empty($_POST['precN']) && !empty($_POST['precA']))  {

 $val=$_POST['ideA'];
   $aux=$_POST['precN'];
   
   $sql = " UPDATE detalle_activo set valor_historico='$aux' WHERE activofijo_id='$val'";
  $resultado = $mysqli->query($sql);
  ini_set('date.timezone', 'America/El_Salvador');

$fechaR=date("Y/m/d");//fecha de reevalaucion
$insertar="INSERT INTO reevaluar (fecha,valorAnt,idAc,valor) VALUES ('$fechaR','$_POST[precA]','$_POST[ideA]','$_POST[precN]')";

$ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/reevaluar.blade.php');
}

//inserta Departamento
/*if (!empty($_POST['nombDe']) && !empty($_POST['codDe']) )  {

 $nomb=$_POST['nombDe'];
   $cod=$_POST['codDe'];
   $aux=1;
   
$insertar="INSERT INTO departamento (nombre,codigo,estado) VALUES ('$nomb','$cod','$aux')";

$ejecutar=mysqli_query($con,$insertar);
echo ' <script type="text/javascript"> alert("Datos Guardados Correctamente"); </script>';
header('Location: http://localhost:8081/cucoaf/vistas/ActivoFijo/Departamento.blade.php');
}*/
else{
print '<script language="JavaScript">'; 
print 'alert("Datos incorrectos");'; 
print '</script>'; }
//HASTA AQUI
?>
