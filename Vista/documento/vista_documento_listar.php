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
<link rel="stylesheet" href="_Plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mantenimiento Tr&aacute;mite</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php" ><i class="fa fa-home"></i> Inicio</a></li>
          <li class="breadcrumb-item active"> Tr&aacute;mite</li>
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
            <h3 class="card-title">Listado de los Tr&aacute;mites</h3>
            <button class="btn btn-blue btn-sm float-right" href="version-imprimir.pdf"  value="Print this page" onclick="window.print();" ><i class="fas fa-print"></i>&nbsp;IMPRIMIR REPORTE</button>
            <button class="btn btn-danger btn-sm float-right" id="btn_registrar" onclick="cargar_contenido('contenido_principal','documento/vista_documento_registro.php')"><i class="fas fa-plus"></i>&nbsp;Nuevo registro</button>
          </div>
          <div class="card-body" style="color:#000000;font-size:small;">
            <div id="div_estado">
              <div class="row">
                <div class="col-3 form-group" style="text-align: right;">
                  <label>Estado:</label>
                </div>
                <div class="col-6 form-group">
                  <select class="select2-purple select2" name="combo_estado" data-dropdown-css-class="select2-purple" id="combo_estado" style="width: 100%;">
                    <option value="%">TODOS</option>
                    <option>PENDIENTE</option>
                    <option>RECHAZADO</option>
                    <option>FINALIZADO</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="table-responsive" > 
              <input type="text" id="txt_tipousuario" hidden value="<?php echo $_SESSION['tipo_usuario_sistematramite'] ?>">
              <table id="tabla_documento" style="table-layout:fixed;width: 100%" class="table tabel-display table-nowrap">
                <thead>
                  <tr>
                    <th style="text-align: center;width: 60px;word-wrap: break-word;">Nro Seguimiento</th>
                    <th style="text-align: center;width: 60px;word-wrap: break-word;">Nro Documento</th>
                    <th style="width: 50px;word-wrap: break-word;">Tipo Documento</th>
                    <th style="width: 40px;word-wrap: break-word;">DNI Remi.</th>
                    <th style="width: 100px;word-wrap: break-word;">Datos Remitente</th>
                    <th style="text-align: center;width: 50px;word-wrap: break-word;">Mas Datos</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Seguimiento</th>
                    <th style="text-align: left;width: 50px;word-wrap: break-word;">Origen</th>
                    <th style="text-align: left;width: 50px;word-wrap: break-word;">Localizado en</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Estado del Doc.</th>
                    <!--<th style="text-align: left;width: 20px;word-wrap: break-word;"></th>-->
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <tr>
                    <th style="text-align: center;width: 60px;word-wrap: break-word;">Nro Seguimiento</th>
                    <th style="text-align: center;width: 60px;word-wrap: break-word;">Nro Documento</th>
                    <th style="width: 50px;word-wrap: break-word;">Tipo Documento</th>
                    <th style="width: 40px;word-wrap: break-word;">DNI Remi.</th>
                    <th style="width: 100px;word-wrap: break-word;">Datos Remitente</th>
                    <th style="text-align: center;width: 50px;word-wrap: break-word;">Mas Datos</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Seguimiento</th>
                    <th style="text-align: left;width: 50px;word-wrap: break-word;">Origen</th>
                    <th style="text-align: left;width: 50px;word-wrap: break-word;">Localizado en</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Estado del Doc.</th>
                    <!--<th style="text-align: left;width: 20px;word-wrap: break-word;"></th>-->
                  </tr>
                </tfoot>
              </table>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade bs-example-modal-lg" id="modal_ver_documento">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content card-danger">
      <div class="modal-body" >
        <form class="form-horizontal" onsubmit="return false" autocomplete="false">
          <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Documento</h3>
            <ul class="nav nav-pills ml-auto p-2">
              <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Informaci&oacute;n</a></li>
              <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Datos Remitente</a></li>
              <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Archivo Principal</a></li>
            </ul>
          </div>
          <div class="card-body" style="padding: 0rem;">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="col-12 ">
                  <div class="row">
                    <div class="col-md-12 form-group"><br>
                      <label>Tipo Documento (*):</label>
                      <select class="select2-danger select2" name="cmb_tipodocumento_ver" data-dropdown-css-class="select2-danger" id="cmb_tipodocumento_ver" style="width: 100%;">
                      </select>
                    </div>
                    <div class="col-md-6 form-group">
                      <label>Nº Documento (*):</label>
                      <input type="text"  class="form-control" id="txt_nrodocumentos_ver" readonly style="background-color: white;" name="txt_nrodocumentos" placeholder="Ingrese nro del documento">
                    </div>
                    <div class="col-md-6 form-group">
                      <label>Nº Folios (*):</label>
                      <input type="text" class="form-control" id="txt_folios_ver" readonly style="background-color: white;" name="txt_folios" placeholder="Ingrese nro de hojas">
                    </div>
                    <div class="col-md-12 form-group">
                      <label>Asunto del Tr&aacute;mite (*):</label>
                      <textarea rows="2" name="txt_asunto" id="txt_asunto_ver" readonly style="background-color: white;resize: none" class="form-control"  maxlength="255" placeholder="Asunto del documento"></textarea>
                    </div>
                    <div class="col-lg-12" style="text-align:left;font-weight:bold;color: #9B0000">
                      Campos Obligatorios (*)
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab_2">
                  <div class="col-12 form-group">
                    <div class="row">
                      <div class="col-lg-4 form-group"><br>
                          <label>Nº DNI (*):</label>
                          <input class="form-control" type="text" readonly style="background-color: white;" placeholder="Ingresar dni" maxlength="8" id="txtdni" name="txtdni" onkeypress="return soloNumeros(event)">
                      </div>
                      <div class="col-lg-8 form-group"><br>
                          <label>Nombre y Apellidos  (*):</label>
                          <input class="form-control" type="text" readonly style="background-color: white;" placeholder="Ingresar nombre y apellidos" maxlength="250" id="txtdatos" name="txtnombre" onkeypress="return soloLetras(event)">
                      </div>
                      <div class="col-lg-6 form-group">
                          <label>Celular:</label>
                          <input class="form-control" readonly style="background-color: white;" onkeypress="return soloNumeros(event)" type="text" placeholder="Ingresar nro de celular" maxlength="9" id="txtcelular" name="txtcelular">
                      </div>
                      <div class="col-lg-6 form-group">
                          <label>Email (*):</label>
                          <input class="form-control" readonly style="background-color: white;" onkeypress="return soloNumerosyletras(event)" type="text" placeholder="Ingresar email" maxlength="250" id="txtemail" name="txtemail">
                      </div>
                      <div class="col-lg-12 form-group" >
                        <label>Direcci&oacute;n (*):</label>
                        <input class="form-control" readonly style="background-color: white;" onkeypress="return soloNumerosyletras(event)" type="text" placeholder="Ingresar direcci&oacute;n" id="txt_direccion" name="txt_direccion" maxlength="255" >
                      </div>
                      <!-->
                      <div class="col-md-12">
                        <div class="col-12 row">
                           <label>En representacion de (*):</label>
                        </div>
                        <div class="col-12 row">
                          <input type="text" hidden id="txt_representacion" name="txt_representacion">
                          <div class="col-4 form-group clearfix">
                            <div class="icheck-danger d-inline">
                              <input type="radio" id="rad_representacion1" value="A Nombre Propio" disabled name="r1" checked>
                              <label for="rad_representacion1" style="font-size: 15px !important;font-weight: normal;"> A Nombre Propio </label>
                            </div>
                          </div>
                          <div class="col-4 form-group clearfix">
                            <div class="icheck-primary d-inline">
                              <input type="radio" id="rad_representacion2" value="A otra Persona Natural" disabled name="r1">
                              <label for="rad_representacion2" style="font-size: 15px !important;font-weight: normal;">A otra Persona Natural</label>
                            </div>
                          </div>
                          <div class="col-4 form-group clearfix">
                            <div class="icheck-success d-inline">
                              <input type="radio" id="rad_representacion3" value="Persona Jurídica" disabled name="r1">
                              <label for="rad_representacion3" style="font-size: 15px !important;font-weight: normal;">Persona Jur&iacute;dica</label>
                            </div>
                          </div>
                        </div>
                      </div></-->
                      <div id="div_juridico"  class="col-12" style="display: none;">
                        <div class="row">
                          <div class="col-md-4 form-group">
                            <label>RUC (*):</label>
                            <input type="text" id="txt_ruc" name="txt_ruc" readonly style="background-color: white;" maxlength="12"  onkeypress="return soloNumeros(event)" placeholder="Ingresar ruc" class="form-control">
                          </div>
                          <div class="col-md-8 form-group">
                            <label>Empresa (*):</label>
                            <input type="text" id="txt_empresa" readonly style="background-color: white;" onkeypress="return soloNumerosyletras(event)" name="txt_empresa" placeholder="Ingresar datos de la empresa" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12" style="text-align: left;font-weight: bold;color: #9B0000">
                          Campos Obligatorios (*)
                      </div>
                    </div>
                  </div>
              </div>
              <div class="tab-pane" id="tab_3">
                <div class="col-12 form-group">
                  <br>
                  <div id="div_archivo"></div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_datos_seguimiento">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="mimodal_registrar"><label>Seguimiento del Tr&aacute;mite <label style="color: #9B0000;font-weight: bold;" id="txt_nroseguimiento"></label></label></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" onsubmit="return false" autocomplete="false">
          <div class="box-body" >
            <div class="col-12">
              <div class="table-responsive">
                <table id="tabla_documento_seguimiento" style="table-layout:fixed;width: 100%" class="table tabel-display table-nowrap">
                  <thead>
                    <tr>
                      <th style="text-align: center;width: 60px;word-wrap: break-word;">#</th>
                      <th style="text-align: left;width: 70px;word-wrap: break-word;">Procedencias</th>
                      <th style="text-align: center;width: 60px;word-wrap: break-word;">Fecha</th>
                      <th style="text-align: left;width: 150px;word-wrap: break-word;">Descripci&oacute;n</th>
                      <th style="text-align: center;width: 100px;word-wrap: break-word;">Archivo Anexado</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th style="text-align: center;width: 60px;word-wrap: break-word;">#</th>
                      <th style="text-align: left;width: 70px;word-wrap: break-word;">Procedencias</th>
                      <th style="text-align: center;width: 60px;word-wrap: break-word;">Fecha</th>
                      <th style="text-align: left;width: 150px;word-wrap: break-word;">Descripci&oacute;n</th>
                      <th style="text-align: center;width: 100px;word-wrap: break-word;">Archivo Anexado</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </form>  
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_registrar_derivar">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="mimodal_registrar"><label>Derivar o Finalizar Tr&aacute;mite: <label id="lb_nrodocumento_derivar" style="color:#9B0000;margin-bottom: .0rem;"></label></label></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" onsubmit="return false" autocomplete="false">
          <div class="box-body" >
            <div class=" col-12">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Fecha Registro:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background-color: white;"><i class="fa fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" id="txt_fecharegistro" style="background-color: white;font-weight: bold;text-align: center;color: #9B0000;" class="form-control">
                  </div>
                  <input type="text" hidden id="txt_iddocumento_derivar"> 
                  <input type="text" hidden id="txt_idmovimiento_derivar"> 
                  <input type="text" hidden id="txt_idarea_derivar"> 
                </div>
                <div class="col-md-6 form-group">
                  <label>Acci&oacute;n (*):</label>
                  <select class="select2-danger select2" name="combo_estatus_derivar" data-dropdown-css-class="select2-danger" id="combo_estatus_derivar" style="width: 100%;">
                    <option value="DERIVADO">DERIVAR</option>
                    <option value="FINALIZADO">FINALIZAR</option>
                  </select>
                </div>
                <div class="col-6 form-group div_datos_derivar">
                  <label>&Aacute;rea Origen (*):</label>
                  <input type="text" id="txt_area_origen_derivar" readonly style="text-align: center;background-color: white;font-weight:bold;" class="form-control">
                </div>
                <div class="col-6 form-group div_datos_derivar">
                  <label>&Aacute;rea Destino (*):</label>
                  <select class="select2-purple select2" name="combo_area_derivar" data-dropdown-css-class="select2-purple" id="combo_area_derivar" style="width: 100%;">
                  </select>
                </div>
                <div class="col-md-12 form-group">
                  <label>Descripci&oacute;n (*):</label>
                  <textarea rows="2" name="txt_descripcion_derivar" id="txt_descripcion_derivar" style="background-color: white;resize: none" class="form-control"  maxlength="105" placeholder="Ingresar descripci&oacute;n"></textarea>
                </div>
                <div class="col-lg-12" style="text-align:left;font-weight:bold;color: #9B0000">
                  Campos Obligatorios (*)
                </div>
              </div>
            </div>
          </div>
        </form>  
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
          <button type="button" style="cursor:pointer;" onclick="derivar_finalizar_tramite();" class="btn btn-sm btn-success"><i class="fa fa-retweet"></i><b>&nbsp;<label style="color: white;margin-bottom: .0rem;cursor: pointer;" id="lb_titulo_derivar">Derivar</label> Tr&aacute;mite</b>&nbsp;</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="js/console_tramite.js?rev=<?php echo time();?>"></script>
<script>
  $(".select2").select2();
  listar_documentos_admin();
  var area = $("#txtidarea_principal").val();
  if (area=="1") {
    document.getElementById('div_estado').style.display="none";
  }else{
    document.getElementById('div_estado').style.display="block";
  }
  
  $(".form-control").on('paste', function(e){
    e.preventDefault();
  });
  $("#combo_estado").change(function(){
    listar_documentos_admin();
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
.select2{
    font-weight:bold;
    text-align-last:center;
  }
</style>
