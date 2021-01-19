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
ini_set('date.timezone', 'America/El_Salvador');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Movimientos</title>

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="estilos.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

 

<!-- Optional theme -->

<link rel="stylesheet" type="text/css" href="estilos.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="../dist/css/datatables.bootstrap.min.css"/>
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!--Alertas -->
  <script src="../dist/js/sweetalert-dev.js"></script>
  <link rel="stylesheet" type="text/css" href="../dist/css/sweetalert.css"/>


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script language="javascript">
 
 
function envia(){
   window.location="http://localhost/cucoaf/vistas/ActivoFijo/Vender.blade.php";
  }
</script>
<header class="main-header">
    <?php include("header.php"); ?> 
  </header>

  <?php include("menu.php"); ?> 


</head>
<<body class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">

    <div class="container">
    <div class="col-md-12">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 page-header">
    <h2 class="col-lg-offset-6" ><strong>DETALLE DE VENTA</strong></h2>
    </div>
    </div>
    </div>
    </div> 

     

	<div class="row">
<?php 
   $aux=$_POST['btnenvia'];
   $sentencia = "SELECT * FROM activo WHERE idAc=$aux"; 
   $ejecutar=mysqli_query($con,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);
    ?>   
 <div class="col-md-2"></div>


  <div class="col-md-9 col-md-offset-3">
  



 <form  action="insert.php" method="post" class="form-register" > 

<input type="hidden" class="form-control" id="idAc" placeholder="Nombre" name="idAc"  value="<?php echo $_POST['btnenvia'];?>">                            

 
       <div class="input-group">
   
 <div class="col-lg-12 ">
 

<div class="col-md-4">
<br>
<br>
<br>
<br>
<br>
<div class="input-group">



<div class="form-group">

  <label for="condiM">Razón de Venta:</label>
 <select class="form-control" data-live-search="true" id="condiM" name="condiM" onchange="razon(this.value)">

<?php
$extraer="SELECT * FROM movimiento";

 $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($con,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{ if (($ejecuta['estado'])==1) {
  ?>

<option value="<?php echo $ejecuta['idMov']?>" ><?php echo $ejecuta['nombre']?></option>
<?php
}
}
?>
</select>
</div>

 </div>
<br>
<?php
    $aux3=$_POST['btnenvia'];;
   $sentencia3 = "SELECT * FROM detalle_activo WHERE activofijo_id='$aux3'"; 
   $ejecutar3=mysqli_query($con,$sentencia3);
   $fila3 = mysqli_fetch_assoc($ejecutar3);

   $senten2 = "SELECT idCat FROM activo WHERE idAc='$aux3'"; 
   $ejecu2=mysqli_query($con,$senten2);
   $fil2 = mysqli_fetch_assoc($ejecu2);
   $senten1 = "SELECT * FROM categoria WHERE idCat='$fil2[idCat]'"; 
   $ejecu1=mysqli_query($con,$senten1);
   $fil1 = mysqli_fetch_assoc($ejecu1);

   ini_set('date.timezone', 'America/El_Salvador');


  //$Hoy=date("Y/m/d");
   $fecha1=date_create($fila3['fecha_inicio']);
   $fecha2=date_create(date("Y-m-d"));
   $interval = date_diff($fecha1, $fecha2);
   $dias=$interval->days;
   $vidau=$fila3['vidautil_restante'];
   $valor=$fila3['valor_historico'];
   $res=$fil1['val'];
   $residual=$valor*($res/100);
   $dep=$valor-$residual;
   ?>
<script type="text/javascript">
var dias=<?php echo json_encode($dias); ?>;
var vida=<?php echo json_encode($vidau); ?>;
var valor1=<?php echo json_encode($dep); ?>;
var ciclo=0;
var aux=0;
 var v1=0;

    window.onload=function(){
      ciclo=365*vida;
      var cuota=valor1/ciclo;
      for ($i = 1; $i <=10;  $i++){
        aux=aux+cuota;
        valor1=valor1-cuota;
         v1 = Math.abs(valor1);
      }
        document.getElementById('dir2').value=v1.toFixed(2);
       // document.getElementById('prec').min=v1.toFixed(2);
    
    }

    function razon(id){
      if(id==1){
       // document.getElementById('prec').min=v1.toFixed(2);
      }else{
       // document.getElementById('prec').min=0;
      }
    }
</script> 

 
<br>



</div>






<div class="col-md-4">
<br>
<br>
<br>
<br>
<br>
<div class="input-group">
  <label for="dir">Valor en libros del activo: </label>
  <div class="input-group">
  <input type="text" class="form-control" id="dir2" name="dir2" readonly="readonly">
  <div class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></div>
  </div>
</div>
 



<br>

<div class="input-group" style="width:220px;">

  <label for="prec" >Precio de venta:</label>
  <div class="input-group">
  <input type="number" class="form-control" id="prec" required="true"  placeholder="" name="prec" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-usd" aria-hidden="true"></span></div>
</div>
</div>

<br>



</div>

<div class="col-md-4">


<div class="input-group">

  <label for="nfac"><h4>FACTURA No.</h4> </label>
  <div class="input-group">
  <h4><input type="text" size="15" class="form-control" id="nfac" placeholder="" name="nfac" value="<?php echo "0000".$_POST['btnenvia'];?>" readonly="readonly"></h4>
  
  </div>
</div>


<br>

<div class="input-group">

  <label for="fech">Fecha de Transaccion: </label>
  <div class="input-group">
  <input type="text" class="form-control" id="fech" placeholder="" name="fech" readonly="readonly" value="<?php echo date("Y/m/d");?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>







</div>


<input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

  <div class="col-lg-12 col-md-offset-4">
<br>
<br> 
<div class="button-group">
<button type="submit" class="btn btn-primary " style="background-color: #2D943E">Guardar</button>
<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="envia()" style="background-color: #A42727">Cancelar</button>
</div>
</div>

</div>
</form>

 </div>


 
<div class="col-md-1"></div>

</div>

   <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js">
   
  </script>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../dist/js/jquery.datatables.min.js"></script>
<script src="../dist/js/datatables.bootstrap.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script src="../plugins/jquery.validate.js"></script>

<script src="../dist/js/pages/privilegios.js"></script>

</div>

</body>
</html>