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
  <title>Registrar marca</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="estilos.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script language="javascript">
  
  function sele(){
  var cond= $("#condi").val();
  if (cond==1) {
     window.location="http://localhost/Proyecto%20Ananlisis%20financieros/Marcas.blade.php";
  }else{window.location="http://localhost/Proyecto%20Ananlisis%20financieros/MarcasInactivo.blade.php";}

}
    $(document).ready(function () {
   $('#entradafilter').keyup(function () {
      var rex = new RegExp($(this).val(), 'i');
        $('.contenidobusqueda tr').hide();
        $('.contenidobusqueda tr').filter(function () {
            return rex.test($(this).text());
        }).show();

        })

});
</script>


</head>
<body>
 
<?php
if (!empty($_GET['btnalta1']))  {
//activa el activo 
$est=1;
$var=$_GET['btnalta1'];
$sql = " UPDATE marca set estado='$est' WHERE idMarca='$var'";
$resultado = $mysqli->query($sql); 

}


?>


    <div class="container">
    <div class="col-md-12">


    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 page-header">



    <h3 align="center" >Gestionar  Marcas</h3>
    </div>
    </div>
    </div>
    </div>  

  <div class="row">

 <div class="col-md-2"></div>


  <div class="col-md-9">
   <div class="col-md-3">
   <br>
 <div class="form-group">
<button type="button"  class="btn " data-toggle="modal" data-target="#ModalRegistarProveedor"  style="background:#5882FA ;color:#FFFFFF">Ingresar Marca</button>
</div>
</div>
   <div class="col-md-2 ">
<div class="form-group">

  <label for="condi">Estado :</label>
 <select class="form-control" data-live-search="true" id="condi" name="condi" onchange="sele()">
<option></option> 
<option value="1" >Activo</option>
 
<option value="0">Inactivo </option>
</select>
</div>
</div> 


                                 
 <div class="col-sm-12 col-md-12">

  <div class="panel-body">

  <form action="#" method="get" class="form-horizontal">
          

         <div class="col-md-3 col-md-offset-9" style="margin-top:15px;"> <!--col-md-offset desplaza columnas a la derecha -->
                <div class="form-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <div class="input-group">
                    <input id="entradafilter" type="text" class="form-control"> 
                    <span class="input-group-btn">
                    <button type="submit" class="btn" style="margin-right:-20px;"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                  </div>
                    </div>
                     </div>
    </form>

<?php

$cont=0;
?>
<div class="row thumbnail">


<table class="table table-list-search table-bordered table-hover">
<thead>

                         <tr style="background: #5882FA">

    <th scope="col" style="color:#FFFFFF" WIDTH="50" HEIGHT='9' >N°</th>
    <th scope="col" style="color:#FFFFFF">Nombre</th>
    
    
    <th scope="col" style="color:#FFFFFF" WIDTH="40" HEIGHT='9'>Opciones</th>
  </tr>
  </thead>
  <tbody class="contenidobusqueda">
 


<?php
$extraer="SELECT * FROM marca";

 $base=mysqli_select_db($con,'finanzas');
$ejecutar=mysqli_query($con,$extraer);

while($ejecuta=mysqli_fetch_array($ejecutar))
{if (($ejecuta['estado'])==1) {
  $cont=$cont+1;

    ?>  
  <tr>
    <td><?php  echo $cont ?> </td>
    <td><?php echo $ejecuta['nombre']?></td>
    
    <td>
    
    <form  action="editarMarcas.blade.php" method="post" class="form-register" > 
      <button  type="submit" class="btn btn-danger" id="btnEditar" name="btnEditar" style="background-color: transparent border:0" data-toggle="modal"  value="<?php echo $ejecuta['idMarca']?>" >Editar</button>
      </form>

    <form style=" margin-left: 70px; margin-top:-33px;" action="MarcasInactivo.blade.php" method="get" class="form-register" > 
     <button  type="submit" class="btn btn-warning" id="btnbaja" name="btnbaja" style="background-color: transparent border:0" data-toggle="modal"  value=<?php echo $ejecuta['idMarca'] ?>>Baja</button>
     </form>
 
   </td>
  </tr>

<?php
}
}
?> 
  </tbody>
  
                </table>
               
</div>

 
       

</div>


 </div>


 
<!--Modal  Registrar Proveedor-->

<div id="ModalRegistarProveedor" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
<form  action="insert.php" method="post" class="form-register" > 
    <div class="modal-content">
    <div class="color-moduloInventario">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="col-md-offset-5">
        <h4 class="modal-title">Ingresar Marca</h4></div>
      </div>
      </div>
       <div class="modal-body">

 <div class="row">
  <div class="col-md-12">


<div class="col-md-3 ">

<img src="img/proveedor.png" class="img-rounded" alt="Cinque Terre" width="300" height="250">
</div>

<div class="col-md-8 col-md-offset-1">

<div class="col-md-6">
<div class="input-group">

  <label for="nombProd" >Nombre:</label>
  <div class="input-group">
  <input type="text" class="form-control" id="nombProd" name="nombProd" placeholder="Nombre">
  <div class="input-group-addon"><span  class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
</div>
</div>




</div>


</div>

</div>
</div> 
 </div>
  
 <div class="modal-footer">

        <button type="submit" class="btn" >Guardar</button>
        <button type="button" class="btn" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      </form>
      </div>
      
 </div>
<!--Fin modal Registrar Proveedor-->

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