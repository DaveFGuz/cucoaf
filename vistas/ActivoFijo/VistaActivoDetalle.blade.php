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
  <title>Detalles aCtivo</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="estilos.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script language="javascript">



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
    <h3 align="center" >Detalles de activo fijo</h3>
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

                     <tr class="color-apariencia">


    <th scope="col" style="color:#FFFFFF" WIDTH="100" HEIGHT='9' >Valor</th>
    <th scope="col" style="color:#FFFFFF" WIDTH="300" HEIGHT='9'>Descripcion</th>
    
  </tr>
  </thead>
  <tbody  class="contenidobusqueda">


    <?php
    $aux2=$_GET['btnId'];
   $sentencia2 = "SELECT * FROM detalle_activo WHERE activofijo_id='$aux2'"; 
   $ejecutar2=mysqli_query($con,$sentencia2);
   $fila1 = mysqli_fetch_assoc($ejecutar2);
   
   ?>
<tr>
   
    <td>Serie/Marca :</td>
    <td><?php echo $fila1['serie'];?></td>
  </tr>
  <tr>
<?php
    $aux3=$fila1['marca_id'];
   $sentencia3 = "SELECT * FROM marca WHERE idMarca='$aux3'"; 
   $ejecutar3=mysqli_query($con,$sentencia3);
   $fila3 = mysqli_fetch_assoc($ejecutar3);
   
   ?>
    
    <td> Proveedor :</td>
    <td><?php echo $fila3['nombre'];?></td>
  </tr>
 <tr>

    <?php
    $aux4=$fila1['ubi_id'];
   $sentencia4 = "SELECT * FROM ubicacion WHERE idUb='$aux4'"; 
   $ejecutar4=mysqli_query($con,$sentencia4);
   $fila4 = mysqli_fetch_assoc($ejecutar4);
   
   ?>
    <td> Ubicacion :</td>
    <td><?php echo $fila4['nombre'];?></td>
  </tr>
  
  
  
   <tr>
   <td> Fecha de adquisicion :</td>
    <td><?php echo $fila1['fecha_adqui'];?></td>
   </tr>

    <tr>
   <td> Fecha de Inicio :</td>
    <td><?php echo $fila1['fecha_inicio'];?></td>
   </tr>

    <tr>
   <td> Valor historico :</td>
    <td><?php echo $fila1['valor_historico'];?></td>
   </tr>
  
    <tr>
   <td> Donacion :</td>
    <td><?php echo $fila1['donado'];?></td>
   </tr>

   <tr>
    <td>Vida util restante :</td>
    <td><?php echo $fila1['vidautil_restante'];?></td>
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