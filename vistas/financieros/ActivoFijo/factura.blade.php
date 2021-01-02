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

<br>
<br>
<br>
	<?php
$cont1=0;
$vent=0;
$tot=0;
$extraer="SELECT * FROM venta order by idVenta desc";

 $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($con,$extraer);
$fila = mysqli_fetch_assoc($ejecutar);

$aux=$fila['idActi'];
$sentencia1= "SELECT * FROM activo WHERE idAc='$aux'";
$ejecutar1=mysqli_query($con,$sentencia1);
$fila1 = mysqli_fetch_assoc($ejecutar1);

$des=$fila1['descrip'];
$pre=$fila['precVenta'];
  $cont1=$cont1+1;
    ?>  
    <div class="row">

 <div class="col-md-2"></div>
	<div class="col-md-10 col-md-offset-2">
	 <table align="center" border=2  style=" align-content: center;  width: 75%;
	height: 10px; border-color: =black">
	<thead>
		<tr style=" color: black; background: #00a65a ">
			<td style="border-color: black">CANT.</td>
			<td style="border-color: black">DESCRIPCIÓN</td>
			<td style="border-color: black">PRECIO UNITARIO</td>
			<td style="border-color: black">VENTAS SUJETAS</td>
			<td style="border-color: black">VENTAS EXENTAS</td>
			<td style="border-color: black">VENTAS EFECTAS</td>
		</tr>
	</thead >
<?php $desc=0;  ?>
	<tr style="width: 25%; 
	

	height: 10px;">
	   <td style="width: 25% height: 1px;border-color: black"  ><?php echo 1;?></td>
		<td style="border-color: black" WIDTH="150" HEIGHT="0px"  ><?php echo $des;?></td>
		<td style="border-color: black" WIDTH="20" HEIGHT="0px" ><?php echo $pre;?></td>
		<td style="border-color: black" ></td>
		<td style="border-color: black"></td>
		
	    <td WIDTH="20" HEIGHT="0px" width=100 style="border-color: black" ><?php echo $pre;?></td>
	    

	</tr>
	<tr>
	<td style="border-color: black"></td>
	<td style="border-color: black"></td>
	<td style="border-color: black"></td>
	<td style="border-color: black"></td>
	<td style="border-color: black">TOTAL</td>
	<td style="border-color: black"><?php echo $pre;?></td>
	</tr>
</table>

	
 </div> 
 </div>
<br>

 </div>                                              
</body>