<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>cucoaf</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
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

        <script type="text/javascript">
      
        function cancelar(){
          swal({ 
            title: "Advertencia",
            text: "Se Eliminarán Datos Ingresados ",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Aceptar",
            closeOnConfirm: false },

            function(){ 
            swal({ 
            title:'Éxito',
            text: 'Datos Eliminados',
            type: 'success'
          },
            function(){
              //event to perform on click of ok button of sweetalert
              location.href='privilegios.php';
          });
            });
        }
      </script>

</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <?php include("header.php"); ?> 
  </header>

  <?php include("menu.php"); ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Privilegios
        <small>Empleado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Registro Empleado -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Datos Empleado</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form" id="cucoaf" name="cucoaf" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="bandera" id="bandera">

          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Empleado:</label>
                    <select class="form-control select2" id="empleado" name="empleado" style="width: 100%;">
                      <option selected="selected" value="">Seleccione Empleado...</option>
                      <?php
                            require '../../modelos/conexion.php';
                            $result = $mysqli->query("select * from empleado order by nombre_e");
                            if ($result) {
                              while ($fila = $result->fetch_object()) {
                                echo "<option value='".$fila->id_empleado."'>".$fila->nombre_e." ".$fila->apellido_e."</option>";
                              }//fin while
                            }
                        ?>  
                    </select>
                    <span class="help-block" id="error"></span>
                  </div>
                  <!-- /.form-group -->


            </div>

            <div class="col-md-6">

                  <div class="form-group">
                      <label>Privilegios:</label><br/>

                  <?php
                            $result = $mysqli->query("select * from areas where rubro_a = 1");
                            if ($result) {
                              while ($fila = $result->fetch_object()) {
                                echo "<label>";
                                echo "<input name='checkbox[]' type='checkbox' class='flat-red' id='checkbox'  value='".$fila->id_area."'>&nbsp;&nbsp;&nbsp;".utf8_decode($fila->nombre_a);
                                echo "</label><br/>";
                              }//fin while
                            }
                        ?>  

                  </div>

            </div>


          </div>
            <!-- /.col -->

          
             
              <div class="box-footer" align="right">
  
                <button id="btnguardar" name="btnguardar" class="btn btn-round  btn-success" >
                   <span class="fa fa-floppy-o">&nbsp;&nbsp;&nbsp;</span>Guardar Privilegios
                </button>
                        
                <button type="submit" class="btn btn-round btn-default" onclick="cancelar()">
                  <span class="fa fa-ban">&nbsp;&nbsp;&nbsp;</span>Cancelar Proceso
                </button>
                        
              </div>
            </form>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2017 <a href="http://www.ues.edu.sv/">Universidad de El Salvador</a>.</strong> Todos los Derechos Reservados
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
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

</body>
</html>
<?php
  if(isset($_REQUEST["bandera"])){
    $bandera=$_REQUEST["bandera"];
    $empleado=$_REQUEST["empleado"];
    
    require '../../modelos/conexion.php';
    
    if($bandera=="add"){

       msg1($empleado);
        

      if($_POST['checkbox'] != ""){
        if(is_array($_POST['checkbox'])){
          //realizamos el ciclo
          while(list($key,$value) = each($_POST['checkbox'])){
            msg1($value);

            $consulta  = "insert into areas_empleado(id_area, id_empleado) values('$value','$empleado');";
            $result = $mysqli->query($consulta);
          }

        }

      }
      
        mysqli_query("BEGIN");

        if(!$result){
          mysqli_query("rollback");
          msg1("No Exito conex");
          echo "<script type='text/javascript'>";
          echo   "swal('Error','Sin Conexión Dase Datos','error');";
          echo "</script>"; 
        }else{
          mysqli_query("commit");
          echo "<script language='javascript'>";
          echo "swal({ 
                  title:'Éxito',
                  text: 'Datos Almacenados',
                  type: 'success'
                },
                 function(){
                    //event to perform on click of ok button of sweetalert
                    location.href='privilegios.php';
                });";
          echo "</script>";
          msg1("Exito");
        }//fin else
                

    }
  }

/*
  function dameFecha($fecha){
    list($day,$mon,$year)=explode('-',$fecha);
    return date('d-m-Y', mktime(0,0,0,$mon,$day,$year));
  }//fin de la función dameFecha*/


  function msg1($texto){
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "</script>";
  }


  function msg($texto){
    echo "<script type='text/javascript'>";
      echo $texto;
    echo "</script>";
  }

?>