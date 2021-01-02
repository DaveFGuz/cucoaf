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


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Detalles</title>

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

<!-- Sweet Alert Css -->
       <link href="../dist/js/sweetalert/sweetalert2.css" rel="stylesheet" />
   <!-- apariencia de sistema -->
<link rel="stylesheet" type="text/css" href="../dist/css/diseño2.css">


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script language="javascript">



function envia(){
   window.location="http://localhost:8081/cucoaf/vistas/CuentasC/verPrestamosCliente.blade.php";
  }


 //funcion para que la tabla se llene dinamicamente
  
   
</script>
<header class="main-header">
    <?php include('../ActivoFijo/header.php'); ?> 
  </header>

  <?php include('../ActivoFijo/menu.php'); ?> 
</head>

<body class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">

    <input type="hidden" class="form-control" id="btnalta1" placeholder="Nombre" name="btnalta1" >
    <div class="container">
    <div class="col-md-12">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 page-header">
    <h3 align="center" >Detalles de prestamo</h3>
    </div>
    </div>
    </div>
    </div>  

  <div class="row">

 <div class="col-md-2"></div>


  <div class="col-md-7 col-md-offset-1">


                                 
 <div class="col-sm-12 col-md-12">


  <div class="panel-body">

 
<div class="row thumbnail">


<table class="table table-list-search table-bordered table-hover">
<thead>

                   <tr class="color-apariencia">


    <th scope="col" style="color:#FFFFFF" WIDTH="100" HEIGHT='9' >Valor</th>
    <th scope="col" style="color:#FFFFFF" WIDTH="300" HEIGHT='9'>Descripcion</th>
    
  </tr>
  </thead>
  <tbody  class="contenidobusqueda">


    <?php
    //Muestra datos del prestamo 
    $aux2=$_GET['btndetalle'];
   $sentencia2 = "SELECT * FROM prestamo WHERE idPres='$aux2'"; 
   $ejecutar2=mysqli_query($con,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
  //muestra detalles del cliete
    $aux3=$fila1['idCli'];
   $sentencia3 = "SELECT * FROM cliente WHERE idCliente=$aux3"; 
   $ejecutar3=mysqli_query($con,$sentencia3);
   $fila3 = mysqli_fetch_assoc($ejecutar3);

   //Muestra datos de credito
    $aux4=$fila1['idCre'];
   $sentencia4 = "SELECT * FROM creditos WHERE idCre=$aux4"; 
   $ejecutar4=mysqli_query($con,$sentencia4);
   $fila4 = mysqli_fetch_assoc($ejecutar4);
   ?>
<tr>
   
    <td>Nombre:</td>
    <td><?php echo $fila3['nombre'];?></td>
  </tr>
  <tr>

    <td> Apellidos :</td>
    <td><?php echo $fila3['apellido'];?></td>
  </tr>
  <tr>
    <td>NIT :</td>
    <td><?php echo $fila3['nit'];?></td>
  </tr> 
  <tr>

        <td>Tipo de prestamo:</td>
    <td><?php echo $fila4['tipo'];?></td>
  </tr>
 <tr>
  <tr>

        <td>Interés:</td>
    <td><?php echo $fila4['interes']."%"?></td>
  </tr>

        <td> Plazo:</td>
    <td><?php echo $fila1['plazo']." Meses";?></td>
  </tr>
   
   <tr>
   <td>Monto($):</td>
    <td><?php echo $fila1['monto'];?></td>
   </tr>

    <tr>
   <td> Cuota($):</td>
    <td><?php echo $fila1['cuota'];?></td>
   </tr>

    <tr>
   <td> Saldo($):</td>
    <td><?php echo $fila1['saldo'];?></td>
   </tr>
  
    <tr>
   <td>Fecha de financiamiento:</td>
    <td><?php echo $fila1['fechafinan'];?></td>
   </tr>

   
   <tr>
    <td>Estado:</td>
    <td><?php echo $fila1['estado'];?></td>
  </tr>

  
  </tbody>
                </table>
                
</div>

 
       

</div>


</div>
</div>
<div class="col-lg-12 col-md-offset-6">
<br>
<br> 
<div class="button-group">
<form  action="verPrestamosCliente.blade.php" method="get" class="form-register" > 
<button type="submit"  class="btn btn-primary" style=" margin-left: 1px; margin-top:-53px;" data-dismiss="modal" id="btnPre" name="btnPre" value=<?php echo $fila1['idCli'] ?>>Atras</button>
</form>
</div>
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