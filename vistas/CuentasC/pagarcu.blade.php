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
//date_default_timezone_set('America/El_Salvador');
ini_set('date.timezone', 'America/El_Salvador');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pagar Cuota</title>

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
   window.location="http://localhost:8081/cucoaf/vistas/ActivoFijo/RegistroProveedor.blade.php";
  }
</script>
<header class="main-header">
    <?php include('../ActivoFijo/header.php'); ?> 
  </header>

  <?php include('../ActivoFijo/menu.php'); ?> 
</head>
<body class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">

    <div class="container">
    <div class="col-md-12">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 page-header">
    <h3 align="center" >Pagar Cuotas</h3>
    </div>
    </div>
    </div>
    </div>  

  <div class="row">

 <div class="col-md-2"></div>


  <div class="col-md-9 col-md-offset-3">
  
<?php 

   $aux= $_GET['btnEditar1'];
   $numCu= $_GET['num'];
   $monto= $_GET['mon1'];
   $sentencia = "SELECT * FROM prestamo WHERE idPres=$aux"; 
   $ejecutar= mysqli_query($con,$sentencia);
   $fila = mysqli_fetch_assoc($ejecutar);

   $aux2=$fila['idCli'];
   $sentencia1 = "SELECT * FROM cliente WHERE idCliente=$aux2"; 
   $ejecutar1= mysqli_query($con,$sentencia1);
   $fila1 = mysqli_fetch_assoc($ejecutar1);

   $aux3=$fila['idCre'];
   $sentencia2 = "SELECT * FROM creditos WHERE idCre=$aux3";  
   $ejecutar2= mysqli_query($con,$sentencia2);
   $fila2 = mysqli_fetch_assoc($ejecutar2);

   $interes=$fila2['interes']/100/12;
   $intXdia=$interes/30;

   $finicial=$fila['fechafinan'];

   $fideal = strtotime ( '+'.$numCu.' month' , strtotime ( $finicial ) ) ;

            $dias = (time()-$fideal)/86400;
            $dias = abs($dias);
            $dias = floor($dias);

        if ($fideal >= time() || $dias==0) {
            $tipo = "Normal";
            $retraso = 0;
            $mora = 0.00;
            $total = $fila['cuota'];

            $interes1 = $monto*$interes;
            $capital = $fila['cuota']-$interes1;
            $saldo = round(($monto-$capital),2);
        }else{
            $tipo = "Moratorio";
            $retraso = $dias;

            $interes1=$monto*$interes;
            $capital=$fila['cuota']-$interes1;
            $saldo=$monto-$capital;
            $saldo = round($saldo,2);

            $mora = round(($capital * $intXdia * $dias),2);
            $total = round(($prestamo->cuota + $mora),2);
        } 
    ?>   
<script type="text/javascript">
var numero=<?php echo json_encode($numCu); ?>;
var tipo=<?php echo json_encode($tipo); ?> ;
var mora=<?php echo json_encode($mora); ?>;
var total=<?php echo json_encode($total); ?>;
var retraso=<?php echo json_encode($retraso); ?>;
var saldo=<?php echo json_encode($saldo); ?>;
var fe=<?php echo json_encode($fideal); ?>;

    window.onload=function(){
        document.getElementById('numero').value=numero;
        document.getElementById('tipo').value=tipo;
        document.getElementById('mora').value=mora;
        document.getElementById('total').value=total;
        document.getElementById('atraso').value=retraso;
        document.getElementById('saldo').value=saldo;
        document.getElementById('fe').value=document.getElementById('fechap').value;
    }
</script>                            


 <form  action="guardaPago.php" method="post" class="form-register" > 
       <div class="input-group">
   
 <div class="col-lg-12 col-md-offset-2">
 
<div class="col-md-6">
<div class="input-group">

  <label for="nomb" >Cliente:</label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="nomb" placeholder="Nombre" name="nomb" value="<?php echo $fila1['nombre'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


<br> 
<div class="input-group">

  <label for="tipo">Tipo de pago: </label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="tipo" placeholder="Ej:00000000-0" name="tipo">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>
<br>

<div class="input-group">

  <label for="cuota" >Cuota:</label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="cuota" placeholder="Ej:0000-0000" name="cuota" value="<?php echo $fila['cuota'];?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>
<br>
 <div class="input-group">

  <label for="numero" >Numero de Cuota:</label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="numero" placeholder="Ej:0000-0000" name="numero" >
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>
<br>
<br>
<div class="form-group" style="width:220px;">
  <label for="mora">Mora: </label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="mora" name="mora" placeholder="Ej:00000000-0" name="mora">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>
<div class="form-group" style="width:220px;">

  <label for="anterior" >Saldo Anterior:</label>
  <div class="input-group">
  <input type="number" required="true" class="form-control" id="anterior" placeholder="Ej:0" name="anterior" value="<?php echo $monto;?>">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></div>
</div>
</div>

</div>

<div class="col-md-6">


<div class="form-group" style="width:220px;">
  <label for="dui">DUI:</label>
  <div class="input-group">
  <input type="text" readonly="true" class="form-control" id="dui" placeholder="Ej:00000000-0" name="dui" value="<?php echo $fila1['dui'];?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>

<div class="input-group">

  <label for="monto">Monto($):</label>
  <div class="input-group">
  <input type="text" class="form-control" id="monto" readonly="true" placeholder="Ej:0000-000000-000-0" name="monto" value="<?php echo $fila['monto'];?>">
   <div class="input-group-addon"><span class="glyphicon glyphicon-check"></span></div>
  </div>
</div>


<br>

<div class="input-group" style="width:220px;">

  <label for="fechap" >Fecha de Pago:</label>
  <div class="input-group">
  <input type="date" class="form-control" id="fechap" name="fechap" readonly="true" value="<?php echo date("Y-m-d");?>"  disabled>
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<br>
<div class="input-group" style="width:220px;">

  <label for="atraso" >Dias de Retraso:</label>
  <div class="input-group">
  <input type="number" class="form-control" id="atraso" readonly="true"  placeholder="1000" name="atraso">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>
<br>
<div class="input-group">
  <label for="total">Total a Pagar:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="total" readonly="true" name="total">
  <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
  </div>
</div>
<br>
<div class="input-group" style="width:220px;">

  <label for="saldo" >Saldo Nuevo:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="saldo" required="true" readonly="true" placeholder="0.00" name="saldo">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>


</div>
 <input  type="hidden" class="form-control" id="fe" name="fe" >  
<input  type="hidden" class="form-control" id="pres" name="pres" value="<?php echo $_GET['btnEditar1'];?>">  
  <div class="col-lg-12 col-md-offset-5">
<br>
<br> 
<div class="button-group">
<button type="submit" class="btn btn-primary" style=" margin-left: -150px; margin-top:80px;">Guardar</button>
</div>
</div>

</div>
</form>

<form  action="amortizar.blade.php" method="get" class="form-register" > 
<button type="submit"  class="btn btn-primary"  style=" margin-left: 500px; margin-top:-30px;" id="btnbaja" name="btnbaja" value=<?php echo $fila['idCli'] ?>>Atras</button>
</form>

</div>


 
<div class="col-md-1"></div>

 </div>
 
<script type="text/javascript">
    var interes = <?php echo json_encode($interes); ?>;
    var maxpres = <?php echo json_encode($maxpres); ?>;
    var plamax = <?php echo json_encode($plamax); ?>;

    function cambiar(id){
       document.getElementById('posi').value=id;
        document.getElementById('monto').max=maxpres[id];
        document.getElementById('plazo').max=plamax[id];
    }
    function cuota1(){
        var pos=document.getElementById('posi').value;
        var monto=document.getElementById('monto').value;
        var plaz=document.getElementById('plazo').value;
        if(monto=="" || plaz==""){
            alert("Por favor llene los campos!!!");
        }else{
            var inter=(interes[pos]/12)/100;
            var cuota=monto/((1-Math.pow((1+inter),- plaz))/inter);
            cuota = cuota.toFixed(2);
            document.getElementById('cuota').value=cuota;
            document.getElementById('saldo').value=(cuota*plaz).toFixed(2);
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