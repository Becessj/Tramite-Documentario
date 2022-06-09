<?php
  session_start();
  if(isset($_SESSION['tiempo_sistema']) ) {
    if($_SESSION['tiempo_sistema'] < time())
    {
        session_destroy();
        echo "<script>sesion();</script>";
    }else{
      $_SESSION['tiempo_sistema'] = time()+1800;
    }
  }
  if (!isset($_SESSION['id_usuario_sistematramite'])) {
      echo "<script>sesion();</script>";
  }
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mantenimiento Usuario</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php" ><i class="fa fa-home"></i> Inicio</a></li>
          <li class="breadcrumb-item active"> Usuario</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listado de los Usuarios</h3>
            <button class="btn btn-danger btn-sm float-right" onclick="abrirModalRegistro()"><i class="fas fa-plus"></i>&nbsp;Nuevo registro</button>
          </div>
          <div class="card-body" style="color:#000000;font-size:small;">
            <div class="table-responsive" > 
              <table id="tabla_usuario" style="table-layout:fixed;width: 100%" class="table tabel-display table-nowrap">
                <thead>
                  <tr>
                    <th style="text-align: center;width: 30px;word-wrap: break-word;">#</th>
                    <th style="width: 50px;word-wrap: break-word;">Usuario</th>
                    <th style="width: 70px;word-wrap: break-word;">Tipo usuario</th>
                    <th style="width: 100px;word-wrap: break-word;">Datos empleado</th>
                    <th style="width: 80px;word-wrap: break-word;">&Aacute;rea</th>
                    <th style="text-align: center;width: 50px;word-wrap: break-word;">Clave</th>
                    <th style="text-align: center;width: 50px;word-wrap: break-word;"></th>
                    <th style="text-align: center;width: 60px;word-wrap: break-word;"></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <tr>
                    <th style="text-align: center;width: 30px;word-wrap: break-word;">#</th>
                    <th style="width: 50px;word-wrap: break-word;">Usuario</th>
                    <th style="width: 70px;word-wrap: break-word;">Tipo usuario</th>
                    <th style="width: 100px;word-wrap: break-word;">Datos empleado</th>
                    <th style="width: 80px;word-wrap: break-word;">&Aacute;rea</th>
                    <th style="text-align: center;width: 50px;word-wrap: break-word;">Clave</th>
                    <th style="text-align: center;width: 50px;word-wrap: break-word;"></th>
                    <th style="text-align: center;width: 60px;word-wrap: break-word;"></th>
                  </tr>
                </tfoot>
              </table>
            </div> 
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</section>
<div class="modal fade bs-example-modal-lg" id="modal_editar_usuario"  style="padding:50px 0">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="mimodal_registrar"><label>Editar datos del Usuario</label></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" onsubmit="return false" autocomplete="false">
          <div class="box-body" >
            <div class="">
              <div class="form-group row">
                <input type="text" hidden id="txt_idsuario"> 
                <label class="col-sm-4 control-label label_modificado">Tipo Usuario</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" style="background:#fff;font-weight:bold;" disabled="" id="txt_tipousuario" placeholder="Tipo Usuario" maxlength="40">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label label_modificado">Usuario</label>
                <div class="col-sm-7">
                  <input type="text" id="txtoriginal" value="" hidden='true'>
                  <input type="text"  style="background:#fff;font-weight:bold;" id="txt_usuario" class="form-control" disabled="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label label_modificado" style=""> Empleado</label>
                <div class="col-sm-7">
                  <textarea rows="2" style="background:#fff;font-weight:bold;resize: none" id="txt_empleado" class="form-control" disabled=""></textarea>
                </div>
              </div>
              <div class="form-group row" style="font-weight: bold;">
                <label class="col-sm-4 control-label label_modificado">&Aacute;rea </label>
                <div class="col-sm-7">
                  <select class="select2-danger select2" data-dropdown-css-class="select2-danger" id="cmb_area" style="width: 100%;">
                  </select>
                </div>
              </div>
            </div>
          </div>
        </form>  
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
          <button type="button" style="cursor:pointer;" onclick="editar_usuario();" class="btn btn-sm btn-success"><i class="fa fa-pen-alt"></i><b>&nbsp;Actualizar</b>&nbsp;</button>&nbsp;&nbsp;
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_registro_usuario" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b>Registro Usuario</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form-horizontal" onsubmit="return false" autocomplete="false">
          <div class="col-12 row">
            <div class="col-md-6 form-group">
              <label>Usuario (*):</label>
              <input type="text" id="txt_usuario_registro" onkeypress="return soloNroDocumento(event)" class="form-control" placeholder="Ingrese usuario">
            </div>
            <div class="col-md-6 form-group">
              <label>Contrase&ntilde;a (*):</label>
              <input type="password" id="txt_clave_registro" onkeypress="return soloNroDocumento(event)" class="form-control" placeholder="Ingrese password">
            </div>
            <div class="col-md-12 form-group">
              <label style="text-align: right;">Empleado (*):</label>
              <select class="select2-purple select2 is-invalid-sin-icon" data-dropdown-css-class="select2-purple" id="cmb_empleado_registro" name="cmb_empleado_registro" style="width: 100%;">
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>&Aacute;rea (*)</label>
              <select class="select2-danger select2" data-dropdown-css-class="select2-danger" name="cmb_area_registro" id="cmb_area_registro" style="width: 100%;">
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>Rol (*)</label>
              <select class="select2-danger select2" data-dropdown-css-class="select2-danger" id="cmb_rol" style="width: 100%;">
                <option value="Secretario (a)">SECRETARIO (A)</option>
              </select>
            </div>
            <div class="col-lg-12 form-group" style="text-align: left;font-weight: bold;color: #9B0000">
              Campos Obligatorios (*)
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
          <button type="button" style="cursor:pointer;" onclick="registrar_usuario();" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i><b>&nbsp;Registrar</b>&nbsp;</button>&nbsp;&nbsp;
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_configuracion" >
    <div class="modal-dialog">
        <div class="modal-content form-horizontal" >
            <div class="modal-header">
              <h4 class="modal-title"><b>CONFIGURACI&Oacute;N</b></h4>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <input type="text" hidden id="txt_idsuario_configuracion">
                      <label>Usuario</label>
                      <div class="form-group">
                        <input type="text" id="txt_usuario_configuracion" class="form-control" style="background-color: white;" disabled>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label>Empleado</label>
                      <div class="form-group">
                        <input type="text" id="txt_empleado_configuracion" class="form-control" style="background-color: white;" disabled>
                      </div>
                    </div>
                    <div class="col-lg-12 ">
                      <label>Ingresar nueva Contrase&ntilde;a</label>
                      <input class="form-control" type="password" placeholder="Ingresar consistencia" id="txt_clave_configuracion" onkeypress="return soloNumeros(event)"><br>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <div class="form-group">
                <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
                 <button type="button" style="cursor:pointer;" onclick="Modificar_Clave();" class="btn btn-sm btn-success"><i class="fa fa-pen-alt"></i><b>&nbsp;Actualizar</b>&nbsp;</button>&nbsp;&nbsp;
              </div>
            </div>
        </div>
    </div>
</div>
<script src="js/console_usuario.js?rev=<?php echo time();?>"></script>
<script>
  listar_usuario_admin();
  $(".select2").select2();
  /*$('.tags').select2({
      containerCssClass: " is-invalid-sin-icon"
  });*/
  combo_area();
  combo_empleado();
  $(".form-control").on('paste', function(e){
    e.preventDefault();
  });
  
</script>
<style type="text/css">
  .is-invalid-sin-icon {
    border-color: #dc3545 !important;
    padding-right: 2.25rem !important;
    background-repeat: no-repeat;
    background-position: right calc(.375em + .1875rem) center;
    background-size: calc(.75em + .375rem) calc(.75em + .375rem);
}

</style>
