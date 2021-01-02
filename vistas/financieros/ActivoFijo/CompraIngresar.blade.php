<?php

$con=mysqli_connect('localhost','root','','finanzas');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ingreso de Compra</title>

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
 
 function total(){

var cant= $("#cant").val();
var val= $("#prec").val();
$('#tot').val((cant*val));
 }
function envia(){
   window.location="http://localhost:8081/cucoaf/vistas/ActivoFijo/Comprar.blade.php";
  }
</script>

<header class="main-header">
    <?php include("header.php"); ?> 
  </header>

  <?php include("menu.php"); ?> 
</head>

<body class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">

    <div class="container">
    <div class="col-md-12">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 page-header">
    <h3 align="center" >Ingresar datos de compra</h3>
    </div>
    </div>
    </div>
    </div>  


<?php 
//Para obtener numero de registro 

   $sentencia = "SELECT * FROM activo  order by idAc desc"; 
   $ejecutar=mysqli_query($con,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);

   

 ?>

	<div class="row">
<h3 align="center" ><?php echo "Nombre de activo:____".$fila['descrip'] ?></h3>
<h3 align="center" ><?php echo "Codigo:_____".$fila['codAct'] ?></h3>
 <div class="col-md-2"></div>


  <div class="col-md-9 col-md-offset-3">
  
            
 <form  action="insert.php" method="post" class="form-register" > 
      
   
 <div class="col-lg-12"">
 

<div class="col-md-6">
<input type="hidden" class="form-control" id="idac" placeholder="Nombre" name="idac"  value="<?php  echo $fila['idAc']; ?>">
<div class="form-group">

  <label for="serie" >Marca:</label>
   <select class="form-control" data-live-search="true" id="marca" name="marca"  >
 
<option> </option>
                     <?php

  $extraer="SELECT * FROM marca";
 $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($con,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
  
    ?>  
                <option id="ide" value="<?php  echo $ejecuta['idMarca'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>
                       
    <?php
    
}

?>                   
     
</select> 
  
</div>

<br>
<div class="form-group">

  <label for="serie" >Serie/Placa:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="serie" placeholder="serie" name="serie" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<br>
<input type="hidden"  class="form-control" id="ubica" name="ubica" placeholder="Nombre" value="<?php echo $fila['idUb'];?>">

<div class="form-group">
  <label for="fecha">Fecha de inicio de uso:</label>
  <div class="input-group">
  <input type="date" class="form-control" id="fecha" name="fecha" >
  <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
  </div>
</div>
 
 <br>

<div class="form-group">
      <label for="dona">Donacion: </label>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <div class="input-group">
     <input type="checkbox" name="dona" id="dona"  value="1">
        </div>
        
      
</div>
</div>






<div class="col-md-6">
<div class="form-group">
 <label for="prov" >Proveedor:</label>
<br>

 <select class="form-control" data-live-search="true" id="prov" name="prov"  >
 

<option> </option>
                     <?php

  $extraer="SELECT * FROM proveedor";

  



 $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($con,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
  

    ?>  
 
                 <option id="ide" value="<?php  echo $ejecuta['ide'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>
   
                      
                      
    <?php
    
}



?>                   
     
</select> 



</div>
<br>
<div class="form-group">

  <label for="prec">Precio: </label>
  <div class="input-group">
  <input type="number" class="form-control" id="prec" placeholder="" name="prec" min="0" onchange="total()" >
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>
<br>
<div class="form-group">

  <label for="condi">Condicion: </label>
 <select class="form-control" data-live-search="true" id="condi" name="condi" onchange="condic(this.value)">
 <option></option>
<option value="Nuevo">Nuevo </option>
 
<option value="Usado">Usado </option>
</select>
</div>
<br>

<div class="form-group" id="hi" style="display:none;">

  <label for="cant" >Vida util: </label>
  <div class="input-group">
  <input type="number" class="form-control" id="vi" placeholder="Ej: 5" name="vi" min="0">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>

<br>


<br>


</div>


<input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">

  <div class="col-lg-12 col-md-offset-5">
<br>
<br> 
<div class="button-group">
<button type="submit" class="btn btn-success">Guardar</button>
<button type="button" class="btn btn-success" data-dismiss="modal" onclick="envia()">Cancelar</button>
</div>
</div>


</form>

 </div>


 
<div class="col-md-1"></div>

	
</div>
<script type="text/javascript">
//funcion para mostrar el de vida util si esta usado
  function condic(valor){
    if (valor=="Usado") {
    document.getElementById('hi').style.display='block';
    } else {
    document.getElementById('hi').style.display='none';  
    }
  }
</script>
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