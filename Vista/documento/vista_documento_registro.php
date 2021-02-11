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
        <h1 class="m-0 text-dark">Mantenimiento Tr&aacute;mite Interno</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php" ><i class="fa fa-home"></i> Inicio</a></li>
          <li class="breadcrumb-item"><a> Tr&aacute;mite</a></li>
          <li class="breadcrumb-item active"> Create</li>
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
            <h3 class="card-title">Registro Tr&aacute;mite Interno</h3>
          </div>
          <div class="card-body" style="color:#000000;font-size:small;">
            <input type="text" id="txt_verificar" hidden value="<?php echo $_SESSION['tipo_usuario_sistematramite'] ?>">
            <form autocomplete="false" method="POST" enctype="multipart/form-data" id="form_registro_tramite">
              <div class="row">
                <div class="col-md-6">
                  <div class="card card-danger">
                    <div class="card-header">
                      <h3 class="card-title"><b>Datos del Remitente</b></h3>
                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="">
                        <div class="row">
                          <div class="col-lg-4 form-group">
                              <label>Nº DNI (*):</label>
                              <input class="form-control" readonly style="background-color: white;" type="text" placeholder="Ingresar dni" maxlength="8" id="txtdni" name="txtdni" onkeypress="return soloNumeros(event)">
                          </div>
                          <div class="col-lg-8 form-group">
                              <label>Nombre  (*):</label>
                              <input class="form-control" readonly style="background-color: white;" type="text" placeholder="Ingresar nombre" maxlength="150" id="txtnombre" name="txtnombre" onkeypress="return soloLetras(event)">
                          </div>
                          <div class="col-lg-6 form-group">
                              <label>Apellido Paterno  (*):</label>
                              <input class="form-control" readonly style="background-color: white;" type="text" placeholder="Ingresar apellido paterno" maxlength="70" id="txtapepat" name="txtapepat" onkeypress="return soloLetras(event)">
                          </div>
                          <div class="col-lg-6 form-group">
                              <label>Apellido Paterno  (*):</label>
                              <input class="form-control" readonly style="background-color: white;" type="text" placeholder="Ingresar apellido materno" maxlength="70" id="txtapemat" name="txtapemat" onkeypress="return soloLetras(event)">
                          </div>
                          <div class="col-lg-6 form-group">
                              <label>Celular:</label>
                              <input class="form-control" onkeypress="return soloNumeros(event)" type="text" placeholder="Ingresar nro de celular" maxlength="9" id="txtcelular" name="txtcelular">
                          </div>
                          <div class="col-lg-6 form-group">
                              <label>Email (*):</label>
                              <input class="form-control" onkeypress="return soloNumerosyletras(event)" type="text" placeholder="Ingresar email" maxlength="250" id="txtemail" name="txtemail">
                          </div>
                          <div class="col-lg-12 form-group" >
                            <label>Direcci&oacute;n (*):</label>
                            <input class="form-control" onkeypress="return soloNumerosyletras(event)" type="text" placeholder="Ingresar direcci&oacute;n" id="txt_direccion" name="txt_direccion" maxlength="255" >
                          </div>
                          <div class="col-md-12">
                            <div class="col-12 row">
                               <label>En representacion de (*):</label>
                            </div>
                            <div class="col-12 row">
                              <input type="text" hidden id="txt_representacion" name="txt_representacion">
                              <div class="col-4 form-group clearfix">
                                <div class="icheck-danger d-inline">
                                  <input type="radio" id="rad_representacion1" value="A Nombre Propio" name="r1" checked>
                                  <label for="rad_representacion1" style="font-size: 15px !important;font-weight: normal;"> A Nombre Propio </label>
                                </div>
                              </div>
                              <div class="col-4 form-group clearfix">
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="rad_representacion2" value="A otra Persona Natural" name="r1">
                                  <label for="rad_representacion2" style="font-size: 15px !important;font-weight: normal;">A otra Persona Natural</label>
                                </div>
                              </div>
                              <div class="col-4 form-group clearfix">
                                <div class="icheck-success d-inline">
                                  <input type="radio" id="rad_representacion3" value="Persona Jurídica" name="r1">
                                  <label for="rad_representacion3" style="font-size: 15px !important;font-weight: normal;">Persona Jur&iacute;dica</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="div_juridico"  class="col-12" style="display: none;">
                            <div class="row">
                              <div class="col-md-4 form-group">
                                <label>RUC (*):</label>
                                <input type="text" id="txt_ruc" name="txt_ruc" maxlength="12"  onkeypress="return soloNumeros(event)" placeholder="Ingresar ruc" class="form-control">
                              </div>
                              <div class="col-md-8 form-group">
                                <label>Empresa (*):</label>
                                <input type="text" id="txt_empresa" onkeypress="return soloNumerosyletras(event)" name="txt_empresa" placeholder="Ingresar datos de la empresa" class="form-control">
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-lg-12" style="text-align: left;font-weight: bold;color: #9B0000">
                              Campos Obligatorios (*)
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-danger">
                    <div class="card-header"  style="background-color: #8900B0;">
                      <h3 class="card-title"><b>Datos del Documento</b></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12 form-group">
                          <label>Procedencia del Documento (*):</label>
                          <select class="select2-danger select2" name="cmb_procedenciadocumento" data-dropdown-css-class="select2-danger" id="cmb_procedenciadocumento" style="width: 100%;">
                          </select>
                        </div>
                        <div class="col-md-12 form-group">
                          <label>&Aacute;rea de Destino (*):</label>
                          <select class="select2-danger select2" name="cmb_area_destino" data-dropdown-css-class="select2-danger" id="cmb_area_destino" style="width: 100%;">
                          </select>
                        </div>
                        <div class="col-md-12 form-group">
                          <label>Tipo Documento (*):</label>
                          <select class="select2-danger select2" name="cmb_tipodocumento" data-dropdown-css-class="select2-danger" id="cmb_tipodocumento" style="width: 100%;">
                          </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label>Nº Documento (*):</label>
                          <input type="text"  class="form-control" onkeypress="return soloNroDocumento(event)" id="txt_nrodocumentos" name="txt_nrodocumentos" placeholder="Ingrese nro del documento">
                        </div>
                        <div class="col-md-6 form-group">
                          <label>Nº Folios (*):</label>
                          <input type="text" class="form-control" onkeypress="return soloNumeros(event)" id="txt_folios" name="txt_folios" placeholder="Ingrese nro de hojas">
                        </div>
                        <div class="col-md-12 form-group">
                          <label>Asunto del Tr&aacute;mite:</label>
                          <textarea rows="2" name="txt_asunto" onkeypress="return soloLetras(event)" id="txt_asunto" class="form-control" style='resize: none' maxlength="255" placeholder="Asunto del documento"></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                          <label for="txt_archivo">Adjuntar documento (pdf,docx) (*):</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" accept=".pdf,.PDF,.docx" class="custom-file-input form-control" id="txt_archivo" name="txt_archivo">
                              <label class="custom-file-label" id="lb_archivo" for="txt_archivo">Seleccionar Archivo</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group clearfix">
                            <div class="icheck-warning d-inline" style="">
                              <input type="checkbox" onclick="opcion_verificar()" id="checkaceptar">
                              <label for="checkaceptar" style="text-align: justify;">
                                El presente tiene caracter de Declaración jurada, en caso de producirse fraude o falsedad, me someto a las sanciones que contempla la LEY.
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12 form-group" style="text-align:left;font-weight:bold;color: #9B0000">
                          Campos Obligatorios (*)
                        </div>
                        <div class="col-md-12 fom-group">
                          <input type='text' name='postID' hidden id='postID'>
                          <input type="text" style="display: none;" id="txtformato" name="txtformato">
                          <button id="btn_subir"  onclick="registrar_tramite_interno()"  class="btn btn-success btn-block">Enviar Tr&aacute;mite</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</section>
<div id="div_progress">
  <div class="modal fade bs-example-modal-lg" id="modal_procesar_datos_2">
    <div class="modal-dialog modal-lg modal-dialog-centered"  style="width: 75%">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-clock-o"></i> ESPERE UNOS MOMENTOS PORFAVOR: LOS DATOS SE ESTAN PROCESANDO.</h4>
        </div>
        <div class="modal-body center-block"> 
          <div class="progress"  style="height: 30px;">
            <div class="progress-bar bg-primary progress-bar-striped" id="myBar_2" style="width: 0%;font-weight: bold;font-size: 15px" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
              <span class="sr-only">40% Complete (success)</span>
              <div class="progress-bar progress-bar-primary progress-bar-striped" id="">
            </div>
            </div>
          </div>       
        </div>
      </div>
    </div>
  </div>
</div>
<script src="js/console_tramite.js?rev=<?php echo time();?>"></script>

<script src="_Plantilla/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script type="text/javascript">
  $(".select2").select2();  
  $(".form-control").on('paste', function(e){
    e.preventDefault();
  });
</script>
<style>
  .btn{
    font-weight: bold;
  }
  h1{
    font-weight: bold;
  }
  small{
    font-weight: bold;
  }
  .select2{
    font-weight:bold;
    text-align-last:center;
  }
</style>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
    //buscar_orden_externo();
  });
</script>
<style type="text/css">
  a, h3, h1{
    font-weight: bold !important;
  }
</style>
<script type="text/javascript">
  traer_idunico_interno();
  $('input[type="file"]').on('change', function(){
    var ext = $( this ).val().split('.').pop();
    if ($( this ).val() != '') {
      if(ext == "PDF" || ext == "pdf" || ext == "docx"|| ext == "DOCX" ){
          if($(this)[0].files[0].size > 8048576){
            
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
          $("#txtformato").val("");
          $("#txt_archivo").val("");
          $("#lb_archivo").html("Seleccionar Archivo");
          $( this ).val('');
          Swal.fire("Extensión no permitida: " + ext,"","error");
      }
    }
  });
  $(".form-control").on('paste', function(e){
    e.preventDefault();
  });
  var cbm_representacion ="";
  var porrepresentacion=document.getElementsByName("r1");
  for(var i=0;i<porrepresentacion.length;i++){
      if(porrepresentacion[i].checked)
          cbm_representacion=porrepresentacion[i].value;
        //alert(cbm_representacion);
  }
  $("#txt_representacion").val(cbm_representacion);

  if (cbm_representacion==="A Nombre Propio") {
    document.getElementById('div_juridico').style.display = 'none';
  }
  if (cbm_representacion==="A otra Persona Natural") {
    document.getElementById('div_juridico').style.display = 'none';
  }
  if (cbm_representacion==="Persona Jurídica") {
    document.getElementById('div_juridico').style.display = 'block';
  }
  $('#rad_representacion1').on('click', function() {
      document.getElementById('div_juridico').style.display = 'none';
      $("#txt_representacion").val("A Nombre Propio");
  });
  $('#rad_representacion2').on('click', function() {
      document.getElementById('div_juridico').style.display = 'none';
      $("#txt_representacion").val("A otra Persona Natural");
  });
  $('#rad_representacion3').on('click', function() {
      document.getElementById('div_juridico').style.display = 'block';
      $("#txt_representacion").val("Persona Jurídica");
  });
  combo_tipodocumento_interno();
  combo_area_interno();
  opcion_verificar();
  traer_datosremitente();
  combo_area_destino_interno();
 
  function opcion_verificar() {
    if (document.getElementById('checkaceptar').checked==false) {
      $("#btn_subir").addClass("disabled");
    }else{
      $("#btn_subir").removeClass("disabled");
    }
  }
</script>
<style type="text/css">
    select[readonly].select2-hidden-accessible + .select2-container {
      pointer-events: none;
      touch-action: none;

      .select2-selection {
          background: #eee;
          box-shadow: none;
      }
      
      .select2-selection__arrow, select[readonly].select2-hidden-accessible + .select2-container .select2-selection__clear {
          display: none;
      }
    }
</style>