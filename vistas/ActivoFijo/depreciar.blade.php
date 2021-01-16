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
  <title>Depreciar</title>

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
   window.location="http://localhost:8081/cucoaf/vistas/ActivoFijo/VistaActivo.blade.php";
  }

function envia1(){
   window.location="http://localhost:8081/cucoaf/vistas/ActivoFijo/depreciar.blade.php";
  }
 //funcion para que la tabla se llene dinamicamente
  
   
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
    <h2 class="col-lg-offset-2" ><strong>CALCULO DE DEPRECIACION</strong></h2>
    </div>
    </div>
    </div>
    </div> 
    <?php
    $aux2=$_GET['boton'];
   $sentencia2 = "SELECT * FROM detalle_activo WHERE activofijo_id='$aux2'"; 
   $ejecutar2=mysqli_query($con,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
   
   $senten2 = "SELECT idCat FROM activo WHERE idAc='$aux2'"; 
   $ejecu2=mysqli_query($con,$senten2);
   $fil2 = mysqli_fetch_assoc($ejecu2);
   $senten1 = "SELECT * FROM categoria WHERE idCat='$fil2[idCat]'"; 
   $ejecu1=mysqli_query($con,$senten1);
   $fil1 = mysqli_fetch_assoc($ejecu1);

   $precio=$fila1['valor_historico'];
   $res=$fil1['val'];
   $residual=$precio*($res/100);
   $dep=$precio-$residual;
   ?>
<div class="row">
	<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				
				<h4 class="col-lg-offset-1" ><div style="color:green"><strong>Precio: <?php echo $fila1['valor_historico']?></div>&nbsp;&nbsp; <div style="color:red">Valor Residual:<?php echo $residual?></div>&nbsp;&nbsp; <div style="color:black"> Valor a Depreciar:<?php echo $dep?></strong></h4>
        <br>
        <div class="clearfix"></div>
			</div>
			<div class="col-md-8 col-md-offset-3 col-sm-12 col-xs-12">
				<?php for ($i=0; $i <2 ; $i++) { 				
					?>
					&nbsp;
					<?php 
				}
				?>

				<button type="button" onclick="fecha()" class="btn btn-danger" style="background-color: #2D943E">CALCULAR</button> <button type="button" onclick="calcular('1','0','0')" class="btn btn-info">AÑO</button> <button type="button" onclick="calcular('2','0','0')" class="btn btn-info">MES</button> <button type="button" onclick="calcular('3','0','0')" class="btn btn-info">DIAS</button>

				<div class="col-md-6 col-sm-6 col-xs-12">

           
<input type="hidden" value="<?php echo $dep?>" id="valor" name="valor">
<input type="hidden" value="<?php echo $fila1['vidautil_restante']?>" id="vida" name="vida">
<div id="oculta" style='display:none';>
<input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control"  value="<?php echo $fila1['fecha_inicio']?>">
</div>
 <input type="date" id="fecha" name="fecha" min="<?php echo $fila1['fecha_inicio']?>" class="form-control"  value="<?php echo $fila1['fecha_inicio']?>">
 

                  
                  </div>
		
				
			</div>
			<div class="row">
			<div class="col-md-offset-2 col-md-12">
			<div class="x_content">	<br />

				<div class="w3-container table-responsive" style=" overflow:auto;height:500px" >

					<table id="tabla" class="table table-list-search table-bordered table-hover" >
						<thead>
							<tr class="w3-text-black ">
								<th data-column-id="id" data-type="numeric" data-order="asc">Año/Mes/Dia</th>
								<th data-column-id="codigo">Cuota a depreciar</th>
								<th data-column-id="nombre">Depreciación acumulada</th>
								<th data-column-id="vida_util">Valor en Libro</th>

							</tr>
						</thead>
						<tbody >

						</tbody>
					</table>	

					</div>
				</div>					
				</div>
			</div>
		</div>
	</div>
</div>



   

<script language="javascript">

	function calcular(cantidad, centinela, cont){
		contar();
		var valor=$("#valor").val();
		var vida=$("#vida").val();
		var ciclo=0;
		var v=0;


		if(vida>0){

			if(cantidad==1){
				ciclo=vida;

			}else if(cantidad==2){
				ciclo=12*vida;

			}else{
				ciclo=365*vida;

			}
						

			var cuota=valor/ciclo;
			var aux=0;
			if(cont==1){
				ciclo=centinela;
			}

			for ($i = 1; $i <=ciclo;  $i++){
				aux=aux+cuota;
				valor=valor-cuota;
				var v1 = Math.abs(valor);
				filas($i,cuota,aux,v1);

			}

		}

	}

	function filas(i, cuota, aux, valor){

		  var cuota=cuota.toFixed(2);
			var	aux=aux.toFixed(2);
			var	valor=valor.toFixed(2);
		var fila='<tr  name="eli" class="selected" id="fila'+i+'"><td style="text-align:center" class="col-sm-3"><input type="text" style="border:none;background-color: transparent;"  class="form-control"  margin-left:-50px  value="'+i+'"></td><td style="text-align:center" class="col-sm-3"><input type="text" style="border:none;background-color: transparent;  class="form-control" name="nomPr[]" margin-left:-50px  value="'+cuota+'"></td><td style="text-align:center " class="col-sm-2" ><input type="text" style="border:none;background-color: transparent;" width="100" class="form-control" name="cantidad[]" margin-left:5px    value="'+aux+'"></td><td style="text-align:center" class="col-sm-2"><input type="text" style="background-color: transparent; border:none; WIDTH:300" class="form-control"  name="precio_compra[]"  value="'+valor+'"></td></tr>';

		$("#tabla").append(fila);
	}



function contar(){
	var table = document.getElementById('tabla');
	var n=$('#tabla >tbody >tr').length;
	//swal("hola",n, "success");
	for (var i = 1; i <=n; i++) {
       $("#fila"+i).remove();

	}
}


function fecha(){
var fecha1 = $("#fecha_inicio").val();
var fecha2 = $("#fecha").val();
var di=daysBetween(fecha1, fecha2);
var vida=$("#vida").val();
var ci=365*vida;

if(di>ci){
	swal("Opps","Para este Año ya no existe depreciación","warning")

}else{

	calcular('3',di,'1');
}

}


function daysBetween(date1, date2){   if (date1.indexOf("-") != -1) { date1 = date1.split("-"); } else if (date1.indexOf("/") != -1) { date1 = date1.split("/"); } else { return 0; }   if (date2.indexOf("-") != -1) { date2 = date2.split("-"); } else if (date2.indexOf("/") != -1) { date2 = date2.split("/"); } else { return 0; }   if (parseInt(date1[0], 10) >= 1000) {       var sDate = new Date(date1[0]+"/"+date1[1]+"/"+date1[2]);   } else if (parseInt(date1[2], 10) >= 1000) {       var sDate = new Date(date1[2]+"/"+date1[1]+"/"+date1[0]);   } else {       return 0;   }   if (parseInt(date2[0], 10) >= 1000) {       var eDate = new Date(date2[0]+"/"+date2[1]+"/"+date2[2]);   } else if (parseInt(date2[2], 10) >= 1000) {       var eDate = new Date(date2[2]+"/"+date2[1]+"/"+date2[0]);   } else {       return 0;   }   var one_day = 1000*60*60*24;   var daysApart = Math.abs(Math.ceil((sDate.getTime()-eDate.getTime())/one_day));   return daysApart;}
 



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