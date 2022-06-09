function combo_tipodocumento_externo(){
	$.ajax({
		url:'controlador/documento/controlador_combo_documento_listar.php',
		type:'POST'
	})
	.done(function(resp){
		var data = JSON.parse(resp);

		if (data.length > 0) {
			var cadena = "";
			for (var i = 0; i < data.length; i++) {
				cadena += "<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
			}
			$("#cmb_tipodocumento").html(cadena);
		}
		else{
			var cadena = "<option value=''>NO SE ENCONTRARON REGISTROS</option>";
			$("#cmb_tipodocumento").html(cadena);
		}
	})
}
function combo_tupa_externo(){
	$.ajax({
		url:'controlador/documento/controlador_combo_tupa_listar.php',
		type:'POST'
	})
	.done(function(resp){
		var data = JSON.parse(resp);

		if (data.length > 0) {
			var cadena = "";
			for (var i = 0; i < data.length; i++) {
				cadena += "<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
			}
			$("#cmb_tipodocumento").html(cadena);
		}
		else{
			var cadena = "<option value=''>NO SE ENCONTRARON REGISTROS</option>";
			$("#cmb_tipodocumento").html(cadena);
		}
	})
}
function ValidacionInputRegistroTramite(dni,nombre,apepat,apemat,email,direccion,nrodocumento,folio,asunto,ruc,empresa,archivo){
	Boolean($("#"+dni).val().length>0) ? $("#"+dni).removeClass('is-invalid').addClass("is-valid") : $("#"+dni).removeClass('is-valid').addClass("is-invalid"); 
	Boolean($("#"+nombre).val().length>0) ? $("#"+nombre).removeClass('is-invalid').addClass("is-valid") : $("#"+nombre).removeClass('is-valid').addClass("is-invalid"); 
	Boolean($("#"+apepat).val().length>0) ? $("#"+apepat).removeClass('is-invalid').addClass("is-valid") : $("#"+apepat).removeClass('is-valid').addClass("is-invalid"); 
	Boolean($("#"+apemat).val().length>0) ? $("#"+apemat).removeClass('is-invalid').addClass("is-valid") : $("#"+apemat).removeClass('is-valid').addClass("is-invalid"); 
    Boolean($("#"+email).val().length>0) ? $("#"+email).removeClass('is-invalid').addClass("is-valid") : $("#"+email).removeClass('is-valid').addClass("is-invalid"); 
    Boolean($("#"+direccion).val().length>0) ? $("#"+direccion).removeClass('is-invalid').addClass("is-valid") : $("#"+direccion).removeClass('is-valid').addClass("is-invalid"); 
	Boolean($("#"+nrodocumento).val().length>0) ? $("#"+nrodocumento).removeClass('is-invalid').addClass("is-valid") : $("#"+nrodocumento).removeClass('is-valid').addClass("is-invalid"); 
    Boolean($("#"+folio).val().length>0) ? $("#"+folio).removeClass('is-invalid').addClass("is-valid") : $("#"+folio).removeClass('is-valid').addClass("is-invalid"); 
    Boolean($("#"+asunto).val().length>0) ? $("#"+asunto).removeClass('is-invalid').addClass("is-valid") : $("#"+asunto).removeClass('is-valid').addClass("is-invalid"); 
    Boolean($("#"+ruc).val().length>0) ? $("#"+ruc).removeClass('is-invalid').addClass("is-valid") : $("#"+ruc).removeClass('is-valid').addClass("is-invalid"); 
    Boolean($("#"+empresa).val().length>0) ? $("#"+empresa).removeClass('is-invalid').addClass("is-valid") : $("#"+empresa).removeClass('is-valid').addClass("is-invalid"); 
    Boolean($("#"+archivo).val().length>0) ? $("#"+archivo).removeClass('is-invalid').addClass("is-valid") : $("#"+archivo).removeClass('is-valid').addClass("is-invalid");
}
document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})
function traer_idunico() {
    $.ajax({
        url:'controlador/documento/controlador_generar_codigo.php',
        type:'POST'
    })
    .done(function(resp){
        $("#postID").val(resp);
    })
}
function registrar_tramite() {
    $("#myBar_2").css("width", "0%");
    var elem = document.getElementById("myBar_2");  
    elem.style.width = '0%'; 
    document.getElementById('div_progress').style.display = 'block';
	var cbm_representacion ="";
	var porrepresentacion=document.getElementsByName("r1");
	for(var i=0;i<porrepresentacion.length;i++){
	  if(porrepresentacion[i].checked)
	      cbm_representacion=porrepresentacion[i].value;
	}
    var txtdni        = $("#txtdni").val();
    var txtnombre     = $("#txtnombre").val();
    var txtapepat     = $("#txtapepat").val();
    var txtapemat     = $("#txtapemat").val();
    var txtcelular    = $("#txtcelular").val();
    var txtemail      = $("#txtemail").val();
    var txt_direccion = $("#txt_direccion").val();
    var txt_ruc       = $("#txt_ruc").val();
    var txt_empresa   = $("#txt_empresa").val();

    var cmb_tipodocumento = $('#cmb_tipodocumento').val();
    var txt_nrodocumentos = $('#txt_nrodocumentos').val();
    var txt_folios  = $("#txt_folios").val();
    var txt_asunto  = $("#txt_asunto").val();
    var txtformato  = $("#txtformato").val();
    var nombre_tipo   = $('select[name="cmb_tipodocumento"] option:selected').text();

	ValidacionInputRegistroTramite('txtdni','txtnombre','txtapepat','txtapemat','txtemail','txt_direccion','txt_nrodocumentos','txt_folios','txt_asunto','txt_ruc','txt_empresa','txt_archivo');
	if (txtdni.length==0 || txtnombre.length==0 || txtapepat.length==0 || txtapemat.length==0 || txtemail.length==0 || txt_direccion.length==0||txt_nrodocumentos.length==0 || txt_folios.length==0 || txt_asunto.length==0 || txtformato.length==0) {
        Swal.fire("Mensaje de Advertencia","Porfavor <b>llene los campos vacios (*)</b>","warning");
        var form = document.getElementById("form_registro_tramite");
        form.onsubmit = function(e){
            e.preventDefault();
        }
        return false;
    }
    if (cbm_representacion == "Persona Jurídica") {
        if (txt_ruc.length==0 || txt_empresa.length==0) {
            Swal.fire("Mensaje de Advertencia","Porfavor <b>llene los campos vacios (*)</b>","warning");
            var form = document.getElementById("form_registro_tramite");
            form.onsubmit = function(e){
                e.preventDefault();
            }
            return false;
        }
    }
    $('#modal_procesar_datos_2').modal({backdrop: 'static', keyboard: false})
    $("#modal_procesar_datos_2").modal('show');
    var elem = document.getElementById("myBar_2");   
    var width = 0;
    var id = setInterval(frame, 200);
    function frame() {
        if (width >= 100) {
            clearInterval(id);                   
            $("#modal_procesar_datos_2").modal('hide');
        } else {
            width++; 
            elem.style.width = width + '%'; 
            elem.innerHTML = "Procesando datos... " + width * 1  + '%';
        }
    } 
    //alert("");
    $(document).on('submit', '#form_registro_tramite', function() { 
        $("#btn_subir").attr("disabled",true);
        var data = $(this).serialize(); 
        $.ajax({  
            type : 'POST',
            mimeType: "multipart/form-data",
            url  : 'controlador/documento/controlador_documento_registro_externo.php',
            data:  new FormData(this),
            contentType: false,
                  cache: false,
            processData:false,
            success:function(resp) {
                $("#btn_subir").attr("disabled",false);
                if (resp!=10) {
                    $("#myBar_2").css("width", "100%");
                    var elem = document.getElementById("myBar_2");  
                    elem.style.width = '100%'; 
                    $('body').removeClass('modal-open');
                    document.querySelector('body').classList.remove('modal-open');
                    $(".modal-backdrop").remove();
                    document.getElementById('div_progress').style.display = 'none';
                    $("#modal_procesar_datos_2").modal('hide');
                    $('body').css('padding-right','0');
                    if(resp!=0){
                        if (resp==2) {
                            Swal.fire("Mensaje de Advertencia","Lo sentimos, el <b>nro de documento</b> ingresado ya se encuentra registrado en nuestra data","warning");             
                            $('#txt_nrodocumentos').removeClass("is-valid").addClass("is-invalid");
                            traer_idunico();
                        }else {
                            $("#txt_archivo_comprobante").val("");
                            Swal.fire("Mensaje de Confirmaci\u00F3n","Datos correctamente registrados,<b> nuevo documento registrado</b><br><b>Nro Seguimiento:<b><label style='color:#9B0000;'>&nbsp; "+resp+"</label><br><b>Se Envio el nro de seguimiento al correo brindado</b>","success")
                            .then ( ( value ) =>  {
                                $('.form-control').removeClass("is-invalid").removeClass("is-valid");
                                $('.form-control').val("");
                                document.getElementById("form_registro_tramite").reset();
                                document.getElementById('div_juridico').style.display = 'none';
                                traer_idunico();
                                $("#btn_subir").addClass("disabled");
                                EnviarMensajeCorreoRegistro(resp,txt_nrodocumentos,nombre_tipo,txtemail);
                            });
                        }
                        
                    }else{
                        Swal.fire("Mensaje de Error","Lo sentimos no se pudo completar el registro","error");
                        traer_idunico();
                    }
                }
            }  
        });
        return false;
    });
}
function EnviarMensajeCorreoRegistro(id_seguimiento,nro_tramite,tipo_tramite,email) {
    $.ajax({
        url:'controlador/documento/controlador_enviar_mensaje_exterior.php',
        type:'POST',
        data:{
            id_seguimiento:id_seguimiento,
            nro_tramite:nro_tramite,
            tipo_tramite:tipo_tramite,
            txtemail:email
        }
    })
    .done(function(resp){
    })
}
function limpiarseguimiento() {
    $("#lb_dni").html("");
    $("#lb_datos").html("");
    $("#lb_direccion").html("");
    $("#lb_email").html("");
    $("#lb_representacion").html("");
    $("#lb_tipodocumento").html("");
    $("#lb_nrodocumento").html("");
    $("#lb_asunto").html("");
    $('#div_historial').html("");
    $('#div_historial2').html("");
}
function buscar_orden_externo() {
    var txtnrodocumento = $("#txtnrodocumento").val();
    var cbm_anio        = $("#cbm_anio").val();
    if (txtnrodocumento.length==0) {
        Boolean($("#txtnrodocumento").val().length>0) ? $("#txtnrodocumento").removeClass('is-invalid').addClass("is-valid") : $("#txtnrodocumento").removeClass('is-valid').addClass("is-invalid"); 
        return Swal.fire("Mensaje de Advertencia","Falta Llenar datos","warning");
    }
    $("#btn_buscar").prop("disabled", true);
    $('#txtnrodocumento').removeClass("is-invalid").removeClass("is-valid");
    $.ajax({
        url:'controlador/documento/controlador_documento_externo_buscar.php',
        type:'POST',
        data:{
            txtnrodocumento:txtnrodocumento,
            cbm_anio:cbm_anio
        }
    })
    .done(function(resp){
        var data = JSON.parse(resp);
        limpiarseguimiento();
        $("#btn_buscar").prop("disabled", false);
        if (data.length > 0) {
            document.getElementById('div_datostramite').style.display="block";
            document.getElementById('div_buscartramite').style.display="none";
            $("#txtnrodocumento").val("");
            $("#lb_dni").html(data[0][1]);
            $("#lb_datos").html(data[0][2]+" "+data[0][3]+" "+data[0][4]);
            $("#lb_direccion").html(data[0][7]);
            $("#lb_email").html(data[0][6]);
            $("#lb_representacion").html(data[0][8]);
            $("#lb_tipodocumento").html(data[0][16]);
            $("#lb_nrodocumento").html(data[0][12]);
            $("#lb_asunto").html(data[0][14]);
            $('#div_historial2').html("");
            var cadena_seguimiento = "";
            var cadena_seguimiento2 = "";
                      cadena_seguimiento+='<div class="time-label">';
                     cadena_seguimiento+=  ' <span class="bg-red">Fecha Inicio: '+data[0][18]+'</span>';
                    cadena_seguimiento+=  '</div>';
                    cadena_seguimiento+= ' <div>';
                     cadena_seguimiento+= '  <i class="fas fa-university bg-blue"></i>';
                      cadena_seguimiento+= ' <div class="timeline-item">';
                       cadena_seguimiento+= '  <span class="time"><i class="fas fa-clock"></i> '+data[0][20]+'</span>';
                        cadena_seguimiento+= ' <h3 class="timeline-header"> '+data[0][19]+'</h3>';
                        cadena_seguimiento+= ' <div class="timeline-body">';
                           cadena_seguimiento+=  'Su trámite ha sido recibido en <b>MESA DE PARTES</b>, será atendido o derivado a la oficina correspondiente en un plazo máximo de 2 día(s).';
                      cadena_seguimiento+= '  </div>';
                     cadena_seguimiento+=  ' </div>';
                   cadena_seguimiento+= ' </div>';
                   $('#div_historial2').append(cadena_seguimiento);
                   segundo(data[0][0]);
        }else{
            document.getElementById('div_buscartramite').style.display="block";
            document.getElementById('div_datostramite').style.display="none";
            Swal.fire("Mensaje de Advertencia","Lo sentimos, el <label>nro de documento</label> ingresado no se encuentra registrado en nuestra data","warning");
        }
    })
}
var derivada = new  Array();
var seguimiento = new  Array();
function segundo(iddocumento) {
    derivada = [];
    seguimiento = [];
    $.ajax({
        url:'controlador/documento/controlador_documento_seguimiento_buscar.php',
        type:'POST',
        data:{
            iddocumento:iddocumento
        }
    })
    .done(function(resp2){
        var data2 = JSON.parse(resp2);
        if (data2.length > 0) {
            for (var j = 0; j < data2.length; j++) {
                var cadena_seguimiento = "";
                cadena_seguimiento += '<div>';
                  cadena_seguimiento += '<i class="fas fa-reply-all bg-yellow"></i>';
                  cadena_seguimiento += '<div class="timeline-item">';
                    cadena_seguimiento += ' <span class="time"><i class="fas fa-clock"></i> '+data2[j][6]+'</span>';
                    cadena_seguimiento += ' <h3 class="timeline-header"> '+data2[j][5]+'</h3>';
                    cadena_seguimiento += ' <div class="timeline-body">';
                      cadena_seguimiento +=  ' Su trámite ha sido derivado a <b>'+data2[j][10]+'</b>';
                    cadena_seguimiento += ' </div>';
                    cadena_seguimiento += ' <div class="timeline-footer" style="padding: 10px;">';
                      cadena_seguimiento += ' " '+data2[j][7]+' "';
                   cadena_seguimiento += '  </div>';
                  cadena_seguimiento += ' </div>';
                cadena_seguimiento += ' </div>';
                derivada[j] = cadena_seguimiento;
                seguimiento[j] = data2[j][0];
            }
            tercero();
        }
    })
}
function tercero() {
    var cont = 0;
    for (var k = 0; k < derivada.length; k++) {
        var id_movimiento = seguimiento[k];
        $.ajax({
            url:'controlador/documento/controlador_documento_seguimiento_accion_buscar.php',
            type:'POST',
            data:{
                idmovimiento:parseInt(id_movimiento)
            }
        })
        .done(function(resp3){
            var data3 = JSON.parse(resp3);
            if (data3.length > 0) {
                var cadena_seguimiento = "";
                cadena_seguimiento += derivada[cont];
                $('#div_historial').append(cadena_seguimiento);
                console.log(seguimiento[k]);
                for (var i = 0; i < data3.length; i++) {
                    var cadena_seguimiento = "";
                    cadena_seguimiento += '<div>';
                      cadena_seguimiento += '<i class="fas fa-comments bg-success"></i>';
                      cadena_seguimiento += '<div class="timeline-item">';
                        cadena_seguimiento += ' <span class="time"><i class="fas fa-clock"></i> '+data3[i][7]+'</span>';
                        cadena_seguimiento += ' <h3 class="timeline-header"> '+data3[i][6]+'</h3>';
                        cadena_seguimiento += ' <div class="timeline-body">';
                        if (data3[i][3]=="RECHAZADO") {
                          cadena_seguimiento +=  ' Su trámite ha sido <b>'+data3[i][3]+' </b> en <b>'+data3[i][8]+'</b>';
                        }else{
                            if (data3[i][3]=="FINALIZADO") {
                              cadena_seguimiento +=  ' Su trámite ha <b>'+data3[i][3]+' </b> en <b>'+data3[i][8]+'</b>';
                            }else{
                                cadena_seguimiento +=  ' Su trámite ha sido <b>'+data3[i][3]+' </b> en <b>'+data3[i][8]+'</b>, será atendido o derivado a la oficina correspondiente';
                            }
                        }
                        cadena_seguimiento += ' </div>';
                        cadena_seguimiento += ' <div class="timeline-footer" style="padding: 10px;">';
                          cadena_seguimiento += ' " '+data3[i][2]+' "';
                       cadena_seguimiento +=   '</div>';
                      cadena_seguimiento += ' </div>';
                    cadena_seguimiento += ' </div>';
                  $('#div_historial').append(cadena_seguimiento);
                 console.log(cadena_seguimiento);
                }
            }else{
                var cadena_seguimiento = "";
                    cadena_seguimiento += derivada[cont];
                $('#div_historial').append(cadena_seguimiento);
            }
            cont++;
        })
    }
}
function nueva_busqueda() {
    document.getElementById('div_buscartramite').style.display="block";
    document.getElementById('div_datostramite').style.display="none";
}
//============================================================================================
//============================================================================================
//================================LISTADO DOCUEMENTOS=========================================
//============================================================================================
//============================================================================================
var idioma_espanol = {
  select: {
    rows: "%d fila seleccionada"
  },
  "sProcessing":     "Procesando...",
  "sLengthMenu":     "Mostrar _MENU_ registros",
  "sZeroRecords":    "No se encontraron resultados",
  "sEmptyTable":     "Ningún dato disponible en esta tabla",
  "sInfo":           "Registros del (_START_ al _END_) total de _TOTAL_ registros",
  "sInfoEmpty":      "Registros del (0 al 0) total de 0 registros",
  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
  "sInfoPostFix":    "",
  "sSearch":         "Buscar:",
  "sUrl":            "",
  "sInfoThousands":  ",",
  "sLoadingRecords": "<b>No se encontraron datos</b>",
  "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
  },
  "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  }
}
var table;
function listar_documentos_admin(){
    var tipo_usuario  = $("#txt_tipousuario").val();
    var txtidarea     = $("#txtidarea_principal").val();
    var combo_estado  = $("#combo_estado").val();
    if (tipo_usuario=="Administrador") {
        txtidarea = "%";
    }
    table = $("#tabla_documento").DataTable({
        "ordering":true,   
        "pageLength":10,
        "destroy":true,
        "async": false ,
        "responsive": true,
        "autoWidth": false,
        "ajax":{
            "method":"POST",
            "url":"../controlador/documento/controlador_documento_listar.php",
            data:{
                txtidarea:txtidarea,
                combo_estado:combo_estado
            }
        },
        "columns":[
            {"data":"documento_id"},
            {"data":"doc_nrodocumento"},
            {"data":"tipodo_descripcion"},
            {"data":"doc_dniremitente"},       
            {"data":"empleado"},
           // {"defaultContent":"<button style='font-size:13px;' type='button' class='ver_remitente btn btn-sm btn-primary'><span><i class='fa fa-search' aria-hidden='true'></i></span></button>"},
            {"defaultContent":"<button style='font-size:13px;' type='button' class='ver_datosdocumento btn btn-sm btn-danger'><span><i class='fa fa-search' aria-hidden='true'></i></span></button>"},
            {"defaultContent":"<button style='font-size:13px;' type='button' class='ver_datosseguimiento btn btn-sm btn-warning'><span><i class='fa fa-search' aria-hidden='true'></i></span></button>"},
            {"data":"origen_nombre"},
            {"data":"area_nombre"},
            {"data":"doc_estatus",
                render: function (data, type, row ) {
                    if (data=='PENDIENTE') {
                      return "<span class='badge badge-success m-r-5 m-b-5'>"+data+"</span>";
                    }
                    if (data=='RECHAZADO') {
                      return "<span class='badge badge-danger m-r-5 m-b-5'>"+data+"</span>";
                    }
                    if (data=='ACEPTADO') {
                      return "<span class='badge badge-success m-b-5'>"+data+"</span>";                 
                    }
                    if (data=='DERIVADO') {
                      return "<span style='background-color: #8900B0;color:white;' class='badge badge-purple m-b-5'>"+data+"</span>";                 
                    }
                    if (data=='FINALIZADO') {
                      return "<span style='background-color: black;color:white;' class='badge badge-purple m-b-5'>"+data+"</span>";                 
                    }
                }
            }  
            //{"defaultContent":"<button style='font-size:13px;' title='Derivar Documento' type='button' class='ver_derivar btn btn-sm btn bg-gradient-orange'><span><i class='fa fa-share-square' style='color:white;' aria-hidden='true'></i></span></button>"}
          ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            $($(nRow).find("td")[0]).css('text-align', 'center' );
            $($(nRow).find("td")[0]).css('font-weight', 'bold' );
            $($(nRow).find("td")[1]).css('text-align', 'center' );
            $($(nRow).find("td")[1]).css('font-weight', 'bold' );
            $($(nRow).find("td")[4]).css('text-align', 'left' );
            $($(nRow).find("td")[5]).css('text-align', 'center' );
            $($(nRow).find("td")[6]).css('text-align', 'left' );
            $($(nRow).find("td")[7]).css('text-align', 'left' );
            $($(nRow).find("td")[8]).css('text-align', 'center' );
            $($(nRow).find("td")[9]).css('text-align', 'center' );
            $($(nRow).find("td")[0]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[1]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[2]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[3]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[5]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[6]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[7]).css('word-wrap', 'break-word' );
         },
        "language":idioma_espanol,
         select: true
    });
}
function listar_documentos_enviados(){
    var tipo_usuario  = $("#txt_tipousuario").val();
    var txtidarea     = $("#txtidarea_principal").val();
    var combo_estado  = $("#combo_estado").val();
    if (tipo_usuario=="Administrador") {
        txtidarea = "%";
    }
    table = $("#tabla_documento").DataTable({
        "ordering":true,   
        "pageLength":10,
        "destroy":true,
        "async": false ,
        "responsive": true,
        "autoWidth": false,
        "ajax":{
            "method":"POST",
            "url":"../controlador/documento/controlador_documento_listar.php",
            data:{
                txtidarea:txtidarea,
                combo_estado:combo_estado
            }
        },
        "columns":[
            {"data":"documento_id"},
            {"data":"doc_nrodocumento"},
            {"data":"tipodo_descripcion"},
            {"data":"doc_dniremitente"},       
            {"data":"empleado"},
           // {"defaultContent":"<button style='font-size:13px;' type='button' class='ver_remitente btn btn-sm btn-primary'><span><i class='fa fa-search' aria-hidden='true'></i></span></button>"},
            {"defaultContent":"<button style='font-size:13px;' type='button' class='ver_datosdocumento btn btn-sm btn-danger'><span><i class='fa fa-search' aria-hidden='true'></i></span></button>"},
            {"defaultContent":"<button style='font-size:13px;' type='button' class='ver_datosseguimiento btn btn-sm btn-warning'><span><i class='fa fa-search' aria-hidden='true'></i></span></button>"},
            {"data":"origen_nombre"},
            {"data":"area_nombre"},
            {"data":"doc_estatus",
                render: function (data, type, row ) {
                    if (data=='PENDIENTE') {
                      return "<span class='badge badge-success m-r-5 m-b-5'>"+data+"</span>";
                    }
                    if (data=='RECHAZADO') {
                      return "<span class='badge badge-danger m-r-5 m-b-5'>"+data+"</span>";
                    }
                    if (data=='ACEPTADO') {
                      return "<span class='badge badge-success m-b-5'>"+data+"</span>";                 
                    }
                    if (data=='DERIVADO') {
                      return "<span style='background-color: #8900B0;color:white;' class='badge badge-purple m-b-5'>"+data+"</span>";                 
                    }
                    if (data=='FINALIZADO') {
                      return "<span style='background-color: black;color:white;' class='badge badge-purple m-b-5'>"+data+"</span>";                 
                    }
                }
            }  
            //{"defaultContent":"<button style='font-size:13px;' title='Derivar Documento' type='button' class='ver_derivar btn btn-sm btn bg-gradient-orange'><span><i class='fa fa-share-square' style='color:white;' aria-hidden='true'></i></span></button>"}
          ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            $($(nRow).find("td")[0]).css('text-align', 'center' );
            $($(nRow).find("td")[0]).css('font-weight', 'bold' );
            $($(nRow).find("td")[1]).css('text-align', 'center' );
            $($(nRow).find("td")[1]).css('font-weight', 'bold' );
            $($(nRow).find("td")[4]).css('text-align', 'left' );
            $($(nRow).find("td")[5]).css('text-align', 'center' );
            $($(nRow).find("td")[6]).css('text-align', 'center' );
            $($(nRow).find("td")[7]).css('text-align', 'left' );
            $($(nRow).find("td")[8]).css('text-align', 'left' );
            $($(nRow).find("td")[9]).css('text-align', 'center' );
            $($(nRow).find("td")[0]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[1]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[2]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[3]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[5]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[6]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[7]).css('word-wrap', 'break-word' );
         },
        "language":idioma_espanol,
         select: true
    });
}
function verificar_sesion() {
    var inicio = $("#txt_tipousuario").val();
    if (inicio=="Administrador" || inicio=="Secretario (a)" ) {
    }else{
        sesion();
    }
}
$('#tabla_documento').on('click','.ver_datosdocumento',function(){
    var data = table.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(table.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = table.row(this).data();
    }
    cmb_tipodocumento_ver =  data.tipodo_descripcion,
    txt_nrodocumentos_ver =  data.doc_nrodocumento,
    txt_folios_ver        =  data.doc_folio,
    txt_archivo           = data.doc_archivo,
    txtdni       =  data.doc_dniremitente,
    txtcelular   =  data.doc_celularremitente,
    txtemail     =  data.doc_emailremitente,
    txtdireccion =  data.doc_direccionremitente,
    txtruc       =  data.doc_ruc,
    txtempresa   =  data.doc_empresa,
    txtrepresentacion =  data.doc_representacion,
    txtdatos     =  data.empleado
    txt_asunto_ver        =  data.doc_asunto;
    verificar_sesion();
    $(".form-control").val("");

    if (txt_archivo!="") {
        var cadena =  '<object data="documento/'+txt_archivo+'"#zoom=100" type="application/pdf" style="width: 100%; height: 50%; min-height: 350px;">';
        $("#div_archivo").html(cadena);
    }else{
        var cadena =  '<br><br><br><br><br><br><br><br><br><br><label>NO EXISTE ARCHIVO</label><br><br><br><br><br><br><br>';
        $("#div_archivo").html(cadena);
    } 
    $('#cmb_tipodocumento_ver').html("<option>"+cmb_tipodocumento_ver+"</option>");
    $('#txt_nrodocumentos_ver').val(txt_nrodocumentos_ver);
    $("#txt_folios_ver").val(txt_folios_ver);
    $("#txt_asunto_ver").val(txt_asunto_ver);
    $("#txtdni").val(txtdni);
    $("#txtdatos").val(txtdatos);
    $("#txtcelular").val(txtcelular);
    $("#txtemail").val(txtemail);
    $("#txt_direccion").val(txtdireccion);
    $("#txt_ruc").val(txtruc);
    $("#txt_empresa").val(txtempresa);
    if (txtrepresentacion=="A Nombre Propio") {
        document.getElementById('div_juridico').style.display = 'none';
        $('#rad_representacion1').prop('checked', true);
    }
    if (txtrepresentacion=="A otra Persona Natural") {
        document.getElementById('div_juridico').style.display = 'none';
        $('#rad_representacion2').prop('checked', true);
    }
    if (txtrepresentacion=="Persona Jurídica") {
        document.getElementById('div_juridico').style.display = 'block';
        $('#rad_representacion3').prop('checked', true);
    }
    $('#modal_ver_documento').modal({backdrop: 'static', keyboard: false})
    $("#modal_ver_documento").modal("show");
});
$('#tabla_documento').on('click','.ver_derivar',function(){
    var data = table.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(table.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = table.row(this).data();
    }
    verificar_sesion();
    area_id          =  data.area_id,
    doc_nrodocumento =  data.doc_nrodocumento,
    area_nombre      =  data.area_nombre,
    movimiento_id    =  data.movimiento_id,
    txt_iddocumento  =  data.documento_id;
    combo_area_derivar(area_id);
    $("#txt_descripcion_derivar").val("");
    $('#txt_descripcion_derivar').removeClass("is-invalid").removeClass("is-valid");
    $('#txt_iddocumento_derivar').val(txt_iddocumento);
    $('#txt_area_origen_derivar').val(area_nombre);
    $('#txt_idmovimiento_derivar').val(movimiento_id);
    $('#txt_idarea_derivar').val(area_id);
    $('#lb_nrodocumento_derivar').html(txt_iddocumento);
    var f = new Date();
    var mes = (f.getMonth() +1);
    var mes_nuevo = "";
    if (mes<10) {
        mes_nuevo = "0"+mes;
    }else{
        mes_nuevo = mes;
    }
    var dia = f.getDate() ;
    var dia_nuevo = "";
    if (dia<10) {
        dia_nuevo = "0"+dia;
    }else{
        dia_nuevo = dia;
    }
    $("#txtformato").val("");
    $("#txt_archivo").val("");
    $("#lb_archivo").html("Seleccionar Archivo");
    //var elem = document.getElementById("myBar");  
      //  elem.style.width = '0%'; 
         $("#myBar").css("width", "0");
    $("#txt_fecharegistro").val(dia_nuevo + "/" + mes_nuevo + "/" + f.getFullYear());
    $('#modal_registrar_derivar').modal({backdrop: 'static', keyboard: false})
    $("#modal_registrar_derivar").modal("show");

});
$('#tabla_documento').on('click','.ver_datosseguimiento',function(){
    var data = table.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(table.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = table.row(this).data();
    }
    txt_iddocumento =  data.documento_id;
    $("#txt_nroseguimiento").html(txt_iddocumento);
    verificar_sesion();
    listar_seguimiento(txt_iddocumento);    
    $('#modal_datos_seguimiento').modal({backdrop: 'static', keyboard: false})
    $("#modal_datos_seguimiento").modal("show");
});
function ProcesarDatosTest() {
    $('#modal_procesar_datos').modal({backdrop: 'static', keyboard: false})
    $("#modal_procesar_datos").modal('show');
    var elem = document.getElementById("myBar");   
    var width = 10;
    var id = setInterval(frame, 200);
    function frame() {
      if (width >= 100) {
        clearInterval(id);                   
        $("#modal_procesar_datos").modal('hide');
      } else {
        width++; 
        elem.style.width = width + '%'; 
          elem.innerHTML = "Procesando cuestionario... " + width * 1  + '%';
      }
    } 
}
function derivar_finalizar_tramite() {
    verificar_sesion();
    var txt_iddocumento   = $("#txt_iddocumento_derivar").val();
    var txt_idareaactual  = $("#txt_idarea_derivar").val();
    var txt_idareadestino = $("#combo_area_derivar").val();
    var txt_descripcion   = $("#txt_descripcion_derivar").val();
    var txt_estado        = $("#combo_estatus_derivar").val();
    var txt_idusuario     = $("#txtidusuario_principal_usuario").val();
    var txt_idmovimiento  = $("#txt_idmovimiento_derivar").val();
    var txtformato        = $("#txtformato").val();
    if (txt_descripcion.length==0) {
        Boolean($("#txt_descripcion_derivar").val().length>0) ? $("#txt_descripcion_derivar").removeClass('is-invalid').addClass("is-valid") : $("#txt_descripcion_derivar").removeClass('is-valid').addClass("is-invalid"); 
        Swal.fire("Mensaje de Advertencia","Porfavor llene los campos vacios (*)","warning");
        var form = document.getElementById("form_derivar_finalizar_tramite");
        form.onsubmit = function(e){
            e.preventDefault();
        }
        return false;
    }

    if (txtformato.length>0) {
        if (txt_estado=="DERIVADO") {
            $('#modal_procesar_datos').modal({backdrop: 'static', keyboard: false})
            $("#modal_procesar_datos").modal('show');
            var elem = document.getElementById("myBar");   
            var width = 0;
            var id = setInterval(frame, 200);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);                   
                    $("#modal_procesar_datos").modal('hide');
                } else {
                    width++; 
                    elem.style.width = width + '%'; 
                    elem.innerHTML = "Procesando datos... " + width * 1  + '%';
                }
            } 
        }
        $(document).on('submit', '#form_derivar_finalizar_tramite', function() { 
            $("#btn_subir").attr("disabled",true);
            var data = $(this).serialize(); 
            $.ajax({  
                type : 'POST',
                mimeType: "multipart/form-data",
                url:'../controlador/documento/controlador_derivar_finalizar_registro_con_archivo.php',
                data:  new FormData(this),
                contentType: false,
                      cache: false,
                processData:false,
                success:function(resp) {
                    $("#btn_subir").attr("disabled",false);
                    $('body').css('padding-right','0');
                    if (resp!=10) {
                        if(resp!=0){
                            if (txt_estado=="DERIVADO") {
                                var elem = document.getElementById("myBar");  
                                elem.style.width = '0%'; 
                                $("#modal_procesar_datos").modal('hide');
                            }
                            if (resp==1) {
                                $("#txt_archivo_comprobante").val("");
                                Swal.fire("Mensaje de Confirmaci\u00F3n","Datos correctamente registrados, <b>el documento fue "+txt_estado+" con exito</b>","success")
                                .then ( ( value ) =>  {
                                    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
                                    $('.form-control').val("");
                                    traer_idunico_interno();
                                    var tipousuario = $("#txt_tipousuario").val();
                                    if (tipousuario=="Administrador") {
                                        listar_documentos_admin();
                                    }else{
                                        listar_documentos_secre();
                                    }
                                    $("#txtformato").val("");
                                    $("#txt_archivo").val("");
                                    $("#lb_archivo").html("Seleccionar Archivo");
                                    $("#modal_registrar_derivar").modal('hide');
                                });
                            }
                        }else{
                            Swal.fire("Mensaje de Error","Lo sentimos no se pudo completar el registro","error");
                            traer_idunico_interno();
                        }
                    }
                }  
            });
            return false;
        });
    }else{
        $("#btn_subir").attr("disabled",true);
        var postID = $("#postID").val();
        $.ajax({
            url:'../controlador/documento/controlador_derivar_finalizar_registro.php',
            type:'POST',
            data:{
                txt_iddocumento:txt_iddocumento,
                txt_idareaactual:txt_idareaactual,
                txt_idareadestino:txt_idareadestino,
                txt_descripcion:txt_descripcion,
                txt_estado:txt_estado,
                txt_idusuario:txt_idusuario,
                txt_idmovimiento:txt_idmovimiento,
                postID:postID
            }
        })
        .done(function(resp){
            alert("");
            if (resp!=10) {
                if (resp > 0) {
                    Swal.fire("Mensaje de Confirmaci\u00F3n","Datos correctamente registrados, <b>el documento fue "+txt_estado+" con exito</b>","success")
                    .then ( ( value ) =>  {
                        $("#txt_descripcion_derivar").val("");
                        $("#txtformato").val("");
                        $("#txt_archivo").val("");
                        $("#lb_archivo").html("Seleccionar Archivo");
                        $("#modal_registrar_derivar").modal('hide');
                        traer_idunico_interno();
                        var tipousuario = $("#txt_tipousuario").val();
                        if (tipousuario=="Administrador") {
                            listar_documentos_admin();
                        }else{
                            listar_documentos_secre();
                        }
                    });
                }else{
                  Swal.fire("Mensaje de Error","Lo sentimos, no se pudo completar el registro","error")
                }
            }
            $("#btn_subir").attr("disabled",false);
        })
    }
}
function combo_area_derivar(area_id){
    $.ajax({
        url:'../controlador/documento/controlador_combo_area_derivar_listar.php',
        type:'POST',
        data:{
            area_id:area_id
        }
    })
    .done(function(resp){
        var data = JSON.parse(resp);

        if (data.length > 0) {
            cadena = "";
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#combo_area_derivar").html(cadena);
        }
        else{
            var cadena = "<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#combo_area_derivar").html(cadena);
        }
    })
}
var table2;
function listar_seguimiento(idseguimiento){
    table2 = $("#tabla_documento_seguimiento").DataTable({
        "ordering":false,   
        "pageLength":10,
        "destroy":true,
        "async": false ,
        "responsive": true,
        "autoWidth": false,
        "ajax":{
            "method":"POST",
            "url":"../controlador/documento/controlador_documento_seguimiento_listar.php",
            data:{
                idseguimiento:idseguimiento
            }
        },
        "columns":[
            {"defaultContent":""},
            {"data":"area_nombre"},
            {"data":"fecharegistro"},
            {"data":"mov_descripcion_original"},
            {"data":"mov_archivo",
                render: function (data, type, row ) {
                    if (data!="") {
                        return "<button class='pdf btn btn-warning  btn-xs' title='Archivo Anexado' type='button' ><i class='fas fa-2x fa-file-pdf'></i></button>";
                    }else{
                        return "<button class='btn btn-default  btn-xs' title='Archivo no Anexado' type='button' ><i class='fas fa-2x fa-file-pdf'></i></button>";
                    }
                }
            }
        ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            $($(nRow).find("td")[0]).css('text-align', 'center' );
            $($(nRow).find("td")[0]).css('font-weight', 'bold' );
            $($(nRow).find("td")[1]).css('text-align', 'left' );
            $($(nRow).find("td")[2]).css('text-align', 'center' );
            $($(nRow).find("td")[3]).css('text-align', 'left' );
            $($(nRow).find("td")[4]).css('text-align', 'center' );
            $($(nRow).find("td")[7]).css('text-align', 'center' );
            $($(nRow).find("td")[8]).css('text-align', 'center' );
            $($(nRow).find("td")[9]).css('text-align', 'center' );
            $($(nRow).find("td")[0]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[1]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[2]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[3]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[5]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[6]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[7]).css('word-wrap', 'break-word' );
         },
        "language":idioma_espanol,
         select: true
    });
    table2.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_documento_seguimiento').DataTable().page.info();
        table2.column(0, { page: 'current' }).nodes().each( function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        } );
    } );
}
$('#tabla_documento_seguimiento').on('click','.pdf',function(){
    var data = table2.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(table.row(this).child.isShown()){//Cuando esta en tamaño responsivo
      var data = table2.row(this).data();
    }
    window.open("documento/"+data.mov_archivo+"#zoom=100");
})
function listar_documentos_secre(){
    var tipo_usuario  = $("#txt_tipousuario").val();
    var txtidarea     = $("#txtidarea_principal").val();
    var combo_estado  = $("#combo_estado").val();
    if (tipo_usuario=="Administrador") {
        txtidarea = "%";
    }
    table = $("#tabla_documento").DataTable({
        "ordering":true,   
        "pageLength":10,
        "destroy":true,
        "async": false ,
        "responsive": true,
        "autoWidth": false,
        "ajax":{
            "method":"POST",
            "url":"../controlador/documento/controlador_documento_secretaria_listar.php",
            data:{
                txtidarea:txtidarea,
                combo_estado:combo_estado
            }
        },
        "columns":[
            {"data":"documento_id"},
            {"data":"doc_nrodocumento"},
            {"data":"tipodo_descripcion"},
            {"data":"doc_dniremitente"},       
            {"data":"empleado"},
           // {"defaultContent":"<button style='font-size:13px;' type='button' class='ver_remitente btn btn-sm btn-primary'><span><i class='fa fa-search' aria-hidden='true'></i></span></button>"},
            {"defaultContent":"<button style='font-size:13px;' type='button' class='ver_datosdocumento btn btn-sm btn-danger'><span><i class='fa fa-search' aria-hidden='true'></i></span></button>"},
            {"defaultContent":"<button style='font-size:13px;' type='button' class='ver_datosseguimiento btn btn-sm btn-warning'><span><i class='fa fa-search' aria-hidden='true'></i></span></button>"},
            {"data":"origen_nombre"},
            {"data":"mov_estatus",
                render: function (data, type, row ) {
                    if (data=='PENDIENTE') {
                        if(row.cant_dias==0){
                            return "<span style='background-color:black;color:white;' class='badge badge-success m-r-5 m-b-5'>"+data+"</span>";
                        }
                        if(row.cant_dias==1){
                            return "<span style='background-color:black;color:white;' class='badge badge-success m-r-5 m-b-5'>"+data+"</span>";
                        }
                        if(row.cant_dias==2){
                            return "<span class='badge badge-success m-r-5 m-b-5'>"+data+"</span>";
                        }
                        if(row.cant_dias==3){
                            return "<span style='background-color: #ff7e00;color:white;' class='badge badge-success m-r-5 m-b-5'>"+data+"</span>";
                        }
                        if(row.cant_dias>=4){
                            return "<span class='badge badge-danger m-r-5 m-b-5'>"+data+"</span>";
                        }
                    }
                    if (data=='RECHAZADO') {
                      return "<span class='badge badge-primary m-r-5 m-b-5'>"+data+"</span>";
                    }
                    if (data=='ACEPTADO') {
                      return "<span style='background-color:#ff851b' class='badge badge-success m-b-5'>"+data+"</span>";                 
                    }
                    if (data=='DERIVADO') {
                      return "<span style='background-color: #8900B0;color:white;' class='badge badge-purple m-b-5'>"+data+"</span>";                 
                    }
                    if (data=='FINALIZADO') {
                      return "<span style='background-color: black;color:white;' class='badge badge-purple m-b-5'>"+data+"</span>";                 
                    }
                }
            },  
            {"data":"mov_estatus",
                render: function (data, type, row ) {
                    if (data=="PENDIENTE") {
                        if (row.area_id==1) {
                            return "<button style='font-size:13px;' title='Derivar Documento' type='button' class='ver_derivar btn btn-sm btn bg-gradient-orange'><span><i class='fa fa-share-square' style='color:white;' aria-hidden='true'></i></span></button>";
                        }else{
                            return "<button style='font-size:13px;' title='Aceptar o Rechazar Documento' type='button' class='ver_aceptar_rechazar btn btn-sm btn bg-gradient-danger'><span><i class='fa fa-check' style='color:white;' aria-hidden='true'></i>&nbsp;<i class='fa fa-times' style='color:white;' aria-hidden='true'></i></span></button>";
                        }
                    }
                    if (data=="ACEPTADO") {
                        return "<button style='font-size:13px;' title='Derivar Documento' type='button' class='ver_derivar btn btn-sm btn bg-gradient-orange'><span><i class='fa fa-share-square' style='color:white;' aria-hidden='true'></i></span></button>";
                    }
                    if (data=="RECHAZADO") {
                        return "<button disabled style='font-size:13px;background-color:black' title='Documento Rechazado' type='button' class='btn btn-sm btn bg-gradient-black'><span><i class='fa fa-user-times' style='color:white;' aria-hidden='true'></i></span></button>";
                    }
                    if (data=="DERIVADO") {
                        return "<button disabled style='font-size:13px;background-color:black' title='Documento Derivado' type='button' class='btn btn-sm btn bg-gradient-black'><span><i class='fa fa-retweet' style='color:white;' aria-hidden='true'></i></span></button>";
                    }
                    if (data=="FINALIZADO") {
                        return "<button disabled style='font-size:13px;background-color:black' title='Documento Finalizado' type='button' class='btn btn-sm btn bg-gradient-black'><span><i class='fa fa-sign-out-alt' style='color:white;' aria-hidden='true'></i></span></button>";
                    }
                }
            }, 
          ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            $($(nRow).find("td")[0]).css('text-align', 'center' );
            $($(nRow).find("td")[0]).css('font-weight', 'bold' );
            $($(nRow).find("td")[1]).css('text-align', 'center' );
            $($(nRow).find("td")[1]).css('font-weight', 'bold' );
            $($(nRow).find("td")[4]).css('text-align', 'left' );
            $($(nRow).find("td")[5]).css('text-align', 'center' );
            $($(nRow).find("td")[6]).css('text-align', 'center' );
            $($(nRow).find("td")[7]).css('text-align', 'center' );
            $($(nRow).find("td")[7]).css('font-weight', 'bold' );
            $($(nRow).find("td")[8]).css('text-align', 'center' );
            $($(nRow).find("td")[9]).css('text-align', 'center' );
            $($(nRow).find("td")[0]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[1]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[2]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[3]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[5]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[6]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[7]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[8]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[9]).css('word-wrap', 'break-word' );
         },
        "language":idioma_espanol,
         select: true
    });
}
function mantenimiento() {
    Swal.fire("Mensaje de Aviso","Opci&oacute;n en Mantenimiento","info");
}
$('#tabla_documento').on('click','.ver_aceptar_rechazar',function(){
    var data = table.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(table.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = table.row(this).data();
    }
    txt_idmovimiento =  data.movimiento_id,
    txt_nrodocumento =  data.doc_nrodocumento,
    txt_tipodocumento =  data.tipodo_descripcion,
    txt_iddocumento =  data.documento_id;
    verificar_sesion();
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn_swal btn btn-sm btn-success',
        cancelButton: 'btn_swal btn btn-sm btn-outline-success',
        actions: 'orientacion_swal',
      },
      buttonsStyling: false
    });
    traer_idunico_interno();
    swalWithBootstrapButtons.fire({
        title: "<label>Mensaje de advertencia</label>",
        html: "<label>¿Desea <b style='color:#9B0000;'>ACEPTAR</b> o <b style='color:#9B0000;'>RECHAZAR</b> el Tr&aacute;mite derivado a su &aacute;rea?</label>"+
              "<br><br><table class='table_swal' style='width:100%;color:black!important' align='center'>"+
              "<tr><td style='width:5%'></td><td colspan='2' style='border: 2px solid black;font-weight:bold;text-align:center;font-weight: bold;background-color: #E4E4E4'>DATOS TR&Aacute;MITE"+
              "<input type='text' hidden name='postID'  id='postID'><input type='text' value='"+txt_idmovimiento+"' hidden id='txt_idmovimiento'><input hidden type='text' value='"+txt_iddocumento+"' id='txt_iddocumento'></td><td style='width:5%'></td></tr>"+
              "<tr><td style='width:5%'></td><td style='border: 2px solid black;font-weight:bold;text-align:left;width: 20%;font-weight: bold;background-color: #E4E4E4'>NRO SEGUIMIENTO</td><td style='border: 2px solid black;text-align:left;width:70%;'>"+txt_iddocumento+"</td><td style='width:5%'></td></tr>"+
              "<tr><td style='width:5%'></td><td style='border: 2px solid black;font-weight:bold;text-align:left;width: 20%;font-weight: bold;background-color: #E4E4E4'>NRO TR&Aacute;MITE</td><td  style='border: 2px solid black;text-align:left;width:70%;'>"+txt_nrodocumento+"</td><td style='width:5%'></td></tr>"+
              "<tr><td style='width:5%'></td><td style='border: 2px solid black;font-weight:bold;text-align:left;width: 20%;font-weight: bold;background-color: #E4E4E4'>TIPO DOCUMENTO</td><td  style='border: 2px solid black;text-align:left;width:70%;'>"+txt_tipodocumento+"</td><td style='width:5%'></td></tr>"+
              "<tr><td style='width:5%'></td><td style='border: 2px solid black;text-align:left;width: 20%;'><label>DESCRIPCI&Oacute;N</label></td><td style='border: 2px solid black;'><textarea autofocus='autofocus' rows='2' id='txt_asunto' class='form-control' style='resize: none' maxlength='150' placeholder='Descripci&oacute;n del tr&aacute;mite'></textarea></td><td style='width:5%'></td></tr> "+
              "<tr><td style='width:5%'></td><td style='width: 20%;'></td>"+
              "<td colspan='2' style='text-align:right'>"+
              "<button class='btn_swal btn btn-sm btn-outline-success btn_cerrar'><i class='fa fa-times'></i>&nbsp;CERRAR</button> "+
              "<button class='btn_swal btn btn-sm btn-success btn_rechazar'><i class='fa fa-ban'></i>&nbsp;RECHAZAR</button> "+
              "<button class='btn_swal btn btn-sm btn-success btn_aceptar'><i class='fa fa-check'></i>&nbsp;ACEPTAR</button>"+
              "</td></tr></table>",
        type: "warning",
        showCancelButton: false,
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey:false,
        allowEnterKey:false,
        focusConfirm:false
    });
    $("#txt_asunto").focus();
    $(".form-control").on('paste', function(e){
        e.preventDefault();
    });

    $(document).on( "click",".btn_aceptar",  function(e){
        var txt_asunto = $("#txt_asunto").val();
        if (txt_asunto.length==0) {
            $("#txt_asunto").focus();
            Boolean($("#txt_asunto").val().length>0) ? $("#txt_asunto").removeClass('is-invalid').addClass("is-valid") : $("#txt_asunto").removeClass('is-valid').addClass("is-invalid"); 
            return;
        }
        var txt_idmovimiento  =  $("#txt_idmovimiento").val();
        var txt_iddocumento   =  $("#txt_iddocumento").val();
        var postID            =  $("#postID").val();

        $.ajax({
            url:'../controlador/documento/controlador_aceptar_rechazar_docomento.php',
            type:'POST',
            data:{
                txt_idmovimiento:txt_idmovimiento,
                txt_iddocumento:txt_iddocumento,
                txt_asunto:txt_asunto,
                txt_tipo:'ACEPTADO',
                postID:postID

            }
        })
        .done(function(resp) {
            if (resp!=10) {
                if (resp==1) {
                    Swal.fire("Mensaje de Confirmaci&oacute;n","Tr&aacute;mite <b>aceptado</b> con exito!","success")
                    .then ( ( value ) =>  {
                        verificar_sesion();
                        listar_documentos_secre();
                        traer_idunico_interno();
                    }); 
                }
            }
        })

    });
    $(document).on( "click",".btn_rechazar",  function(e){
        var txt_asunto = $("#txt_asunto").val();
        if (txt_asunto.length==0) {
            $("#txt_asunto").focus();
            Boolean($("#txt_asunto").val().length>0) ? $("#txt_asunto").removeClass('is-invalid').addClass("is-valid") : $("#txt_asunto").removeClass('is-valid').addClass("is-invalid"); 
            //return Swal.fire("Falta datos","","error");
            return;
        }
        var txt_idmovimiento  =  $("#txt_idmovimiento").val();
        var txt_iddocumento   =  $("#txt_iddocumento").val();
        var postID            =  $("#postID").val();

        $.ajax({
            url:'../controlador/documento/controlador_aceptar_rechazar_docomento.php',
            type:'POST',
            data:{
                txt_idmovimiento:txt_idmovimiento,
                txt_iddocumento:txt_iddocumento,
                txt_asunto:txt_asunto,
                txt_tipo:'RECHAZADO',
                postID:postID

            }
        })
        .done(function(resp) {
            if (resp!=10) {
                if (resp==1) {
                    Swal.fire("Mensaje de Confirmaci&oacute;n","Tr&aacute;mite <b>rechazado</b> con exito!","success")
                    .then ( ( value ) =>  {
                        verificar_sesion();
                        listar_documentos_secre();
                        traer_idunico_interno();
                    }); 
                }
            }
        })
    });
    $(document).on( "click",".btn_cerrar",  function(e){
        swal.close();
    });
});
function Generar_Reporte(){
    var ndocumento  = document.getElementById("lb_nrodocumento").innerHTML;
    window.open("Vista/MPDF/REPORTES/imprimir_ticket_tramite.php?codigo="+ndocumento+"#zoom=100","ventana1","scrollbars=NO");

}
//=====================================================================================
//=====================================================================================
//==========================REGISTRAR DOCUMENTO INTERNO================================
//=====================================================================================
//=====================================================================================
function traer_idunico_interno() {
    $.ajax({
        url:'../controlador/documento/controlador_generar_codigo.php',
        type:'POST'
    })
    .done(function(resp){
        $("#postID").val(resp);
    })
}
function combo_tipodocumento_interno(){
    $.ajax({
        url:'../controlador/documento/controlador_combo_documento_listar.php',
        type:'POST'
    })
    .done(function(resp){
        var data = JSON.parse(resp);

        if (data.length > 0) {
            var cadena = "";
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#cmb_tipodocumento").html(cadena);
        }
        else{
            var cadena = "<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cmb_tipodocumento").html(cadena);
        }
    })
}
function registrar_tramite_interno() {
    var inicio = $("#txt_verificar").val();
    if (inicio=="Administrador" || inicio=="Secretario (a)" ) {
    }else{
        sesion();
        var form = document.getElementById("form_registro_tramite");
        form.onsubmit = function(e){
            e.preventDefault();
        }
        return false;
    }
    $("#myBar_2").css("width", "0%");
    var elem = document.getElementById("myBar_2");  
    elem.style.width = '0%'; 
    document.getElementById('div_progress').style.display = 'block';
    var cbm_representacion ="";
    var porrepresentacion=document.getElementsByName("r1");
    for(var i=0;i<porrepresentacion.length;i++){
      if(porrepresentacion[i].checked)
          cbm_representacion=porrepresentacion[i].value;
    }
    var txtdni        = $("#txtdni").val();
    var txtnombre     = $("#txtnombre").val();
    var txtapepat     = $("#txtapepat").val();
    var txtapemat     = $("#txtapemat").val();
    var txtcelular    = $("#txtcelular").val();
    var txtemail      = $("#txtemail").val();
    var txt_direccion = $("#txt_direccion").val();
    var txt_ruc       = $("#txt_ruc").val();
    var txt_empresa   = $("#txt_empresa").val();

    var cmb_procedenciadocumento = $('#cmb_procedenciadocumento').val();
    var cmb_tipodocumento = $('#cmb_tipodocumento').val();
    var txt_nrodocumentos = $('#txt_nrodocumentos').val();
    var txt_folios  = $("#txt_folios").val();
    var txt_asunto  = $("#txt_asunto").val();
    var txtformato  = $("#txtformato").val();
    var nombre_tipo   = $('select[name="cmb_tipodocumento"] option:selected').text();
    var area_destino = $("#cmb_area_destino").val();

    ValidacionInputRegistroTramite('txtdni','txtnombre','txtapepat','txtapemat','txtemail','txt_direccion','txt_nrodocumentos','txt_folios','txt_asunto','txt_ruc','txt_empresa','txt_archivo');
    if (cmb_procedenciadocumento==0 || area_destino==0 || txtdni.length==0 || txtnombre.length==0 || txtapepat.length==0 || txtapemat.length==0 || txtemail.length==0 || txt_direccion.length==0||txt_nrodocumentos.length==0 || txt_folios.length==0 || txt_asunto.length==0 || txtformato.length==0) {
        Swal.fire("Mensaje de Advertencia","Porfavor <b>llene los campos vacios (*)</b>","warning");
        var form = document.getElementById("form_registro_tramite");
        form.onsubmit = function(e){
            e.preventDefault();
        }
        return false;
    }
    if (cbm_representacion == "Persona Jurídica") {
        if (txt_ruc.length==0 || txt_empresa.length==0) {
            Swal.fire("Mensaje de Advertencia","Porfavor <b>llene los campos vacios (*)</b>","warning");
            var form = document.getElementById("form_registro_tramite");
            form.onsubmit = function(e){
                e.preventDefault();
            }
            return false;
        }
    }
    //alert("");
    $('#modal_procesar_datos_2').modal({backdrop: 'static', keyboard: false})
    $("#modal_procesar_datos_2").modal('show');
    var elem = document.getElementById("myBar_2");   
    var width = 0;
    var id = setInterval(frame, 200);
    function frame() {
        if (width >= 100) {
            clearInterval(id);                   
            $("#modal_procesar_datos_2").modal('hide');
        } else {
            width++; 
            elem.style.width = width + '%'; 
            elem.innerHTML = "Procesando datos... " + width * 1  + '%';
        }
    } 
    $(document).on('submit', '#form_registro_tramite', function() { 
        $("#btn_subir").attr("disabled",true);
        var data = $(this).serialize(); 
        $.ajax({  
            type : 'POST',
            mimeType: "multipart/form-data",
            url  : '../controlador/documento/controlador_documento_registro_interno.php',
            data:  new FormData(this),
            contentType: false,
                  cache: false,
            processData:false,
            success:function(resp) {
                $("#btn_subir").attr("disabled",false);
                $("#myBar_2").css("width", "100%");
                var elem = document.getElementById("myBar_2");  
                elem.style.width = '100%'; 
                $('body').removeClass('modal-open');
                document.querySelector('body').classList.remove('modal-open');
                $(".modal-backdrop").remove();
                document.getElementById('div_progress').style.display = 'none';
                $('body').css('padding-right','0');
                //$("#modal_procesar_datos_2").modal('hide');
                if (resp!=10) {
                    if(resp!=0){
                        document.querySelector('body').classList.remove('modal-open');
                        $(".modal-backdrop").remove();

                        document.getElementById('div_progress').style.display = 'none';
                        if (resp==2) {
                            Swal.fire("Mensaje de Advertencia","Lo sentimos, el <b>nro de documento</b> ingresado ya se encuentra registrado en nuestra data","warning");             
                            $('#txt_nrodocumentos').removeClass("is-valid").addClass("is-invalid");
                            traer_idunico_interno();
                        }else {
                            document.querySelector('body').classList.remove('modal-open');
                            $(".modal-backdrop").remove();
                            document.getElementById('div_progress').style.display = 'none';
                            $("#modal_procesar_datos_2").modal('hide');
                            $("#txt_archivo_comprobante").val("");
                            Swal.fire("Mensaje de Confirmaci\u00F3n","Datos correctamente registrados,<b> nuevo documento registrado</b><br><b>Nro Seguimiento:<b><label style='color:#9B0000;'>&nbsp; "+resp+"</label><br><b>Se Envio el nro de seguimiento al correo brindado</b>","success")
                            .then ( ( value ) =>  {
                                $('.form-control').removeClass("is-invalid").removeClass("is-valid");
                                $('.form-control').val("");
                                document.getElementById("form_registro_tramite").reset();
                                $("#cmb_area_destino").val(0).trigger("change");
                                document.getElementById('div_juridico').style.display = 'none';
                                traer_idunico_interno();
                                traer_datosremitente();
                                $("#btn_subir").addClass("disabled");
                                EnviarMensajeCorreoRegistro_interno(resp,txt_nrodocumentos,nombre_tipo,txtemail);
                            });
                        }
                        
                    }else{
                        document.querySelector('body').classList.remove('modal-open');
                        $(".modal-backdrop").remove();
                        document.getElementById('div_progress').style.display = 'none';
                        Swal.fire("Mensaje de Error","Lo sentimos no se pudo completar el registro","error");
                        traer_idunico_interno();
                    }
                }
            }  
        });
        return false;
    });
}
function combo_area_interno(){
    $.ajax({
        url:'../controlador/usuario/controlador_combo_area_listar.php',
        type:'POST'
    })
    .done(function(resp){
        var data = JSON.parse(resp);

        if (data.length > 0) {
            cadena = "";
            cadena += "<option value='0'>SELECCIONE UNA PROCEDENCIA</option>";
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#cmb_procedenciadocumento").html(cadena);
            var area = $("#txtidarea_principal").val();
            
            if (area!="") {
                $("#cmb_procedenciadocumento").attr("readonly","readonly");
                $("#cmb_procedenciadocumento").val(area).trigger("change");
            }else{
                $("#cmb_procedenciadocumento").val(0).trigger("change");
            }
        }
        else{
            var cadena = "<option value='0'>NO SE ENCONTRARON REGISTROS</option>";
            $("#cmb_procedenciadocumento").html(cadena);
        }
    })
}
function combo_area_destino_interno(){
    $.ajax({
        url:'../controlador/usuario/controlador_combo_area_listar.php',
        type:'POST'
    })
    .done(function(resp){
        var data = JSON.parse(resp);

        if (data.length > 0) {
            cadena = "";
            cadena += "<option value='0'>&Aacute;REA DE DESTINO</option>";
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#cmb_area_destino").html(cadena);
        }
        else{
            var cadena = "<option value='0'>NO SE ENCONTRARON REGISTROS</option>";
            $("#cmb_area_destino").html(cadena);
        }
    })
}
function EnviarMensajeCorreoRegistro_interno(id_seguimiento,nro_tramite,tipo_tramite,email) {
    $.ajax({
        url:'../controlador/documento/controlador_enviar_mensaje_exterior.php',
        type:'POST',
        data:{
            id_seguimiento:id_seguimiento,
            nro_tramite:nro_tramite,
            tipo_tramite:tipo_tramite,
            txtemail:email
        }
    })
    .done(function(resp){
    })
}
function traer_datosremitente() {
    var usuario = $("#txtnombre_principal_usuario").val();
    $.ajax({
        url:'../controlador/usuario/controlador_administrador_buscar.php',
        type:'POST',
        data:{
            buscar:usuario
        }
    })
    .done(function(resp){
        var data = JSON.parse(resp);
        if (data.length > 0) {
            $("#txtdni").val(data[0][15]);
            $("#txtnombre").val(data[0][10]);
            $("#txtapepat").val(data[0][11]);
            $("#txtapemat").val(data[0][12]);
            $("#txtemail").val(data[0][17]);     
            $("#txtcelular").val(data[0][16]);
            $("#txt_direccion").val(data[0][23]);
        }
    })
}