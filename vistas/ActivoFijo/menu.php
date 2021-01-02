<?php
if (!isset($_SESSION)) {
  session_start();
}

if (empty($_SESSION['usuario'])) {

  echo "<script language='javascript'>";
  echo  "
         location.href = '../login.php';
         ";
  echo "</script>";
}



?>


<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="background:#1C1C1C; border:#FFFFFF; height:1150px">


  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../dist/img/avatar.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p style="color:#337ab7; "><?php echo $_SESSION['usuario']; ?></p>
        <a href="#" style="color:#337ab7; "><i class="fa fa-circle text-success"></i>EN LINEA</a>
      </div>
    </div>-->


    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
     <strong> <li class="header" style="background:; color:#FFFF; text-align: center; font-size: 20px">MENU</li></strong>
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-list-alt"></i> <span style="color:#00a65a; ">REGISTRO DE ACTIVOS FIJOS</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="background:#FFFF;">
          <li><a href="../ActivoFijo/IngresaInstitucion.blade.php"><i class="fa fa-building-o"></i> Institucion</a></li>
          <li><a href="../ActivoFijo/RegistroProveedor.blade.php"><i class="fa fa-cube"></i> Proveedores</a></li>
          <li><a href="../ActivoFijo/Marcas.blade.php"><i class="fa fa-qrcode"></i> Marca</a></li>
          <li><a href="../ActivoFijo/Movimiento.blade.php"><i class=" 	fa fa-exchange"></i> Movimientos</a></li>

          <li><a href="../ActivoFijo/Ubicacion.blade.php"><i class="fa fa-location-arrow"></i>Ubicacion</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-blackboard"></i> <span style="color:#00a65a; ">ACTIVO FIJO</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="background:#FFFF;">
          <li><a href="../ActivoFijo/Categoria.blade.php"><i class="fa fa-circle-o"></i>Categoria </a></li>
          <li><a href="../ActivoFijo/subcategoria.blade.php"><i class="fa fa-circle-o"></i>Subcategoria </a></li>
          <li><a href="../ActivoFijo/Comprar.blade.php"><i class="fa fa-circle-o"></i>Comprar </a></li>
          <li><a href="../ActivoFijo/Reevaluar.blade.php"><i class="fa fa-circle-o"></i>Reevaluar</a></li>
          <li><a href="../ActivoFijo/VistaActivo.blade.php"><i class="fa fa-circle-o"></i>Depreciar</a></li>
          <li><a href="../ActivoFijo/Vender.blade.php"><i class="fa fa-money"></i>Vender</a></li>
        </ul>
      </li>
      
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-credit-card"></i>
          <span style="color:#00a65a; ">CUENTAS POR COBRAR</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="background:#FFFF;">
          <li><a href="../CuentasC/creditos.blade.php"><i class="fa fa-circle-o"></i>Creditos </a></li>
          <li><a href="../CuentasC/TodosClientes.blade.php"><i class="fa fa-circle-o"></i>Todos los Clientes</a></li>

        </ul>

      </li>
      <!--
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-user"></i>
          <span style="color:#FFFFFF; ">Gestionar usuarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="background:#1C1C1C;">

          <li><a href="../ActivoFijo/UsuarioMostrar.blade.php"><i class="fa fa-circle-o"></i>Mostrar usuarios</a></li>

        </ul>
      </li>
-->
      
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span style="color:#00a65a; ">REPORTE DE ACTIVO FIJO</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="background:#FFFF;">
          <li><a href="../ActivoFijo/ReporteActivo.blade.php"><i class="fa fa-circle-o"></i>Activos </a></li>
          <li><a href="../ActivoFijo/ReporteActivoInactivo.blade.php"><i class="fa fa-circle-o"></i>Activos Inactivos</a></li>
          <li><a href="../ActivoFijo/ReporteProveedores.blade.php"><i class="fa fa-circle-o"></i>Proveedores </a></li>
          <li><a href="../ActivoFijo/ReporteProveedoresInac.blade.php"><i class="fa fa-circle-o"></i>Proveedores Inactivos</a></li>
          <li><a href="../ActivoFijo/ReporteVentas.blade.php"><i class="fa fa-circle-o"></i>Ventas </a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span style="color:#00a65a; ">REPORTE DE CUENTAS POR COBRAR</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="background:#FFFF;">
          <li><a href="../CuentasC/ReporteCarteraNormal.blade.php"><i class="fa fa-circle-o"></i>Normales </a></li>
          <li><a href="../CuentasC/ReporteCarteraMorosa.blade.php"><i class="fa fa-circle-o"></i>Morosos</a></li>
          <li><a href="../CuentasC/ReporteCarteraIncobrable.blade.php"><i class="fa fa-circle-o"></i>Incobrables </a></li>
          <li><a href="../CuentasC/ReporteCarteraTodos.blade.php"><i class="fa fa-circle-o"></i>Todos</a></li>
          <li><a href="../CuentasC/ReporteClientesInactivos.blade.php"><i class="fa fa-circle-o"></i>Clientes Inactivos</a>
        </ul>
      </li>



    </ul>
  </section>
  <!-- /.sidebar -->
</aside>