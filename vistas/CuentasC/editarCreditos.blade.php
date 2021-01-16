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
  
  
$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Creditos</title>

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
   window.location="http://localhost/cucoaf/vistas/CuentasC/creditos.blade.php";
  }


</script>
 <header class="main-header">
    <?php include("../ActivoFijo/header.php"); ?> 
  </header>

  <?php include("../ActivoFijo/menu.php"); ?> 

</head>
<body class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">

    <div class="container">
    <div class="col-md-12">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 page-header">
    <h2 class="col-lg-offset-5" ><strong>ADMINISTRAR CREDITOS</strong></h2>
    </div>
    </div>
    </div>
    </div>  

	<div class="row">

 <div class="col-md-2"></div>


  <div class="col-md-9 col-md-offset-3">
  
<?php 
   $aux=$_POST['btnEditar'];
   $sentencia = "SELECT * FROM creditos WHERE idCre=$aux"; 
   $ejecutar=mysqli_query($con,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);

   $garanti=$fila['garantia'];
    ?>                                  


 <form  action="editar.php" method="post" class="form-register" > 
       

<div class="col-md-8 col-md-offset-1">

<div class="col-md-6 ">
<div class="form-group">

  <label for="nombcre" >Nombre de Credito:</label>
  <div class="input-group">
  <input type="text" class="form-control" readonly="true" id="nombcre" name="nombcre" placeholder="Nombre" value="<?php echo $fila['tipo'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<div class="form-group">

  <label for="minip" >Mínimo a Prestar:</label>
  <div class="input-group">
  <input type="number" class="form-control" id="minip" name="minip" placeholder="100" value="<?php echo $fila['cmin'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<div class="form-group">
  <label for="inter">Interes Anual(%):</label>
  <div class="input-group">
  <input type="number" class="form-control" id="inter" name="inter" value="<?php echo $fila['interes'];?>">
  <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
  </div>
</div>
</div>
<div class="col-md-6">

<div class="form-group">

  <label for="pmax" >Plazo Máximo:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="pmax" name="pmax" value="<?php echo $fila['plazom'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<div class="form-group">
  <label for="maxp">Máximo a Prestar:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="maxp" name="maxp" value="<?php echo $fila['cmax'];?>">
  <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
  </div>
</div>

<div class="form-group ">
  <label for="gara">Tipo de Garantía:</label>
  <br>
  <select class="form-control" data-live-search="true" name="gara" id="gara" value="<?php echo $fila['garantia'];?>">
   <option ></option>
    <option value="Aval">Aval</option>
    <option value="Hipotecaria">Hipotecaria</option>
  </select>  

</div>
</div>

</div>
<input  type="hidden" class="form-control" id="idCre" name="idCre" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

  <div class="col-lg-12 col-md-offset-4">
<br>
<br> 
<div class="button-group">
<button type="submit" class="btn btn-primary" style="background-color: #2D943E">Guardar</button>
<button type="button" style="background-color: #A42727" class="btn btn-primary" data-dismiss="modal" onclick="envia()">Cancelar</button>
</div>
</div>

</div>
</form>

 </div>


 
<div class="col-md-1"></div>

<script>
  window.onload=function(){
    var de=<?php echo json_encode($garanti); ?>;
    document.getElementById('gara').value=de;
  }
</script>
 
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