<?php

if(!isset($_SESSION)) 
    { 
session_start();
}
error_reporting(0);
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
  <title>Ingresar Activo</title>

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
   window.location="http://localhost:8081/cucoaf/vistas/ActivoFijo/Comprar.blade.php";


  }
function limpia(){
   window.location="http://localhost:8081/cucoaf/vistas/ActivoFijo/compraNueva2.blade.php";


  }
  

function enviacod(){
  var v2= $("#codigo").val();
$('#codi').val(v2);
}

  function recibe()
  {
    
//var oculto= $("#codCatego2").val();

  var dep= $("#dep1").val();
  var ins= $("#idIns").val();
  var act= $("#idActivo").val();
  var sub= $("#sub").val();
  var ub= $("#ubica").val();
if (dep=="" || sub=="" || ub=="") {

 alert("DATOS INCOMPLETOS");
}
else{
$('#codigo').val(ins+"-"+ub+"-"+sub+"-"+"00"+act);
var v1= $("#cat ").val();
$('#idcat').val(v1);
 $('#ubica2').val(ub);
$('#codi').val(ins+"-"+ub+"-"+sub+"-"+"00"+act);
}


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
    <h2 class="col-lg-offset-6" ><strong>NUEVO ACTIVO FIJO</strong></h2>
    </div>
    </div>
    </div>
    </div>  

  <div class="row">

 <div class="col-md-2"></div>


  <div class="col-md-9 col-md-offset-3">
   
       
   
 <div class="col-lg-12 "">
 

<div class="col-md-6">
<?php 
//Para obtener numero de registro ultimo

   $sentencia = "SELECT * FROM activo  order by idAc desc"; 
   $ejecutar=mysqli_query($con,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);

   $sentencia2= "SELECT * FROM institucion "; 
   $ejecutar2=mysqli_query($con,$sentencia2);
   $fila2 = mysqli_fetch_assoc($ejecutar2);

 ?>
 <input type="hidden"  class="form-control" id="idIns" name="idIns" placeholder="Nombre" value="<?php echo $fila2['codigo'];?>">
<input  type="hidden" class="form-control" id="idActivo" name="idActivo" placeholder="Nombre" value="<?php echo $fila['idAc']+1;?>">

<div class="form-group">
 <label for="cat" >Elija una categoria:</label>
<br>
<form  action="compraNueva2.blade.php" method="post" class="form-register" > 
 <select class="form-control" data-live-search="true" id="cat" name="cat" onchange="this.form.submit()" >
 

                     <?php

 $a1=$_POST['cat'];                  
//onclick="envia(this.value); 
if (!empty($a1)) {
  $extraer="SELECT * FROM categoria WHERE idCat=$a1";
}
else{
  $extraer="SELECT * FROM categoria";
  ?>
  <option > </option>
  <?php
  
}


 $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($con,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
  if (($ejecuta['estado'])==1) {

    ?>  
 
                 <option id="ide" value="<?php  echo $ejecuta['idCat'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>
   
         
     
          
                      
    <?php
    $a2=$ejecuta['cod'];
}
}

//echo "<script>function envia(v){";



// echo " } </script>";

 //$('#nomb').val(v);


?>  

</select> 

  </form>

</div>
   


<div class="form-group">
 <label for="ubica" >Elija ubicacion:</label>
<br>

 <select class="form-control" data-live-search="true" id="ubica" name="ubica"  >
 
<option> </option>
                     <?php

  $extraer="SELECT * FROM ubicacion";
 $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($con,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
  if (($ejecuta['estado'])==1) {
    ?>  
                <option id="ide" value="<?php  echo $ejecuta['codU'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>
                       
    <?php
   } 
}

?>                   
     
</select> 

</div>


<div class="form-group">

  <label for="codigo" >Código:</label>
  <div class="input-group">
  <input type="text" readonly="readonly" class="form-control" id="codigo"  name="codigo" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true" ></span></div>
</div>
</div>

<br>
<br>



</div>


<form  action="insert.php" method="post" class="form-register" > 

<div class="col-md-6">

<input type="hidden" class="form-control" id="ubica2" placeholder="Nombre" name="ubica2" >

<input type="hidden" class="form-control" id="idcat" placeholder="Nombre" name="idcat" >
<input  type="hidden" class="form-control" id="codi" placeholder="Nombre" name="codi" >


<div class="form-group">
 <label for="sub" >Elija una subcategoria:</label>
<br>
 <select class="form-control" data-live-search="true" id="sub" name="sub" >
 <option ></option>
<?php

if (!empty($a1)) {
$extraer="SELECT * FROM subcategoria WHERE idcat='$a1'";

 $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($con,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
  if (($ejecuta['estado'])==1) {
 ?>    

            <option  id="ide2" value="<?php  echo $ejecuta['codigo'] ?>" ><?php  echo $ejecuta['nombre'] ?> </option>

 <?php
}
   }
}else{

    ?>
    
    <?php
   }
                   
   
?>                    
                  
     
</select>                 
       
           
</div>




   

<div class="form-group">

  <label for="des">Descripción:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="des" placeholder="Ej: laptop i3" name="des">
   <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></div>
  </div>
</div>



</div>


<input  type="hidden" class="form-control" id="ideU" name="ideU" placeholder="Nombre" value="<?php echo $_POST['btnEditar'];?>">


<div class="col-lg-12 col-md-offset-5">

<br> 
<div class="button-group">
<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="recibe()" style="background-color: #2D943E">Calcular Codigo de activo</button>
<button type="button" class="btn btn-success" data-dismiss="modal" onclick="limpia()" style="background-color: #90327A" >limpiar</button>
<button type="submit" class="btn btn-success" style="background-color: #05058E" >Siguiente Paso</button>
<button type="button" class="btn btn-success" style="background-color: #A42727" data-dismiss="modal" onclick="envia()">Cancelar</button>
</div>
</div>
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

<script src="../bower_components/smoke.js-master/smoke.min.js"></script>
</div>

</body>
</html>