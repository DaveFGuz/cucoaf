<?php 
if(!isset($_SESSION)) 
    { 
session_start();
}
session_destroy();

   echo "<script language='javascript'>";
echo  "
         location.href = '../vistas/login.php';
         ";
echo "</script>";
 ?>