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
    <?php include("header.php"); ?> 
  </header>

  <?php include("menu.php"); ?> 

<div class="row">

 <div class="col-md-2"></div>


  <div class="col-md-10 col-md-offset-2">


<table style="width:100%">
	<thead>
		<tr>
			<td style="width:10%"></td>
			
			<td rowspan="2" style="width:15%"><img src="../imagen/reportes2.png" style="width:80px" height="75px"/></td>
			<td style="width:50%; text-align:center; vertical-align:middle"> <br></td>		
			<td style="width:10%"></td>
			
		</tr>

		<tr>
			<td></td>
			<td style="font-size: 80%; text-align:center; vertical-align:middle">REPORTE DE ACTIVOS</td>
			<td></td>			
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
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>CODIGO</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:20%"><strong>DESCRIPCION</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>SERIE</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>MARCA</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>UBICACION</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>FECHA DE ADQUISICION</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>PRECIO</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"><strong>DONACION</strong></td>
			<td style="text-align:center; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:25%"><strong>VIDA UTIL</strong></td>
			<td style="width:10%"></td>
		</tr>
	</thead>	

	<?php
$cont1=0;
$extraer="SELECT * FROM activo";

 $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($con,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
  
 if (($ejecuta['estado'])==0) {
  $cont1=$cont1+1;
    ?>  

	<tr>
		<td style="width:10%"></td>
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:5%">  <?php  echo $cont1 ?></td>
		
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:5%"> <?php  echo $ejecuta['codAct'] ?></td>
		
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $ejecuta['descrip']?></td>

			
		<?php
    $aux3=$ejecuta['idAc'];
   $sentencia3 = "SELECT * FROM detalle_activo WHERE activofijo_id='$aux3'"; 
   $ejecutar3=mysqli_query($con,$sentencia3);
   $fila3 = mysqli_fetch_assoc($ejecutar3);
   
   ?>
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $fila3['serie'];?></td>

 <?php
    $aux4=$fila3['marca_id'];
   $sentencia5 = "SELECT * FROM marca WHERE idMarca='$aux4'"; 
   $ejecutar5=mysqli_query($con,$sentencia5);
   $fila5 = mysqli_fetch_assoc($ejecutar5);
   
   ?>
    
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $fila5['nombre'];?></td>

			 <?php
    $aux4=$fila3['ubi_id'];
   $sentencia4 = "SELECT * FROM ubicacion WHERE idUb='$aux4'"; 
   $ejecutar4=mysqli_query($con,$sentencia4);
   $fila4 = mysqli_fetch_assoc($ejecutar4);
   
   ?>
    
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $fila4['nombre'];?></td>
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $fila3['fecha_adqui'];?></td>	
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $fila3['valor_historico'];?></td>
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $fila3['donado'];?></td>	
		<td style="text-align:left; vertical-align:middle; border: 1px solid black; color:black; font-size: 70%; width:10%"> <?php echo $fila3['vidautil_restante'];?></td>
		<td style="width:10%"></td>	
	</tr>
<?php
}
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