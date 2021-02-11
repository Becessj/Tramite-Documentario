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
<div id="contador" style="position: absolute;right: 0px;top: -57px;" class="countdown"></div>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-file-excel"></i>Exportar a Excel por fecha y estado</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php" ><i class="fa fa-home"></i> Inicio</a></li>
          <li class="breadcrumb-item active"> Tr&aacute;mite recibidos</li>
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
            <div class="btn btn-danger btn-sm float-sm-right" id="btn_registrar" name="generar_reporte"><form method="post" class="form" action="/repexcel/reporte.php">
              <select class="select2-purple select2" name="combo_estado" data-dropdown-css-class="select2-purple" id="combo_estado" name="combo_estado" style="width: 100%;">
                    <option value="%">TODOS</option>
                    <option value="PENDIENTE">PENDIENTE</option>
                    <option value="RECHAZADO">RECHAZADO</option>
                    <option value="FINALIZADO">FINALIZADO</option>
                  </select>&nbsp;
              <font color="">Desde: </font><input type="date" name="fecha1" required>
              <font color="">Hasta: <input type="date" name="fecha2" value="<?php echo date("Y-m-d");?>" required>
              <input type="submit" name="generar_reporte" value="Exportar Excel" >
              
            </form></div>
          </div>
          <div class="card-body" style="color:#000000;font-size:small;">
            <div id="div_estado">
              <div class="row">
                <div class="col-6 form-group">
                  <!--<select class="select2-purple select2" name="combo_estado" data-dropdown-css-class="select2-purple" id="combo_estado" style="width: 100%;">
                    <option value="%">TODOS</option>
                    <option value="PENDIENTE">PENDIENTE</option>
                    <option value="ACEPTADO">ACEPTADO</option>
                    <option value="RECHAZADO">RECHAZADO</option>
                    <option value="DERIVADO">DERIVADO</option>
                    <option value="FINALIZADO">FINALIZADO</option>
                  </select>-->
                </div>
              </div>
            </div>
            
            <div class="table-responsive" > 
              <input type="text" id="txt_tipousuario" hidden value="<?php echo $_SESSION['tipo_usuario_sistematramite'] ?>">
              <table id="tabla_documento" style="table-layout:fixed;width: 100%" class="table tabel-display table-nowrap">
                <thead>
                  <tr>
                    <th style="text-align: center;width: 50px;word-wrap: break-word;">Nro Seguimiento</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Nro Documento</th>
                    <th style="width: 50px;word-wrap: break-word;">Tipo Documento</th>
                    <th style="width: 40px;word-wrap: break-word;">DNI Remi.</th>
                    <th style="width: 100px;word-wrap: break-word;">Datos Remitente</th>
                    <th style="text-align: center;width: 30px;word-wrap: break-word;">Mas Datos</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Seguimiento</th>
                    <th style="text-align: center;width: 50px;word-wrap: break-word;">Origen</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Estado del Doc. en &Aacute;rea</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Acci&oacute;n</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <tr>
                    <th style="text-align: center;width: 50px;word-wrap: break-word;">Nro Seguimiento</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Nro Documento</th>
                    <th style="width: 50px;word-wrap: break-word;">Tipo Documento</th>
                    <th style="width: 40px;word-wrap: break-word;">DNI Remi.</th>
                    <th style="width: 100px;word-wrap: break-word;">Datos Remitente</th>
                    <th style="text-align: center;width: 30px;word-wrap: break-word;">Mas Datos</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Seguimiento</th>
                    <th style="text-align: center;width: 50px;word-wrap: break-word;">Origen</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Estado del Doc. en &Aacute;rea</th>
                    <th style="text-align: center;width: 40px;word-wrap: break-word;">Acci&oacute;n</th>
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
                      </div>
                      
                      
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
      <form autocomplete="false" method="POST" enctype="multipart/form-data" id="form_derivar_finalizar_tramite">
        <div class="modal-body">
            <div class="box-body" >
              <div class=" col-12">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Fecha Registro:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="background-color: white;"><i class="fa fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" id="txt_fecharegistro" name="txt_fecharegistro" style="background-color: white;font-weight: bold;text-align: center;color: #9B0000;" class="form-control">
                    </div>
                    <input type="text" hidden id="txt_iddocumento_derivar" name="txt_iddocumento_derivar"> 
                    <input type="text" hidden id="txt_idmovimiento_derivar" name="txt_idmovimiento_derivar"> 
                    <input type="text" hidden id="txt_idarea_derivar" name="txt_idarea_derivar"> 
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
                    <input type="text" id="txt_area_origen_derivar" name="txt_area_origen_derivar" readonly style="text-align: center;background-color: white;font-weight:bold;" class="form-control">
                  </div>
                  <div class="col-6 form-group div_datos_derivar">
                    <label>&Aacute;rea Destino (*):</label>
                    <select class="select2-purple select2" name="combo_area_derivar" data-dropdown-css-class="select2-purple" id="combo_area_derivar" style="width: 100%;">
                    </select>
                  </div>
                  <div class="col-md-12 form-group div_datos_derivar">
                    <label for="txt_archivo">Adjuntar documento (pdf,docx):</label>
                    <input type='text' name='postID' hidden id='postID'>
                    <input type="text" style="display: none;" id="txtformato" name="txtformato">
                    <input type="text" value="<?php echo $_SESSION['id_usuario_sistematramite']; ?>" hidden id="txtidusuario_derivar" name="txtidusuario_derivar">
                    <input type="text" hidden name="cmb_tipodocumento_derivar" id="cmb_tipodocumento_derivar" placeholder="cmb_tipodocumento">
                    <input type="text" hidden name="txt_nrodocumentos_derivar" id="txt_nrodocumentos_derivar" placeholder="txt_nrodocumentos">
                    <input type="text" hidden name="txtdni_derivar" id="txtdni_derivar" placeholder="txtdni">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" accept=".pdf,.PDF,.docx" class="custom-file-input form-control" id="txt_archivo" name="txt_archivo">
                        <label class="custom-file-label" id="lb_archivo" for="txt_archivo">Seleccionar Archivo</label>
                      </div>
                    </div>
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
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <div id="div_a">
              <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
              <a style="cursor:pointer;color: white !important" type="button" id="btn_subir" onclick="derivar_finalizar_tramite();" class="btn btn-sm btn-success"><i class="fa fa-retweet"></i><b>&nbsp;<label style="color: white;margin-bottom: .0rem;cursor: pointer;" id="lb_titulo_derivar">Derivar</label> Tr&aacute;mite</b>&nbsp;</a>
            </div>
            <div id="div_b" style="display: none;">
              <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
              <button style="cursor:pointer;" id="btn_subir" onclick="derivar_finalizar_tramite();" class="btn btn-sm btn-success"><i class="fa fa-retweet"></i><b>&nbsp;<label style="color: white;margin-bottom: .0rem;cursor: pointer;" id="lb_titulo_derivar">Derivar</label> Tr&aacute;mite</b>&nbsp;</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_procesar_datos" style="top: 10%">
  <div class="modal-dialog modal-xl"  style="width: 75%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-clock-o"></i> ESPERE UNOS MOMENTOS PORFAVOR: LOS DATOS SE ESTAN PROCESANDO.</h4>
      </div>
      <div class="modal-body center-block"> 
        <div class="progress"  style="height: 30px;">
          <div class="progress-bar bg-primary progress-bar-striped" id="myBar" style="width: 0%;font-weight: bold;font-size: 15px" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
            <span class="sr-only">40% Complete (success)</span>
            <div class="progress-bar progress-bar-primary progress-bar-striped" id="">
          </div>
          </div>
        </div>       
      </div>
    </div>
  </div>
</div>
<script src="js/console_tramite.js?rev=<?php echo time();?>"></script>
<script src="_Plantilla/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
   countdown( "contador", 5, 0 );
   clearTimeout(cont_rec);
   var cont_rec=window.setTimeout('location.reload()', 300000);
  $(".select2").select2();
  listar_documentos_secre();
  var area = $("#txtidarea_principal").val();
  if (area=="1") {
    //document.getElementById('btn_registrar').style.display="block";
  }else{
    //document.getElementById('btn_registrar').style.display="none";
  }
  
  $(".form-control").on('paste', function(e){
    e.preventDefault();
  });
  $("#combo_estado").change(function(){
    listar_documentos_secre();
  });
  $("#combo_estatus_derivar").change(function(){
    var estatus = $("#combo_estatus_derivar").val();
    if (estatus=="DERIVADO") {
      var x = document.getElementsByClassName("div_datos_derivar");
      var i;
      for (i = 0; i < x.length; i++) {
        x[i].style.display = 'block';
      }
      $("#lb_titulo_derivar").html("Derivar");
    }else{
      var x = document.getElementsByClassName("div_datos_derivar");
      var i;
      for (i = 0; i < x.length; i++) {
        x[i].style.display = 'none';
      }
      $("#lb_titulo_derivar").html("Finalizar");
    }
    $("#txtformato").val("");
    $("#txt_archivo").val("");
    $("#lb_archivo").html("Seleccionar Archivo");
  });
</script>
<style type="text/css">
.countdown{border: 3px solid #e4e4e4;
        display:inline;
        padding: 5px;
        color: #004853;
        font-family: Verdana, sans-serif, Arial;
        font-size: 28px;
        font-weight: bold;
        text-decoration: none;}
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
  .table_swal td{
    padding: .25rem;
    vertical-align: top;
    /*border-top: 1px solid #dee2e6;*/
    font-size:14px;
  }
  .btn_swal{
    margin: .3125em !important;
  }
  .orientacion_swal{
    justify-content: right !important; 
  }
</style>
<script type="text/javascript">
  traer_idunico_interno();
  $('input[type="file"]').on('change', function(){
    var ext = $( this ).val().split('.').pop();
    if ($( this ).val() != '') {
      if(ext == "PDF" || ext == "pdf" || ext == "docx"|| ext == "DOCX" ){
          if($(this)[0].files[0].size > 1048576){
            Swal.fire("El archivo selecionado es demasiado pesado","<label style='color:#9B0000;'>seleccionar un archivo mas liviano</label>","warning");
            $("#txtformato").val("");
            $("#txt_archivo").val("");
            $("#lb_archivo").html("Seleccionar Archivo");
            return;
            //$("#btn_subir").prop("disabled",true);
          }else{
            //$("#btn_subir").attr("disabled",false);
          }
          $("#txtformato").val(ext);
      }else{
          $( this ).val('');
          $("#txtformato").val("");
          $("#txt_archivo").val("");
          $("#lb_archivo").html("Seleccionar Archivo");
          Swal.fire("Extensión no permitida: " + ext,"","error");
      }
    }
    var formato = $("#txtformato").val();
    if (formato.length==0) {
      document.getElementById('div_a').style.display = 'block';
      document.getElementById('div_b').style.display = 'none';
    }else{
      document.getElementById('div_b').style.display = 'block';
      document.getElementById('div_a').style.display = 'none';
    }
  });
  $(document).ready(function () {
    bsCustomFileInput.init();
    //buscar_orden_externo();
  });
</script>
<script type="text/javascript">
  $(document).on('hidden.bs.modal', function (event) {
    $('body').css('padding-right','0');
    if ($('.modal:visible').length) {
      $('body').addClass('modal-open');

    }
  });
</script>
<style type="text/css">
  input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border-radius: 20px ;
  color: black;
  padding: 5px 17px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
