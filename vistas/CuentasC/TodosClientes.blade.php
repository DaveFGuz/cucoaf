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
  <title>Clientes</title>

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
   window.location="http://localhost:8081/cucoaf/vistas/CuentasC/DatosCliente.blade.php";
  }
 function sele(){
  var cond= $("#condi").val();
  if (cond==1) {
     window.location="http://localhost:8081/cucoaf/vistas/CuentasC/RegistroCliente.blade.php";
  }else{window.location="http://localhost:8081/cucoaf/vistas/CuentasC/RegistroClienteInactivo.blade.php";}

}
function sele2(){
  var cond2= $("#condi2").val();
  if (cond2==0) {
     window.location="http://localhost:8081/cucoaf/vistas/CuentasC/RegistroCliente.blade.php";
  }else
  if (cond2==1) {
window.location="http://localhost:8081/cucoaf/vistas/CuentasC/RegistroCliente2.blade.php";
  }
  else if (cond2==2) {window.location="http://localhost:8081/cucoaf/vistas/CuentasC/RegistroCliente3.blade.php";}
  else{window.location="http://localhost:8081/cucoaf/vistas/CuentasC/TodosClientes.blade.php";}

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
    <?php include('../ActivoFijo/header.php'); ?> 
  </header>

  <?php include('../ActivoFijo/menu.php'); ?> 

</head>
<body class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">

<?php
if (!empty($_GET['btnalta1']))  {
//activa el activo C:\xampp\htdocs\cucoaf\vistas\ActivoFijo
$est=1;
$var=$_GET['btnalta1'];
$sql = " UPDATE cliente set estado='$est' WHERE idCliente='$var'";
$resultado = $mysqli->query($sql); 
}
?>


    <div class="container">
    <div class="col-md-12">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 page-header">
    <h3 align="center" >Gestión de Clientes</h3>
    </div>
    </div>
    </div>
    </div>  

  <div class="row">

 <div class="col-md-2"></div>


  <div class="col-md-10 col-md-offset-2">
 <div class="col-md-3">
<br>
 <div class="form-group">  
<button type="button"  class="btn btn-primary " onclick="envia()" style="background-color: #90327A">Registrar Nuevo Cliente</button>
</div>
</div>

<div class="col-md-2 ">
<div class="form-group">

  <label for="condi">Estado :</label>
 <select class="form-control" data-live-search="true" id="condi" name="condi" onchange="sele()">
<option>Seleccionar</option> 
<option value="1" >ACTIVO</option>
 
<option value="0">INACTIVO</option>
</select>
</div>
</div> 
<div class="col-md-2 ">
<div class="form-group">

  <label for="condi">Cartera:</label>
 <select class="form-control" data-live-search="true" id="condi2" name="condi2" onchange="sele2()">
<option>Seleccionar</option> 
<option value="0" >NORMALES</option>
 
<option value="1">DEUDORES</option>
<option value="2">INCOBRABLES</option>
<option value="3">TODOS</option>
</select>
</div>
</div> 
                                 
 <div class="col-sm-12 col-md-12">
  
  <div class="panel-body">

  <form action="#" method="get" class="form-horizontal">
          

         <div class="col-md-3 col-md-offset-8" style="margin-top:15px; margin-left: 700px;"> <!--col-md-offset desplaza columnas a la derecha -->
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

$cont=0;
?>
<div class="row thumbnail">


<table class="table table-list-search table-bordered table-hover" id="tabla1">
<thead>

                         <tr style="background-color: #90327A">


    <th scope="col" style="color:#FFFFFF" WIDTH="50" HEIGHT='9' >N°</th>
    <th scope="col" style="color:#FFFFFF">Nombre</th>
    <th scope="col" style="color:#FFFFFF">NIT</th>
    <th scope="col" style="color:#FFFFFF">Ocupacion o Giro</th>
    <th scope="col" style="color:#FFFFFF">Departamento</th>
   <th scope="col" style="color:#FFFFFF">Tipo</th>
    <th  style="color:#FFFFFF" WIDTH="100" HEIGHT='9'>Opciones</th>
  </tr>
  </thead>
  <tbody  class="contenidobusqueda">
  <?php
$extraer="SELECT * FROM cliente";

 $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($con,$extraer);


while($ejecuta=mysqli_fetch_array($ejecutar))
{
	if (($ejecuta['estado'])==1) {
  $cont=$cont+1;

    ?> 
    <?php ?> 
    <?php ?>  
  <tr>
    <td><?php  echo $cont ?> </td>
     <td><?php  echo $ejecuta['nombre']." ".$ejecuta['apellido'] ?> </td>
    <td> <?php echo $ejecuta['nit']?></td>
    <td> <?php echo $ejecuta['ocupacion']?></td>
    <td> <?php echo $ejecuta['depa']?></td>
    <?php if(($ejecuta['tipo'])==1){ ?> 
    	<?php ?> 
    <td>Normal</td>
    <?php }else if(($ejecuta['tipo'])==2){ ?> 
    	<?php ?> 
    <td>Moroso</td>
      <?php }else{ ?> 
      	<?php ?> 
    <td>Incobrable</td>
     <?php } ?> 
      	<?php ?> 
    <td>
     <form   action="verDetalleCliente.blade.php" method="get" class="form-register" > 
     <button  type="submit" title="Ver Cliente" style="display: inline-block; " class="glyphicon glyphicon-eye-open btn-success " id="btndetalle" name="btndetalle" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idCliente'] ?>></button>
     </form>
     <form style=" margin-left: 30px; margin-top:-22px;" action="editarCliente.blade.php" method="post" class="form-register" > 
      <button  type="submit" title="Modificar Cliente"  class="glyphicon glyphicon-cog btn-info" id="btnEditar" name="btnEditar" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idCliente']?>" ></button>
       </form>
    <?php
 if (($ejecuta['tipo'])==1) {
  
 
    ?>
      <form style=" margin-left: 60px; margin-top:-22px;"  action="prestamo.blade.php" method="get" class="form-register">
     <button  type="submit" title="Realizar Prestamo" class="glyphicon glyphicon-usd btn-warning" id="btnEditar1" name="btnEditar1" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idCliente'] ?>></button>
     </form>

     <?php }?>
     <form  style=" margin-left: 90px; margin-top:-22px;" action="RegistroClienteInactivo.blade.php" method="get" class="form-register" > 
     <button  type="submit" title="Dar de baja Cliente" class="glyphicon glyphicon-arrow-down btn-danger" id="btnbaja" name="btnbaja" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idCliente'] ?>></button>
     </form>
    </td>
  </tr>

<?php
}
}
?> 
 
  </tbody>
                </table>
                </form>
</div>

 
       

</div>

 
<!--Modal  Registrar Proveedor-->

<div id="ModalRegistarProveedor"  class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
    <div class="color-moduloInventario">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="col-md-offset-5">
        <h4 class="modal-title">Ingresar datos del proveedor</h4></div>
      </div>
      </div>
       <div class="modal-body">

 <div class="row">
  <div class="col-md-12">



<div class="col-md-8 ">

<div class="col-md-6">
<div class="input-group">

  <label for="nomb" >Nombre del Cliente:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nomb" placeholder="Nombre" name="nomb">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>

<div class="input-group">

  <label for="nit">NIT  </label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit" placeholder="" name="nit">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>


<div class="input-group">

  <label for="nit">NIT  </label>
  <div class="input-group">
  <input type="text" class="form-control" id="nit" placeholder="" name="nit">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>

<div class="input-group">

  <label for="obs">Observaciones </label>
  <div class="input-group">
  <input type="text" class="form-control" id="obs" placeholder="" name="obs">
   <div class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></div>
  </div>
</div>

<div class="input-group">
  <label for="dir">Dirección </label>
  <div class="input-group">
  <input type="text" class="form-control" id="dir" name="dir">
  <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
  </div>
</div>
</div>






<div class="col-md-6">


<div class="input-group">

  <label for="cont" >Nombre del contacto:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="cont" placeholder="Nombre" name="cont">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
</div>
</div>

<div class="input-group">

  <label for="tel" >Telefono:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="tel" placeholder="" name="tel">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>


<div class="input-group">
  <label for="correo">Correo electrónico </label>
  <div class="input-group">
  <input type="text" class="form-control" id="correo" name="correo">
  <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
  </div>
</div>


</div>
</div>
</div>

</div>
</div> 

<div class="modal-footer">

        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        </div>
 </div>
  
 
        </form>
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