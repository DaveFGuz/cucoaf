<body class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">
<?php
require 'conexion.php';
$con=mysqli_connect('localhost','root','','finanzas');
ini_set('date.timezone', 'America/El_Salvador');


	?>
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

<header class="main-header">
    <?php include("../ActivoFijo/header.php"); ?> 
  </header>

  <?php include("../ActivoFijo/menu.php"); ?> 

<div class="row">

 <div class="col-md-2"></div>


  <div class="col-md-10 col-md-offset-2">

<table style="width:100%">
	<thead>




		<tr>
			<td style="width:10%"></td>
			
			<td rowspan="2" style="width:15%"></td>
			<td style="width:50%; text-align:center; vertical-align:middle"> <br></td>		
			<td style="width:10%"></td>
			
		</tr>

		<tr>
			<td></td>
			<td style="font-size: 80%; text-align:center; vertical-align:middle">REPORTE DE CLIENTES CARTERA MOROSA</td>
			<div style="text-align: right;"><a  class="btn btn-primary" href="http://localhost/cucoaf/vistas/CuentasC/ImpresionCarteraMorosa.php" target="_blank"">Imprimir</a>
      </div>		
		</tr>		
	</thead>
</table>
<br>
<?php
		
	?>

<table style="width:100%" class="table">
	<thead>
		<tr>
			<td style="width:5%"></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:3%">No.</td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:4%"><strong>CODIGO</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:20%"><strong>NOMBRE</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:8%"><strong>DUI</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:8%"><strong>ESTADO</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:8%"><strong>PLAZO</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:8%"><strong>MONTO</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:8%"><strong>CUOTA</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>FECHA FINANCIAMIENTO</strong></td>
      <td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:4%"><strong>INTERES</strong></td>
      <td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>TIPO</strong></td>
			<td style="width:10%"></td>
		</tr>
	</thead>	

	<?php
$cont = 0;
$result=$mysqli->query("SELECT cl.idCliente,cl.nombre,cl.apellido,cl.dui,pt.estado,pt.plazo,pt.monto,pt.cuota,pt.saldo,pt.fechafinan,cd.garantia,cd.interes,cd.tipo
FROM cliente as cl
INNER JOIN prestamo as pt ON pt.idCli = cl.idCliente
INNER JOIN creditos as cd ON cd.idCre = pt.idCre
WHERE cl.tipo = 2");

while($file = $result->fetch_object())
{
  
  $cont=$cont+1;
    ?>  

	<tr>
		<td style="width:10%"></td>
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:3%"> <?php echo $cont;?></td>
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:4%"> <?php echo $file->idCliente;?></td>	
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:20%"> <?php echo $file->nombre.' '.$file->apellido;?></td>
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:8%"> <?php echo $file->dui;?></td>	
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:8%"> <?php echo $file->estado;?></td>
    <td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:8%"> <?php echo $file->plazo.'  meses';?></td>
    <td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:8%"> <?php echo '$ '.$file->monto;?></td> 
    <td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:8%"> <?php echo '$ '.$file->cuota;?></td>
    <td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $file->fechafinan;?></td> 
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:4%"> <?php echo $file->interes.' %';?></td>
    <td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $file->tipo;?></td>
    <td style="width:10%"></td>	
	</tr>
<?php
}
?> 
	
</table>
<br>

<table style="width:100%">
	<thead>
			<tr>
			<td style="width:10%"></td>		
			<td style="font-size: 70%; text-align:center; vertical-align:middle; width:50%">Fecha de impresión: <?php echo date('d/m/Y'); ?> </td>
			<td style="font-size: 70%; text-align:center; vertical-align:middle; width:50%">Hora de impresión: <?php echo date('g:i a'); ?> </td>						
			<td style="width:10%"></td>		
		</tr>		
	</thead>
</table>


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
</div>
</div>
</body>