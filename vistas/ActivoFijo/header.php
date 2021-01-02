<?php
if(!isset($_SESSION)) 
    { 
session_start();
}
error_reporting(0);
if (empty($_SESSION['usuario'])) {
die();
      echo "<script language='javascript'>";
echo  "
         location.href = '../login.php';
         ";
echo "</script>";



}
?>
    <!-- Logo -->
    <a href="../ActivoFijo/inicio.php" class="logo" style="background:#00a65a;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AF</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>FINANCIEROS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background:#00a65a; color:#00a65a">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="background:#00a65a;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
   
          <!-- Tasks: style can be found in dropdown.less -->
    
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php  echo $_SESSION['usuario']; ?></span>
            </a>
            <ul class="dropdown-menu" >
              <!-- User image -->
              <li class="user-header" style="background:#337ab7;">
                <img src="../dist/img/avatar.png" class="img-circle" alt="User Image">

                <p>
                  Administrador
                  <small>Financiero</small>
                </p>
              </li>
              <!-- Menu Body -->
          
              <!-- Menu Footer-->
              <li class="user-footer" >
                <div class="pull-left">
                  <a href="../ActivoFijo/inicio.php" class="btn btn-primary">Inicio</a>
                </div>
                <div class="pull-right">
                  <a href="../cerrarSession.php" class="btn btn-primary">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            
          </li>
        </ul>
      </div>
    </nav>