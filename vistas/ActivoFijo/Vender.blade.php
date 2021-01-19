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
  <title>Vender</title>

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
   window.location="http://localhost/Proyecto%20Ananlisis%20financieros/compraNueva2.blade.php";
  }


 //funcion para que la tabla se llene dinamicamente
  
    $(document).ready(function () {
   $('#entradafilter').keyup(function () {
      var rex = new RegExp($(this).val(), 'i');
        $('.contenidobusqueda tr').hide();
        $('.contenidobusqueda tr').filter(function () {
            return rex.test($(this).text());
        }).show();

        })

});

     $(document).ready(function() {
    $('#tabla1').DataTable( {"searching": false,"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10,25, 50, "Mostrar Todo"] ],
  "language": {
            "lengthMenu": "Mostrar  _MENU_  Registros",
             
        }});


} );

</script>
<header class="main-header">
    <?php include("header.php"); ?> 
  </header>

  <?php include("menu.php"); ?> 

</head>

<body class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">

    <input type="hidden" class="form-control" id="btnalta1" placeholder="Nombre" name="btnalta1" >
    <div class="container">
    <div class="col-md-12">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 page-header">
    <h2 class="col-lg-offset-6" ><strong>REALIZAR DE VENTA</strong></h2>
    </div>
    </div>
    </div>
    </div>  

  <div class="row">

 <div class="col-md-2"></div>


  <div class="col-md-10 col-md-offset-2">


                                 
 <div class="col-sm-12 col-md-12">


  <div class="panel-body">

  <form action="#" method="get" class="form-horizontal">
          

         <div class="col-md-3 col-md-offset-8" style="margin-top:10px; margin-left: 780px;"> <!--col-md-offset desplaza columnas a la derecha -->
                <div class="form-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <div class="input-group">
                    <input id="entradafilter" type="text" class="form-control">
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" style="margin-right:-20px;"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                  </div>
                    </div>
                     </div>
    </form>

<?php

$cont1=0;
?>
<div class="row thumbnail" style="width: 95%;
    margin-left:60px;">


<table class="table table-list-search table-bordered table-hover"  id="tabla1">
<thead>

<<<<<<< HEAD
                        <tr class="color-apariencia" 
>
=======
                        <tr 
style="background-color: #36a54c">
>>>>>>> 2351c426c9c4d68a1991058725a15994445408a8


    <th scope="col" style="color:#FFFFFF" WIDTH="50" HEIGHT='9' >N°</th>
    <th scope="col" style="color:#FFFFFF">Código</th>
    <th scope="col" style="color:#FFFFFF">Descripción</th>
    <th scope="col" style="color:#FFFFFF">Categoria</th>
    <th scope="col" style="color:#FFFFFF">Subcategoria</th>
    <th scope="col" style="color:#FFFFFF" WIDTH="40" HEIGHT='9'>Opciones</th>
  </tr>
  </thead>
  <tbody  class="contenidobusqueda">
  <?php
$extraer="SELECT * FROM activo";

 $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($con,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
  
 if (($ejecuta['estado'])==1) {
  $cont1=$cont1+1;
    ?>  
  <tr>
    <td><?php  echo $cont1 ?> </td>
    <td><?php  echo $ejecuta['codAct'] ?> </td>
    <td><?php echo $ejecuta['descrip']?></td>
<?php
    $aux=$ejecuta['idCat'];
   $sentencia1 = "SELECT * FROM categoria WHERE idCat=$aux"; 
   $ejecutar1=mysqli_query($con,$sentencia1);
   $fila = mysqli_fetch_assoc($ejecutar1);
   
   ?>
    <td><?php echo $fila['nombre'];?></td>
    <?php
    $aux2=$ejecuta['idSub'];
   $sentencia2 = "SELECT * FROM subcategoria WHERE idSub=$aux2"; 
   $ejecutar2=mysqli_query($con,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
   
   ?>
    <td> <?php echo $fila1['nombre'];?></td>
    
    <td>
    <?php


    ?>
   
      <form  action="verDetalle.blade.php" method="get" class="form-register" > 
      
<button  type="submit" class="btn btn-danger" id="btnId" name="btnId"  data-toggle="modal"  value=<?php echo $ejecuta['idAc']?>>Ver</button>
</form>

     <form style="margin-left: 60px; margin-top:-33px;" action="ventaProcesar.blade.php" method="post" class="form-register" > 
     <button  type="submit" class="btn btn-warning" id="btnenvia" name="btnenvia" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idAc'] ?>>Vender</button>
     </form>

     <?php }?>

    </td>
  </tr>

<?php

}
?> 
 
  </tbody>
                </table>
                
</div>

 
       

</div>


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

<script src="dist/js/jquery.datatables.min.js"></script>
<script src="dist/js/datatables.bootstrap.min.js"></script>

</div>

</body>
</html>