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
  

$con=mysqli_connect('localhost','root','','horarios');

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
	
<title>SIGHUES</title>
 
   <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/fullcalendar.min.css"/>
	<link href="../asset/css/style.css" rel="stylesheet">
	<!-- end: Css -->

	<link rel="shortcut icon" href="../asset/img/logomi.png">



<script language="javascript">

  </script>
 
 <!-- Insercionde header y menu -->
<header class="main-header">
    <?php include("header.php"); ?> 
  </header>

  <?php include("menu.php"); ?> 

</head>
 <body id="mimin" class="dashboard">



<!--inicio content -->
  <div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-xs-12 col-md-11 col-sm-8">
                        <h3 class="animated fadeInLeft">Ingresar Departamentos</h3>
                        <p class="animated fadeInDown">
                          Ingresos <span class="fa-angle-right fa"></span> Departamentos
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                <form method="post" action="ingresoDepartamentos.php" >
                  <div class="col-md-12 padding-0">
                    <div class="col-xs-12 col-md-11 col-sm-8">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Basic Element</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:30px;">

                          <div class="col-xs-12 col-md-11 col-sm-8">


                           <div class="col-xs-6">

                            <div class="form-group"><label class="col-sm-2 control-label text-right">Nombre </label>
                              <div class="col-xs-12"><input type="text" id="nomb" name="nomb" class="form-control"></div>
                            </div>
                           
                            </div>
                            </div>
                            
                            </div>
                              <div class="col-xs-6">

                            <!-- Penesar en agregar mas-->
                           </div>


                         <div class="button-group" style="margin-top:200px; margin-left: 300px;">
                          <div class="col-md-3" >
                            <input type="button" class="btn  btn-3d btn-primary" value="Cancelar"/>
                          </div>
                        <div class="col-md-3" >
                            <input type="submit" class="btn  btn-3d btn-success" value="Aceptar"/>
                        </div>
                        </div>

                             
                         </div>


                         

                        </div>
                      </div>

                      </div>
                    
                  </div>
                  </form>
                   </div>

        
              </div>
              
           
          <!-- end: content -->


<!-- start: Javascript -->
    <script src="../asset/js/jquery.min.js"></script>
    <script src="../asset/js/jquery.ui.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
   
    
    <!-- plugins -->
    <script src="../asset/js/plugins/moment.min.js"></script>
    <script src="../asset/js/plugins/fullcalendar.min.js"></script>
    <script src="../asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="../asset/js/plugins/jquery.vmap.min.js"></script>
    <script src="../asset/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="../asset/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="../asset/js/plugins/chart.min.js"></script>


    <!-- custom -->
     <script src="../asset/js/main.js"></script>

 </body>
</html>

   <?php  

if (!empty($_POST['nomb']))  {

$insertar="INSERT INTO departamento (nombre) VALUES ('$_POST[nomb]')";
$ejecutar=mysqli_query($con,$insertar);

}
?>