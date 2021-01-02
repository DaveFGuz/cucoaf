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
  <title>Reportes</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="estilos.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script language="javascript">

function enviaRepoActivo(){
   window.location="http://localhost:8081/Proyecto%20Ananlisis%20financieros/ReporteActivo.blade.php";
}
function enviaRepoActivoInac(){
   window.location="http://localhost:8081/Proyecto%20Ananlisis%20financieros/ReporteActivoInactivo.blade.php";
}
function proveedorInac(){
   window.location="http://localhost:8081/Proyecto%20Ananlisis%20financieros/ReporteProveedoresInac.blade.php";
}
function proveedor(){
   window.location="http://localhost:8081/Proyecto%20Ananlisis%20financieros/ReporteProveedores.blade.php";
}
function venta(){
   window.location="http://localhost:8081/Proyecto%20Ananlisis%20financieros/ReporteVentas.blade.php";
}
function envia(){
   window.location="http://localhost:8081/Proyecto%20Ananlisis%20financieros/VistaActivo.blade.php";
  }


 //funcion para que la tabla se llene dinamicamente
  
   
</script>


<body>
    <input type="hidden" class="form-control" id="btnalta1" placeholder="Nombre" name="btnalta1" >
    <div class="container">
    <div class="col-md-12">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 page-header">
    <h3 align="center" >Ver Reportes</h3>
    </div>
    </div>
    </div>
    </div>  

  <div class="row">

 <div class="col-md-2"></div>


  <div class="col-md-7">


                                 
 <div class="col-sm-12 col-md-12">


  <div class="panel-body">

 
<div class="row thumbnail">


<table class="table table-list-search table-bordered table-hover">
<thead>

                         <tr style="background: #5882FA">

    <th scope="col" style="color:#FFFFFF" WIDTH="100" HEIGHT='9' >Reporte</th>
    <th scope="col" style="color:#FFFFFF" WIDTH="200" HEIGHT='9'>Opcion</th>
    
  </tr>
  </thead>
  <tbody  class="contenidobusqueda">


   <tr>

   
    <td> Activos fijo :</td>
    <td><button style='width:100px; height:25px'   WIDTH="100" type="submit" class="btn btn-danger" id="btnId" name="btnId" style=" " data-toggle="modal" onclick="enviaRepoActivo()" > VER</button>
</td>
  </tr>
  
  
  
   <tr>
   <td> Activo Fijo Inactivo:</td>
    <td><button  style='width:100px; height:25px'  type="submit" class="btn btn-danger" id="btnId" name="btnId" style="" data-toggle="modal" onclick="enviaRepoActivoInac()" > VER</button>
</td>
   </tr>

    <tr>
   <td>Proveedores Activos  :</td>
    <td><button style='width:100px; height:25px'   type="submit" class="btn btn-danger" id="btnId" name="btnId" style="" data-toggle="modal" onclick="proveedor()" > VER</button>
</td>
   </tr>

    <tr>
   <td> Proveedores Inactivos :</td>
    <td><button  style='width:100px; height:25px'  type="submit" class="btn btn-danger" id="btnId" name="btnId" style=" " data-toggle="modal" onclick="proveedorInac()">VER</button>
</td>
   </tr>
  
    <tr>
   <td> Ventas :</td>
    <td><button  style='width:100px; height:25px'  type="submit" class="btn btn-danger" id="btnId" name="btnId" style="" data-toggle="modal" onclick="venta()" >VER </button>
</td>
   </tr>

   
  </tbody>
                </table>
                
</div>

 
       

</div>


</div>
</div>
<div class="col-lg-12 col-md-offset-8">
<br>
<br> 
<div class="button-group">

<button type="button"  class="btn" data-dismiss="modal" onclick="envia()">Atras</button>
</div>
</div>


<div class="col-md-1"></div>
</div>




   <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js">
   
  </script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>