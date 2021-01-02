<?php
  if(isset($_REQUEST["bandera"])){
    $bandera=$_REQUEST["bandera"];
    $nombre=$_REQUEST["nombre"];
    $apellido=$_REQUEST["apellido"];
    $direccion=$_REQUEST["direccion"];
    $fechanacimiento=$_REQUEST["fechanacimiento"];
    $estadocivil=$_REQUEST["estadocivil"];
    $dui=$_REQUEST["dui"];
    $nit=$_REQUEST["nit"];
    $genero=$_REQUEST["1"];
    $cargo=$_REQUEST["cargo"];
    $correo=$_REQUEST["correo"]; 
    $telefono1=$_REQUEST["telefono1"];
    $telefono2=$_REQUEST["telefono2"];

    require '../modelos/conexion.php';

    
    if($bandera=="add"){

       msg1($nombre);
        msg1($apellido);
        msg1($direccion);
        msg1($fechanacimiento);
        msg1($estadocivil);
        msg1($dui);
        msg1($nit);
        msg1($genero);
        msg1($cargo);
        msg1($correo);
        msg1($telefono1);
        msg1($telefono2);


        /*

      $result = $conexion->query("select max(id_empleado)+1 as 'id' from empleado");
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $id=$fila->id;
        }
      }
      if($id==null){
        $id=$id+1;
      }
      $ruta = "../guardar/";  //ruta donde se guardaran los archivos
      $ruta = $ruta . $_FILES['file']['name']; //a la ruta se le concatena el nombre del archivo enviado desde el formulario
      if(move_uploaded_file($_FILES['file']['tmp_name'], $ruta)) { // se mueve el archivo subido a la ruta antes mencionada
        echo "El archivo ". basename( $_FILES['file']['name']). " ha sido subido";// si el archivo se subio correctamente se indica mediante un mensaje
        msg1("Exito hola");
        msg1($nombre);
        msg1($apellido);
        msg1($direccion);
        msg1($dui);
        msg1($cargo);
        msg1($genero);
        msg1($ruta);
        msg1($id);
        $consulta  = "insert into empleado values('$id',trim('$nombre'),trim('$apellido'),trim('$direccion'),trim('$dui'),trim('$nit'),'$genero','$cargo',trim('$correo'),trim('$ruta'),'1');";
        $result = $conexion->query($consulta);

        $consulta1  = "insert into telefono_empleado values('null',trim('$telefono1'),'$id');";
        $result1 = $conexion->query($consulta1);

        mysqli_query("BEGIN");

        if(!$result || !$result1){
          mysqli_query("rollback");
          msg1("No Exito conex");
        }else{
          if($telefono2!=""){
            $consulta2  = "insert into telefono_empleado values('null',trim('$telefono2'),'$id');";
            $result2 = $conexion->query($consulta2);
          }
          mysqli_query("commit");
          echo "<script language='javascript'>";
          echo "location.href='empleado1.php';";
         echo "</script>";
          msg1("Exito");
        }//fin else
                
        
    }else{
      echo "Ha ocurrido un error, trate de nuevo!";// de lo contrario se indica tambien si a ocurrido un error
      msg("No Exito");
      msg("alerta('Error','No se pudo cargar la imagen', 'error');");
      
    }*/
    }
  }

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