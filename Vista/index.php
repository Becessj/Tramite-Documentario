<?php
  session_start();
  if(isset($_SESSION['tiempo_sistema']) ) {
    if($_SESSION['tiempo_sistema'] < time())
    {
        session_destroy();
        echo "<script>window.location='../index.php'</script>";
    }else{
      $_SESSION['tiempo_sistema'] = time()+1800;
    }
  }
  if (!isset($_SESSION['id_usuario_sistematramite'])) {
    header('Location: ../index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>P&aacute;gina Principal | Sistema Mesa de Partes</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="_Plantilla/img/escudo2.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="_Plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="_Plantilla/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="_Plantilla/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="_Plantilla/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="_Plantilla/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="_Plantilla/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="_Plantilla/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link rel="stylesheet" href="_Plantilla/dist/css/adminlte.min.css">


    <!-- SweetAlert2 -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #1c2c4c !important;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link" style="color: white;"><b>Inicio</b></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown"  href="#">
          <label id="lb_correo_usuario" style="cursor: pointer;color: white;">Usuario</label>
          <i class="fa fa-angle-down" style="color: white"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a  href="javascript:abrirModalFotoPerfil();"  class="dropdown-item">
            <i class="fas fa-camera mr-2"></i> Foto
          </a>
          <div class="dropdown-divider"></div>
          <a  href="javascript:abrirModalCuentaPerfil();"  class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Perfil
          </a>
          <div class="dropdown-divider"></div>
          <a href="javascript:abrirModalusuario()" class="dropdown-item">
            <i class="fas fa-cog mr-2"></i> Cuenta
          </a>
          <div class="dropdown-divider"></div>
          <a  href="../controlador/usuario/controlador_usuario_cerrar_sesion.php"class="dropdown-item">
            <i class="fas fa-power-off mr-2"></i> Salir
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"  style="color: white"></i>
        </a>
      </li>
    </ul>
  </nav>
  <a style="color: #03710E;text-align: center"><b><h1>Sistema de Trámite Documentario</h1></b></a>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link" style="background-color: WHITE !important;text-align: center;">
      <img src="_Plantilla/img/escudo2.png"
           alt=""
           class="img-circle elevation-3"
           style="width: 50px!important">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <div id="div_fotoperfil2"></div>
          <!--<img src="_Plantilla/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <label style="color: white;" id="lb_nombreusuario"></label>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php
            if ($_SESSION['tipo_usuario_sistematramite'] == 'Administrador') {
          ?>
            <li class="nav-item">
              <a href="javascript:cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p> Usuarios</p>
              </a>
            </li>
            <li class="nav-item" >
              <a href="javascript:cargar_contenido('contenido_principal','area/vista_area_listar.php')" class="nav-link">
                <i class="nav-icon fa fa-layer-group"></i>
                <p> Areas </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:cargar_contenido('contenido_principal','tipo_documento/vista_tipodocumento_listar.php')" class="nav-link">
                <i class="nav-icon far fa-list-alt"></i>
                <p> Tipo de Documento </p>
              </a>
            </li>
            <!-- TUPA -->
            <li class="nav-item">
              <a href="javascript:cargar_contenido('contenido_principal','tipo_documento/vista_tupa_listar.php')" class="nav-link">
                <i class="nav-icon far fa-list-alt"></i>
                <p> TUPA </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="javascript:cargar_contenido('contenido_principal','documento/vista_documento_listar.php')" class="nav-link">
                <i class="nav-icon fa fa-file-signature"></i>
                <p> Tr&aacute;mites</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:cargar_contenido('contenido_principal','empleado/vista_empleado_listar.php')" class="nav-link">
                 <i class="nav-icon fas fa-user-friends"></i>
                <p> Empleados </p>
              </a>
            </li>
            <!--<li class="nav-item">
                <a href="javascript:cargar_contenido('contenido_principal','anuncio/vista_anuncio_listar.php')" class="nav-link">
                    <i class="nav-icon fas fa-bullhorn"></i>
                       <p> Anuncios </p>
                 </a>
            </li>-->
          <?php
          }
          if ($_SESSION['tipo_usuario_sistematramite'] != 'Administrador') {
          ?>
            <li class="nav-item">
              <a href="javascript:cargar_contenido('contenido_principal','documento/vista_documento_secretaria_listar.php')" class="nav-link">
                <i class="nav-icon fa fa-file-signature"></i>
                <p> Tr&aacute;mites Recibidos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:cargar_contenido('contenido_principal','documento/vista_documentos_listar_enviados.php')" class="nav-link">
                <i class="nav-icon fa fa-file-signature"></i>
                <p> Documentos Enviados</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:cargar_contenido('contenido_principal','documento/vista_documentos_reportes.php')" class="nav-link">
                <i class="nav-icon fa fa-print"></i>
                <p> Reportes</p>
              </a>
            </li>
          <?php
          }
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <input type="text" value="<?php echo $_SESSION['tipo_usuario_sistematramite']; ?>" hidden id="txttipo_usuario_principal">
    <input type="text" value="<?php echo $_SESSION['usuario_sistematramite']; ?>" hidden id="txtnombre_principal_usuario">
    <input type="text" value="<?php echo $_SESSION['id_usuario_sistematramite']; ?>" hidden id="txtidusuario_principal_usuario">
    <input type="text" value="<?php echo $_SESSION['id_trabajador_sistematramite'];?>" id="txtidtrabajador_principal" hidden>
    <input type="text" id="txtidarea_principal" hidden>
    <div class="col-12">
      <div id="contenido_principal">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>BIENVENIDO AL SISTEMA</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php"> <i class="fa fa-home"></i> Inicio</a></li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <div class="col-lg-12" id="contenido_widget">
          <div class="row">
          <?php    if ($_SESSION['tipo_usuario_sistematramite'] == 'Administrador') {

          ?>
            <div class="col-lg-4">
                <div class="info-box" style="background: #C37D0E;color:#FFFFFF;">
                    <span class="info-box-icon" style="background: #C37D0E"><img src="img/documento-pendiente.svg" alt="" style="filter: brightness(0) invert(1);width:90%;padding-left:5px;"></span>                 
                        <div class="info-box-content" style="background: #C37D0E">
                            <span class="info-box-text"><b>N&deg; De Documentos</b></span>
                            <h1 style="font-size:lg;" id="admin_pendientes"><b>0</b></h1>
                                          
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span style="font-size:small">
                                <b>Documentos pendientes</b>
                            </span>
                        </div>
                                                      <!-- /.info-box-content -->
                </div>
            </div>  
            <div class="col-lg-4">
                <div class="info-box" style="background: #B4A53F;color:#FFFFFF;">
                    <span class="info-box-icon" style="background: #B4A53F"><img src="img/documento-aceptado.svg" alt="" style="filter: brightness(0) invert(1);width:90%;padding-left:5px;"></span>                 
                        <div class="info-box-content" style="background: #B4A53F">
                            <span class="info-box-text"><b>N&deg; De Documentos</b></span>
                            <h1 style="font-size:lg;" id="admin_aceptados"><b>0</b></h1>
                                          
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span style="font-size:small">
                                <b>Documentos Aceptados</b>
                            </span>
                        </div>
                                                      <!-- /.info-box-content -->
                </div>
            </div>       
            <div class="col-lg-4">
                <div class="info-box" style="background: #DC0321;color:#FFFFFF;">
                    <span class="info-box-icon" style="background: #DC0321"><img src="img/documento-rechazado.svg" alt="" style="filter: brightness(0) invert(1);width:90%;padding-left:5px;"></span>                 
                        <div class="info-box-content" style="background: #DC0321">
                            <span class="info-box-text"><b>N&deg; De Documentos</b></span>
                            <h1 style="font-size:lg;" id="admin_rechazados"><b>0</b></h1>
                                          
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span style="font-size:small">
                                <b>Documentos Rechazados</b>
                            </span>
                        </div>
                                                      <!-- /.info-box-content -->
                </div>
            </div>  
          <?php }else{?>
            <div class="col-lg-4">
                <div class="info-box" style="background: #C37D0E;color:#FFFFFF;">
                    <span class="info-box-icon" style="background: #C37D0E"><img src="img/documento-pendiente.svg" alt="" style="filter: brightness(0) invert(1);width:90%;padding-left:5px;"></span>                 
                        <div class="info-box-content" style="background: #C37D0E">
                            <span class="info-box-text"><b>N&deg; De Documentos</b></span>
                            <h1 style="font-size:lg;" id="area_pendientes"><b>0</b></h1>
                                          
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span style="font-size:small">
                                <b>Documentos pendientes</b>
                            </span>
                        </div>
                                                      <!-- /.info-box-content -->
                </div>
            </div>  
            <div class="col-lg-4">
                <div class="info-box" style="background: #B4A53F;color:#FFFFFF;">
                    <span class="info-box-icon" style="background: #B4A53F"><img src="img/documento-aceptado.svg" alt="" style="filter: brightness(0) invert(1);width:90%;padding-left:5px;"></span>                 
                        <div class="info-box-content" style="background: #B4A53F">
                            <span class="info-box-text"><b>N&deg; De Documentos</b></span>
                            <h1 style="font-size:lg;" id="area_aceptados"><b>0</b></h1>
                                          
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span style="font-size:small">
                                <b>Documentos Aceptados</b>
                            </span>
                        </div>
                                                      <!-- /.info-box-content -->
                </div>
            </div>       
            <div class="col-lg-4">
                <div class="info-box" style="background: #DC0321;color:#FFFFFF;">
                    <span class="info-box-icon" style="background: #DC0321"><img src="img/documento-rechazado.svg" alt="" style="filter: brightness(0) invert(1);width:90%;padding-left:5px;"></span>                 
                        <div class="info-box-content" style="background: #DC0321">
                            <span class="info-box-text"><b>N&deg; De Documentos</b></span>
                            <h1 style="font-size:lg;" id="area_rechazados"><b>0</b></h1>
                                          
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%">
                                </div>
                            </div>
                            <span style="font-size:small">
                                <b>Documentos Rechazados</b>
                            </span>
                        </div>
                                                      <!-- /.info-box-content -->
                </div>
            </div>  
          <?php
          }
          ?>
          </div>
          <!-- inicio: ADS -->
                    <!--<div class="row">
                        <div class="col-sm-12 offset-sm-0 col-md-12 offset-md-0 col-lg-12 offset-lg-0 col-xl-4 offset-xl-4">
                            <div class="info-box" style="background: #2cb18c;color:#FFFFFF;">
                                <span class="info-box-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="height: 120px;width: 120px;filter: brightness(0) invert(1);width:100%;padding-left:5px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                                    </svg>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><b>ANUNCIOS</b></span>
                                    <h1 style="font-size:20px;" id="ads_titulo"><b>Ninguno</b></h1>
                                    <p id="ads_descripcion">ninguno</p>
                                    <span style="font-size:small">
                                        <b><div id="ads_descarga"></div></b>
                                    </span>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    fin: ADS -->
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <label style="color: #9B0000" id="lb_area">Administrador Principal</label>
    </div>
    <strong>© <a href="https://muniurubamba.gob.pe/" target="_blank">Municipalidad Provincial de Urubamba - Tramite Documentario</a></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="_Plantilla/plugins/jquery/jquery.min.js"></script>
<script src="_Plantilla/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="_Plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="_Plantilla/dist/js/adminlte.min.js"></script>
<script src="_Plantilla/plugins/moment/moment.min.js"></script>
<script src="_Plantilla/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="js/console_usuario.js?rev=<?php echo time();?>"></script>
<script src="js/sweetalert2.js"></script>
<script src="_Plantilla/plugins/daterangepicker/daterangepicker.js"></script>
<script src="_Plantilla/plugins/select2/js/select2.full.min.js"></script>
<script src="_Plantilla/plugins/summernote/summernote-bs4.min.js"></script>
<link rel="stylesheet" href="_Plantilla/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="_Plantilla/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="_Plantilla/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<script src="_Plantilla/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="_Plantilla/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="_Plantilla/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="_Plantilla/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="_Plantilla/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
    //buscar_orden_externo();
  });
</script>
<div class="modal fade bs-example-modal-lg" id="modal_cuenta"  style="padding:50px 0">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="mimodal_registrar"><label>Configuraci&oacute;n de la Cuenta</label></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form-horizontal" id="formulario_usuario"  onsubmit="return false" autocomplete="false">
            <div class="box-body">
              <div class="">
                <div class="form-group row">
                  <label class="col-sm-4 control-label label_modificado">Tipo Usuario</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" style="background:#fff;font-weight:bold;" value="<?php echo $_SESSION['tipo_usuario_sistematramite'] ?>" disabled="" id="tipo_usuario" placeholder="Tipo Usuario" maxlength="40">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label label_modificado">Usuario</label>
                  <div class="col-sm-7">
                    <input type="text" id="txtoriginal" value="" hidden='true'>
                    <input type="text"  style="background:#fff;font-weight:bold;" id="txtusuario" class="form-control" value="<?php echo $_SESSION['usuario_sistematramite'] ?>" disabled=""  placeholder="Usuario" maxlength="30">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label label_modificado"> Actual</label>
                  <div class="col-sm-7">
                    <input type="password" class="form-control" onkeypress="return soloNroDocumento(event)" id="txtactual" placeholder="Clave Actual" maxlength="30">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label label_modificado">Nueva </label>
                  <div class="col-sm-7">
                    <input type="password" class="form-control" onkeypress="return soloNroDocumento(event)" id="txtnueva" placeholder="Nueva Clave" maxlength="30">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label label_modificado">Repetir Contrase&ntilde;a Nueva</label>
                  <div class="col-sm-7">
                    <input type="password" class="form-control" onkeypress="return soloNroDocumento(event)" id="txtrepetir" placeholder="repetir Clave nueva" maxlength="30">
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
          </form>  
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
           <button type="button" style="cursor:pointer;" onclick="Editar_cuenta();" class="btn btn-sm btn-success"><i class="fa fa-pen-alt"></i><b>&nbsp;Actualizar</b>&nbsp;</button>&nbsp;&nbsp;
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_perfil" >
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content form-horizontal" >
            <div class="modal-header">
              <h4 class="modal-title"><label id="label_empleado" ><b>EDITAR DATOS PERSONALES</b></label></h4>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="">
                <div class="modal-body" style="overflow:auto;height:400px;">
                    <div class="col-lg-12 row">
                        <div class="col-lg-4">
                            <label>Nº Documento Identidad (*):</label>
                            <input class="form-control" type="text" placeholder="Ingresar dni" maxlength="8" id="txtdni_perfil" onkeypress="return soloNumeros(event)"><br>
                        </div>
                        <div class="col-lg-8">
                            <label>Nombre  (*):</label>
                            <input class="form-control" type="text" placeholder="Ingresar nombre" maxlength="150" id="txtnombre_perfil" onkeypress="return soloLetras(event)"><br>
                        </div>
                        <div class="col-lg-6">
                            <label>Apellido Paterno  (*):</label>
                            <input class="form-control" type="text" placeholder="Ingresar apellido paterno" maxlength="150" id="txtapepat_perfil" onkeypress="return soloLetras(event)"><br>
                        </div>
                        <div class="col-lg-6">
                            <label>Apellido Paterno  (*):</label>
                            <input class="form-control" type="text" placeholder="Ingresar apellido materno" maxlength="150" id="txtapemat_perfil" onkeypress="return soloLetras(event)"><br>
                        </div>
                        <div class="col-lg-6">
                            <label>Fecha Nacimiento (*):</label>
                            <div class="input-group date" id="txt_fecha_perfil" data-target-input="nearest">
                              <input type="text" name="txt_fechanacimiento_perfil" id="txt_fechanacimiento_perfil" class="form-control datetimepicker-input" data-target="#txt_fecha_perfil" data-toggle="datetimepicker"/>
                              <div class="input-group-append" data-target="#txt_fecha_perfil" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Celular:</label>
                            <input class="form-control" onkeypress="return soloNumeros(event)" type="text" placeholder="Ingresar nro de celular" maxlength="9" id="txtcelular_perfil"><br>
                        </div>
                        <div class="col-lg-6">
                            <label>Email:</label>
                            <input class="form-control" onkeypress="return soloNroDocumento(event)" type="text" placeholder="Ingresar email" maxlength="250" id="txtemail_perfil"><br>
                        </div>
                        <div class="col-lg-6">
                            <label>Tipo usuario (*):</label>
                            <input class="form-control" disabled onkeypress="return soloNumerosyletras(event)" type="text" placeholder="Ingresar tipo usuario" style="font-weight: bold;background-color: white;" maxlength="250" value="<?php echo $_SESSION['tipo_usuario_sistematramite'] ?>"><br>
                        </div>
                        <div class="col-lg-12" >
                          <label>Direcci&oacute;n (*):</label>
                          <input class="form-control" onkeypress="return soloNumerosyletras(event)" type="text" placeholder="Ingresar direcci&oacute;n" id="txt_direccion_perfil" maxlength="250" ><br>
                        </div>
                        <div class="col-lg-12" style="text-align: left;font-weight: bold;color: #9B0000">
                            Campos Obligatorios (*)
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <div class="form-group">
                <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
                 <button type="button" style="cursor:pointer;" onclick="Editar_Perfil();" class="btn btn-sm btn-success"><i class="fa fa-pen-alt"></i><b>&nbsp;Actualizar Perfil</b>&nbsp;</button>&nbsp;&nbsp;
              </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_foto_perfil" >
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content form-horizontal" >
            <div class="modal-header">
              <h4 class="modal-title"><label id="label_empleado" ><b>FOTO PERFIL</b></label></h4>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form autocomplete="false" method="POST" enctype="multipart/form-data" id="form_editar_foto">
              <div class="modal-body">
                <div class="col-lg-12" >
                  <div id="div_fotoperfil"style="width: 100%;height: auto;border:solid 0px #999;text-align:center; "></div>
                </div>
                <div class="col-md-12 form-group">
                  <label for="txt_archivo">Adjuntar documento (png, jpg, jpge) (*):</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file"  accept=".jpg,.png,.jpeg,.JPG,.PNG,.JPEG" class="custom-file-input form-control imagen" id="txt_archivo_foto" name="txt_archivo_foto">
                      <label class="custom-file-label" id="lb_archivo_foto" for="txt_archivo_foto">Seleccionar Archivo</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="form-group">
                  <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
                    <input type='text' hidden name='postID_principal'  id='postID_principal'>
                    <input type="text" hidden id="txtformato_foto" name="txtformato_foto">
                        <input type="text" value="<?php echo $_SESSION['id_trabajador_sistematramite'];?>" name="txt_idtrabajador_usuario" id="txt_idtrabajador_usuario" hidden>
                   <button style="cursor:pointer;" id="btn_subirfoto" onclick="editar_foto();" class="btn btn-sm btn-success"><i class="fa fa-pen-alt"></i><b>&nbsp;Actualizar Foto</b>&nbsp;</button>&nbsp;&nbsp;
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
</html>
<script type="text/javascript">
  traer_administrador();
  traer_idunico_principal();
  $('.imagen').on('change', function(){
    var ext = $( this ).val().split('.').pop();
    if ($( this ).val() != '') {
        if(ext == "JPG" || ext == "JPEG" || ext == "PNG" || ext == "jpg" || ext == "jpeg" || ext == "png" ){
          if($(this)[0].files[0].size > 1048576){
          }else{
          }
          $("#txtformato_foto").val(ext);
      }else{
          $( this ).val('');
          Swal.fire("Extensión no permitida: " + ext,"","error");
      }
    }
  });
  $(".form-control").on('paste', function(e){
    e.preventDefault();
  });
</script>
<?php
if ($_SESSION['tipo_usuario_sistematramite'] == 'Administrador') {
?>
<script type="text/javascript">
  Traer_Widget_Admin();
</script>
<?php
}else{
?>
<script type="text/javascript">
  var idarea = $("#txtidarea_principal").val();
  //alert(idarea);
  //Traer_Widget_Area(idarea);
</script>
<?php
}
?>
<style type="text/css">
  label{
    font-weight: bold;
    color: black;
  }
  a{
    font-weight: bold;
    color: black;
  }
  b, strong, i {
    font-weight: bold;
  }
</style>
<script type="text/javascript">
  $('#txt_fecha_perfil').datetimepicker({
    format: 'DD/MM/YYYY',
    //defaultDate: "11/1/2013",
    defaultDate: null,
    icons: {
        time: "far fa-clock",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
    }
  });
</script>
<script type="text/javascript">
  function cargar_contenido(contenedor,contenido){
    $("#"+contenedor).load(contenido);
  }
  function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
            element.innerHTML = "Time is up!";
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
}
  function soloNumerosyletrasDatapicker(e) {
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = "0123456456789-";
     especiales = "";

     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }
  function soloNumerosyletras(e) {
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456456789:/.,\@-_";
     especiales = "8-37-39-46-58";

     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }
  function soloNumeros(e){
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8){
          return true;
      }
      // Patron de entrada, en este caso solo acepta numeros
      patron =/[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
  }
  function soloLetras(e){
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = "8-37-39-46";
      tecla_especial = false
      for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }
      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }
  function soloNroDocumento(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz0123456456789\@-_+*/";
    especiales = "8-37-39-46-58";

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
  }
  $(function() {
  var menues = $(".nav-link"); 
      menues.click(function() {
      menues.removeClass("active");
      $(this).addClass("active");
  });
});
</script>
<style>
  .btn{
    font-weight: bold;
  }
  h1,h3{
    font-weight: bold !important;
  }
  small{
    font-weight: bold;
  }
</style>
<script type="text/javascript">
  function sesion() {
    Swal.fire("Tiempo agotado","<label style='color:#9B0000;font-weight:bold;'>Inicie sesion nuevamente<label>","error")
    .then ( ( value ) =>  {
      window.location='../index.php';
    }); 
  }
  $(".form-control").on('paste', function(e){
    e.preventDefault();
  });
</script>
<style type="text/css">
    @media (min-width:102px){
        .label_modificado{
          text-align: left;
        }
    }
    @media (min-width:580px){
        .label_modificado{
          text-align: right;
        }
    }
    @media (min-width:1600px){
        .label_modificado{
            text-align: right;
        }
    }
</style>