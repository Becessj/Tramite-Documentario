<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript">
function goclicky(meh)
{
    var x = screen.width/2 - 700/2;
    var y = screen.height/2 - 450/2;
    window.open(meh.href, 'sharegplus','height=485,width=700,left='+x+',top='+y);
}
</script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Tr&aacute;mite Virtual | Sistema Tramite Documentario</title>
  <link rel="icon" href="Vista/_Plantilla/img/escudo2.png" type="image/x-icon">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="Vista/_Plantilla/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="Vista/_Plantilla/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="Vista/_Plantilla/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Vista/_Plantilla/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="Vista/_Plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<script type="text/javascript">
	$(document).ready(function(){

$('#seguidores').click(function(){
         $('#pocos').html('<div>REQUISITOS PARA LICENCIA DE EDIFICACIÓN</div> ')
});

$('#favoritos').click(function(){
         $('#pocos').html('<h1>favoritos</h1>')
});

$('#multi_opt_user').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipient = button.data('whatever')
  var modal = $(this)
  modal.find('.modal-title').text(recipient)
  

});
});

</script>


  

</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="tramite_nuevo.php" class="navbar-brand">
        <img src="Vista/_Plantilla/img/escudo2.png" style="width: 30px" alt="Tramite Documentario Urubamba" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-weight: bold !important;">Mesa de Partes Virtual</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item">
            <a href="index.php" class="nav-link"><i class="fa fa-user"></i> &nbsp;Iniciar Sesión</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        
        <li class="nav-item">
          <a href="consulta" class="nav-link" target=blank_><i class="fa fa-th-list"></i> &nbsp;Consulta de Expedientes</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Trámite Documentario Virtual <small></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <div class="col-lg-12 form-group" style="text-align:left;font-weight:bold;color: #9B0000">
                <a href="https://guamanpoma.org/wp-content/uploads/FUT.pdf" target="_blank"><h3>Descargar FUT </h3>
                </a>
                  </div>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card  card-danger card-outline " >
              <div class="card-header  d-flex p-0">
                <h3 class="card-title p-3">Tr&aacute;mite</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Nuevo Tr&aacute;mite</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">VER TUPA</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <form autocomplete="false" method="POST" enctype="multipart/form-data" id="form_registro_tramite">
                      <div class="row">
                        
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
                                      <input class="form-control" type="text" placeholder="Ingresar dni" maxlength="8" id="txtdni" name="txtdni" onkeypress="return soloNumeros(event)">
                                  </div>
                                  <div class="col-lg-8 form-group">
                                      <label>Nombre  (*):</label>
                                      <input class="form-control" type="text" placeholder="Ingresar nombre" maxlength="150" id="txtnombre" name="txtnombre" onkeypress="return soloLetras(event)">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label>Apellido Paterno  (*):</label>
                                      <input class="form-control" type="text" placeholder="Ingresar apellido paterno" maxlength="70" id="txtapepat" name="txtapepat" onkeypress="return soloLetras(event)">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label>Apellido Materno  (*):</label>
                                      <input class="form-control" type="text" placeholder="Ingresar apellido materno" maxlength="70" id="txtapemat" name="txtapemat" onkeypress="return soloLetras(event)">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label>Celular:</label>
                                      <input class="form-control" onkeypress="return soloNumeros(event)" type="text" placeholder="Ingresar nro de celular" maxlength="9" id="txtcelular" name="txtcelular">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label>Correo (*):</label>
                                      <input class="form-control" onkeypress="return soloNumerosyletras(event)" type="text" placeholder="Ingresar correo" maxlength="250" id="txtemail" name="txtemail">
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
                                          <input type="radio" disabled id="rad_representacion2" value="A otra Persona Natural" name="r1">
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
                                  <label>¿Qué tramite desea realizar? (*):
                                  <a href="#tab_2" data-toggle="tab"></a></label>
                                  <select class="select2-danger select2" name="cmb_tipodocumento" data-dropdown-css-class="select2-danger" id="cmb_tipodocumento" style="width: 100%;">
                                  </select>
                                </div>
                                <div class="col-md-6 form-group">
                                  <label>Nº Documento (*):</label>
                                  <input type="text"  class="form-control"  id="txt_nrodocumentos" maxlength="15" name="txt_nrodocumentos" placeholder="Ingrese nro del documento">
                                </div>
                                <!--<div class="col-md-6 form-group">
                                  <label>Nº Documento (*):</label>
                                  <input type="text"  class="form-control" onkeypress="return soloNroDocumento(event)" id="txt_nrodocumentos" name="txt_nrodocumentos" placeholder="Ingrese nro del documento">
                                </div>-->
                                <div class="col-md-6 form-group">
                                  <label>Nº Folios (*):</label>
                                  <input type="text" class="form-control" onkeypress="return soloNumeros(event)" id="txt_folios" name="txt_folios" placeholder="Ingrese nro de hojas">
                                </div>
                                <div class="col-md-12 form-group">
                                  <label>Especifica tu Pedido:</label>
                                  <textarea rows="2" name="txt_asunto" id="txt_asunto" class="form-control" style='resize: none' maxlength="255" placeholder="Especificar pedido"></textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                  <label for="txt_archivo">Adjuntar documento (pdf,docx) (*): Los documentos adjuntos deberán tener un máximo de 15 MB</label>
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
                                  <button id="btn_subir"  onclick="registrar_tramite()"  class="btn btn-success btn-block">Enviar Tr&aacute;mite</button>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                      
                      </div>
                    </form>
                    
                  </div>


                  <div class="tab-pane" id="tab_2">
                    <div class="row">
                        <div class="col-md-12">
                          <div id="div_buscartramite">
                            <div class="card card-success">
                              <div class="card-header">
                                <div class="col-lg-4 form-group">
                                <input type="text" class="form-control pull-right" style="width:50%" id="search" placeholder="Buscar...">
                                </div>
                              </div>
                              <div class="card-body">
                                <form onsubmit="return false" autocomplete="false">
                                  
                                  <table class="table-bordered table pull-right" id="mytable" cellspacing="0" style="width: 100%;">
   <thead>

  	<!--<div class="modal fade" id="mimodalejemplo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Requisitos para Licencia de Edificación</h4>
      </div>
      <div class="modal-body">
        	<li>Requisito 1.</li>
        	<li>Requisito 1.</li>
        	<li>Requisito 1.</li>
        	<li>Requisito 1.</li>
        	<li>Requisito 1.</li>

        	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>-->
<div class="modal fade" id="multi_opt_user" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
         <i class="fi-heart"></i>
             <button id="pethatlimypro" type="button" class="close" data-dismiss="modal">×</button>
                 <h4 class="modal-title"></h4>
                        <div class="modal-body">
                           <div id="pocos"></div>
    </div>

    <div class="modal-footer">
    	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
    </div>
  </div>
</div>
   <tr role="row">
   <th>Tipo de Trámite</th>
   <th>Ver Requisitos</th>
   <th>Descargar Requisitos</th>
   </tr>
   </thead>
   <tbody>
   <tr>
   <td>Licencia de Edificación </td>

   <td><a href="#" id="seguidores" data-toggle="modal" data-target="#multi_opt_user" data-whatever="Personas que me siguen." class="add_more" id="add_more_to"><i class="fa fa-eye"></i></a></td>
   <td><a href="TUPA/doc.pdf" download="requisitos">DESCARGAR<i class="fa fa-download"></i></a></td>
   </tr>
   <tr>
   <td>Licencia de Funcionamiento</td>
   <td><a href="#" data-toggle="modal" data-target="#multi_opt_user" data-whatever="Mis favoritos." id="makeagifttosomeone">
    <i class="fa fa-eye"></i></a></td>
   <td><a href="TUPA/doc.pdf" download="requisitos">DESCARGAR<i class="fa fa-download"></i></a></td>
   </tr>
   <tr>
   <td>Licencia de Edificacion tipo C</td>
   <td><a href="TUPA/doc.pdf" onclick="goclicky(this); return false;" target="_blank">VER<i class="fa fa-eye"></i></a></td>
   <td><a href="TUPA/doc.pdf" download="requisitos">DESCARGAR<i class="fa fa-download"></i></a></td>
   </tr>
   <tr>
   <td>Licencia de Edificacion tipo D</td>
   <td><a href="TUPA/doc.pdf" onclick="goclicky(this); return false;" target="_blank">VER<i class="fa fa-eye"></i></a></td>
   <td><a href="TUPA/doc.pdf" download="requisitos">DESCARGAR<i class="fa fa-download"></i></a></td>
   </tr>
   <tr>
   <td>Licencia de Edificacion tipo E</td>
   <td><a href="TUPA/doc.pdf" onclick="goclicky(this); return false;" target="_blank">VER<i class="fa fa-eye"></i></a></td>
   <td><a href="TUPA/doc.pdf" download="requisitos">DESCARGAR<i class="fa fa-download"></i></a></td>
   </tr>
   <tr>
   <td>Licencia de Edificacion tipo R</td>
   <td><a href="TUPA/doc.pdf" onclick="goclicky(this); return false;" target="_blank">VER<i class="fa fa-eye"></i></a></td>
   <td><a href="TUPA/doc.pdf" download="requisitos">DESCARGAR<i class="fa fa-download"></i></a></td>
   </tr>
   <tr>
   <td>Licencia de Edificacion tipo E</td>
   <td><a href="TUPA/doc.pdf" onclick="goclicky(this); return false;" target="_blank">VER<i class="fa fa-eye"></i></a></td>
   <td><a href="TUPA/doc.pdf" download="requisitos">DESCARGAR<i class="fa fa-download"></i></a></td>
   </tr>
   <tr>
   <td>Licencia de Edificacion tipo 2</td>
   <td><a href="TUPA/doc.pdf" onclick="goclicky(this); return false;" target="_blank">VER<i class="fa fa-eye"></i></a></td>
   <td><a href="TUPA/doc.pdf" download="requisitos">DESCARGAR<i class="fa fa-download"></i></a></td>
   </tr>
   <tr>
   <td>Licencia de Edificacion tipo 3</td>
   <td><a href="TUPA/doc.pdf" onclick="goclicky(this); return false;" target="_blank">VER<i class="fa fa-eye"></i></a></td>
   <td><a href="TUPA/doc.pdf" download="requisitos">DESCARGAR<i class="fa fa-download"></i></a></td>
   </tr>
   <tr>
   <td>Licencia de Edificacion tipo 7</td>
   <td><a href="TUPA/doc.pdf" onclick="goclicky(this); return false;" target="_blank">VER<i class="fa fa-eye"></i></a></td>
   <td><a href="TUPA/doc.pdf" download="requisitos">DESCARGAR<i class="fa fa-download"></i></a></td>
   </tr>
   </tbody>
  </table>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div id="div_datostramite" style="display: none;">
                            <div class="card card-orange">
                              <div class="card-header">
                                <h3 class="card-title" style="color: white;"><b>Informaci&oacute;n del Tr&aacute;mite</b></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                              </div>
                              <div class="card-body">
                                <form onsubmit="return false" autocomplete="false">
                                  <div class="row">
                                    <div class="col-lg-12 ">
                                      <div class="container-fluid">
                                        <div class="row mb-2">
                                          <div class="col-sm-6">
                                          </div>
                                          <div class="col-sm-6">
                                            <ol class="float-sm-right">
                                              <button class="btn btn-danger btn-sm" style="width: 100%;" onclick="Generar_Reporte()"><i class="fa fa-print"></i> &nbsp;Imprimir Ticket</button>
                                            </ol>
                                            <ol class="float-sm-right">
                                              <button class="btn btn-success btn-sm" style="width: 100%;" onclick="nueva_busqueda()"><i class="fa fa-search"></i> &nbsp;Nueva Busqueda</button>
                                            </ol>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="">
                                        <table class="table" style="width: 100%;">
                                          <tr>
                                            <td style="width: 100%;text-align: center;font-weight: bold;border-top: 2px solid black;background-color: #E4E4E4" colspan="2">
                                              DATOS DEL REMITENTE
                                            </td>
                                          </tr>
                                          <tr>
                                            <td style="width: 30%;font-weight: bold;background-color: #E4E4E4">DNI</td>
                                            <td style="width: 70%;"><label id="lb_dni"></label></td>
                                          </tr>
                                          <tr>
                                            <td style="width: 30%;font-weight: bold;background-color: #E4E4E4">NOMBRES - APELLIDOS</td>
                                            <td style="width: 70%;" id="lb_datos"></td>
                                          </tr>
                                          <tr>
                                            <td style="width: 30%;font-weight: bold;background-color: #E4E4E4">DIRECCI&Oacute;N</td>
                                            <td style="width: 70%;" id="lb_direccion"></td>
                                          </tr>
                                          <tr>
                                            <td style="width: 30%;font-weight: bold;background-color: #E4E4E4">E-MAIL</td>
                                            <td style="width: 70%;" id="lb_email"></td>
                                          </tr>
                                          <tr>
                                            <td style="width: 30%;font-weight: bold;background-color: #E4E4E4">REPRESENTACI&Oacute;N</td>
                                            <td style="width: 70%;" id="lb_representacion"></td>
                                          </tr>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="table-responsive">
                                        <table class="table" style="width: 100%;">
                                          <tr>
                                            <td style="width: 100%;text-align: center;font-weight: bold;border-top: 2px solid black;background-color: #E4E4E4" colspan="2">
                                              DATOS DEL DOCUMENTO
                                            </td>
                                          </tr>
                                          <tr>
                                            <td style="width: 30%;font-weight: bold;background-color: #E4E4E4">TIPO DOCUMENTO</td>
                                            <td style="width: 70%;" id="lb_tipodocumento"></td>
                                          </tr>
                                          <tr>
                                            <td style="width: 30%;font-weight: bold;background-color: #E4E4E4">NRO DOCUMENTO</td>
                                            <td style="width: 70%;"><label  id="lb_nrodocumento"></label></td>
                                          </tr>
                                          <tr>
                                            <td style="width: 30%;font-weight: bold;background-color: #E4E4E4">ASUNTO</td>
                                            <td style="width: 70%;" rowspan="3" id="lb_asunto"></td>
                                          </tr>
                                          <tr>
                                            <td style="border: 0px solid black;">&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td style="border: 0px solid black;">&nbsp;</td>
                                          </tr>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title"><b>Seguimiento Tr&aacute;mite</b></h3>
                                </div>
                                <div class="card-body">
                                  <form onsubmit="return false" autocomplete="false">
                                    <div class="row">
                                      <div class="col-12" >
                                        <div class="timeline">
                                          <div id="div_historial2"></div>
                                          <div id="div_historial"></div>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
 // Write on keyup event of keyword input element
 $(document).ready(function(){
 $("#search").keyup(function(){
 _this = this;
 // Show only matching TR, hide rest of them
 $.each($("#mytable tbody tr"), function() {
 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
 $(this).hide();
 else
 $(this).show();
 });
 });
});
</script>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <b></b> 
    </div>
    <!-- Default to the left -->
    <strong>© Municipalidad Provincial de Urubamba 2020 <a href="https://muniurubamba.gob.pe" target="_blank">Oficina de Informática</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="Vista/_Plantilla/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Vista/_Plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="Vista/_Plantilla/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="Vista/_Plantilla/dist/js/adminlte.min.js"></script>

<script src="Vista/_Plantilla/plugins/select2/js/select2.full.min.js"></script>
<script src="Vista/js/sweetalert2.js"></script>
<script src="Vista/js/console_tramite.js?rev=<?php echo time();?>"></script>
<!-- let's call the following div as the POPUP FRAME -->
    <div id="popup" class="popup panel panel-primary">
        
        <!-- and here comes the image -->
        <img class="img-responsive" src="TUPA/image2.jpg" alt="popup">
       <!-- Now this is the button which closes the popup-->
        <div class="panel-footer" style="text-align: center;">
            <button id="close" class="btn btn-lg btn-primary">Aceptar</button>
        </div>
            <!-- and finally we close the POPUP FRAME-->
            <!-- everything on it will show up within the popup so you can add more things not just an image -->
    </div>
</body>
</html>
<script type="text/javascript">
  $(".aclick").click(function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        console.log(id);
        $('#modal_'+id).modal('show');
    });
</script>
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
  $('.select2').select2();
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
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456456789:/.,\@-";
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
    letras = "abcdefghijklmnñopqrstuvwxyz0123456456789\@-_";
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
  function mantenimiento() {
    Swal.fire("Mensaje de Aviso","Opci&oacute;n en mantenimiento","info");
  }
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
  $("#cbm_anio").val("2020").trigger("change");
  traer_idunico();
  $('input[type="file"]').on('change', function(){
      var ext = $( this ).val().split('.').pop();
      if ($( this ).val() != '') {
      if(ext == "PDF" || ext == "pdf" || ext == "docx"|| ext == "DOCX" ){
          if($(this)[0].files[0].size > 16048576){
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
        }
        else
        {
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
//PARA MOSTRAR IMAGENES pop


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
  combo_tupa_externo();
  opcion_verificar();
  function opcion_verificar() {
    if (document.getElementById('checkaceptar').checked==false) {
      $("#btn_subir").addClass("disabled");
    }else{
      $("#btn_subir").removeClass("disabled");
    }
  }
  //with this first line we're saying: "when the page loads (document is ready) run the following script"
$(document).ready(function () {
    //select the POPUP FRAME and show it
    $("#popup").hide().fadeIn(1000);

    //close the POPUP if the button with id="close" is clicked
    $("#close").on("click", function (e) {
        e.preventDefault();
        $("#popup").fadeOut(1000);
    });
});
</script>
<style type="text/css">
  td{
    border: 2px solid black;
    word-wrap: break-word;
    text-align: justify;
  }
</style>
<style type="text/css">
  .timeline > div > div {
    margin-bottom: 15px;
    margin-right: 10px;
    position: relative;
}
  .timeline > div > .time-label > span {
    border-radius: 4px;
    background-color: #fff;
    display: inline-block;
    font-weight: 600;
    padding: 5px;
}
#popup {
    display:none;
    position:absolute;
    margin:0 auto;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    box-shadow: 0px 0px 50px 2px #000;
}

.timeline > div > .fa, .timeline > div > .fab, .timeline > div > .far, .timeline > div > .fas, .timeline > div > div > .fas, .timeline > div > .glyphicon, .timeline > div > .ion {
    background: #adb5bd;
        background-color: rgb(173, 181, 189);
    border-radius: 50%;
    font-size: 15px;
    height: 30px;
    left: 18px;
    line-height: 30px;
    position: absolute;
    text-align: center;
    top: 0;
    width: 30px;
}
.timeline > div > div > .timeline-item {
    box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px 3px rgba(0,0,0,.2);
    border-radius: .25rem;
    background: #fff;
    color: #495057;
    margin-left: 60px;
    margin-right: 15px;
    margin-top: 0;
    padding: 0;
    position: relative;
}
.img-responsive {
  margin: 0;
  margin-right: auto;
  margin-left: auto;
  width: 100%;
}
@media (min-width: 650px) {
  .img-responsive {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .img-responsive {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .img-responsive {
     width: 1000px;
  }
}
.timeline > div > div > .timeline-item > .time {
    color: #999;
    float: right;
    font-size: 12px;
    padding: 10px;
}
.timeline > div >  div > .timeline-item > .timeline-header {
    border-bottom: 1px solid rgba(0,0,0,.125);
    color: #495057;
    font-size: 16px;
    line-height: 1.1;
    margin: 0;
    padding: 10px;
}
.timeline > div > div > .timeline-item > .timeline-body, .timeline > div > .timeline-item > .timeline-footer {
    padding: 10px;
}
.timeline > div > div > .timeline-item > .timeline-body, .timeline > div > .timeline-item > .timeline-footer {
    padding: 10px;
}
</style>
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
