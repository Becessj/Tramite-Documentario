function Limpiar_POST_cuenta() {
	$("#txtactual").val("");
	$("#txtnueva").val("");
	$("#txtrepetir").val("");
}
function VerificarUsuario(){
	var u = $("#txt_usuario").val();
	var p = $("#txt_pass").val();
	if (u.length == 0 || p.length == 0) {
		Swal.fire("Campos incompletos!!","");
	}else{
		$.ajax({
			url:'controlador/usuario/controlador_verificar_usuario.php',
			type:'POST',
			data:{
				user:u,
				pass:p
			}
		})
		.done(function(resp){
			if (resp==0) {
				var resultado="";
				resultado = 'Usuario y/o contrase\u00f1a incorrectas';
			    Swal.fire("Mensaje de error",resultado,"error");
			}else{
				var data = JSON.parse(resp);	
				if (data[0][9]!='Administrador') {
					if (data[0][18]=="INACTIVO"){
						return Swal.fire("Lo sentimos la cuenta "+u+" pertenece a un trabajador suspendido","Para mas informacion comuniquese con su administrador","warning");
					}
				}			
				
				if (data[0][7]=="INACTIVO"){
					return Swal.fire("Mensajde de advertencia","Lo sentimos la cuenta "+u+" esta suspendida"+"Para mas informacion comuniquese con su administrador","warning");
				}
				$.ajax({
					url:'controlador/usuario/controlador_iniciar_sesion.php',
					type:'POST',
					data:{
						iduser:data[0][0],
						user:data[0][1],
						tipousuario:data[0][9],
						idtrabajador:data[0][5]
					}
				})
				.done(function(resp){
					let timerInterval
					Swal.fire({
					  title: 'Bienvenido datos correctos',
					  html: 'Usted sera redireccionado en <b></b> milliseconds.',
					  timer: 2000,
					  timerProgressBar: true,
					  allowOutsideClick: false,
				      allowEscapeKey:false,
				      allowEnterKey:false,
				      focusConfirm:false,
					  onBeforeOpen: () => {
						Swal.showLoading()
						timerInterval = setInterval(() => {
						  const content = Swal.getContent()
						  if (content) {
							const b = content.querySelector('b')
							if (b) {
							  b.textContent = Swal.getTimerLeft()
							}
						  }
						}, 100)
					  },
					  onClose: () => {
						clearInterval(timerInterval)
					  }
					}).then((result) => {
					  /* Read more about handling dismissals below */
					  if (result.dismiss === Swal.DismissReason.timer) {
						location.reload(true);
					  }
					})
				
				})
			}
		})
	}
}
function traer_administrador(){
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
		$("#txtemail_perfil").val("");
		if (data.length > 0) {
			if (data[0][8]!=="") {
				$("#lb_area").html(data[0][19]);
			}else{
				//$("#lb_area").html("");
			}
			$("#lb_correo_usuario").html(data[0][22]);
			$("#lb_nombreusuario").html(data[0][10]+" "+data[0][11]+" "+ data[0][12]);
			$("#txtoriginal").val(data[0][2]);

			$("#txtdni_perfil").val(data[0][15]);
			$("#txtnombre_perfil").val(data[0][10]);
			$("#txtapepat_perfil").val(data[0][11]);
			$("#txtapemat_perfil").val(data[0][12]);
			$("#txtemail_perfil").val(data[0][17]);		
			$("#txtcelular_perfil").val(data[0][16]);
			$("#txt_direccion_perfil").val(data[0][23]);
			//alert(data[0][14]);
			$('#txt_fecha_perfil').data("datetimepicker").date(data[0][14]);
			$("#txtidarea_principal").val(data[0][8]);
			$("#div_fotoperfil2").html('<img  class="img-circle" style="width: 45px;height: 45px;" src="empleado/'+ data[0][24]+'" alt="...">');
			if (data[0][24]!="") {
				var cadena = '<img src="empleado/'+data[0][24]+'" class="kv-preview-data file-preview-image file-zoom-detail" align="center" style="width: 54%;height:auto;text-align:center">';
				$("#div_fotoperfil").html(cadena);
			}else{
				var cadena =  '<br><br><label>NO EXISTE IMAGEN</label><br><br><br>';
				$("#div_fotoperfil").html(cadena);
			}
			Traer_Widget_Area(data[0][8]);
		}
	})
}
function abrirModalusuario(){
    Limpiar_POST_cuenta();
    traer_administrador();
	$('#modal_cuenta').modal({backdrop: 'static', keyboard: false})
	$("#modal_cuenta").modal("show");
}
function Editar_cuenta(){
	var usuario = $("#txtusuario").val();
	var actual  = $("#txtactual").val();
	var nueva   = $("#txtnueva").val();
	var repetir = $("#txtrepetir").val();
	var original= $("#txtoriginal").val();
	//Swal.fire("Mensaje de Advertencia","Opci&oacute;n bloqueada para la demo","warning");
    //return;
	if (actual.length==0 || nueva.length==0 || repetir.length==0) {
		return Swal.fire("Mensaje de Advertencia","<b>Falta llenar campos</b>","warning");
	}
	if (nueva != repetir) {
		return Swal.fire("Mensaje de Advertencia","Debes ingresar la misma clave dos veces para confirmar","warning");
	}
	$.ajax({
		type:'POST',
		url:'../controlador/usuario/controlador_cuenta_actualizar.php',
		data:{
			_usuario:usuario,
			_actual:actual,
			_nueva:nueva,
			_original:original
		}
	})
	.done(function(resp){
		if (resp==2) {
			return Swal.fire("Mensaje de Advertencia","La clave actual ingresada no coincide con la clave actual almacenada","warning");
		}
		if (resp>0) {
			Swal.fire("Mensaje de Confirmaci\u00F3n","Su cuenta fue Actualizada con Exito!!!","success")
			.then ( ( value ) =>  {
				Limpiar_POST_cuenta();
                $("#modal_cuenta").modal('hide');
            }); 
		}else{
			Swal.fire("Mensaje de error","No se pudo actualizar su Cuenta!!!","error");
		}
	})
}
function validar_email(email) {
	var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email) ? true : false;
}
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
function abrirModalCuentaPerfil(){
    traer_administrador();
	$('#modal_perfil').modal({backdrop: 'static', keyboard: false})
	$("#modal_perfil").modal("show");
}
function abrirModalFotoPerfil(){
    traer_administrador();
    $("#txtformato_foto").val("");
    $("#txt_archivo_foto").val("");
    $("#lb_archivo_foto").html("Seleccionar Archivo");
    traer_idunico_principal();
	$('#modal_foto_perfil').modal({backdrop: 'static', keyboard: false})
	$("#modal_foto_perfil").modal("show");
}
function traer_idunico_principal() {
    $.ajax({
        url:'../controlador/documento/controlador_generar_codigo.php',
        type:'POST'
    })
    .done(function(resp){
        $("#postID_principal").val(resp);
    })
}
function editar_foto() {
	var formato = $("#txtformato_foto").val();
	if (formato.length==0) {
		Swal.fire("Mensaje de Advertencia","<b>seleccione foto de perfil</b>","warning");
        var form = document.getElementById("form_editar_foto");
        form.onsubmit = function(e){
            e.preventDefault();
        }
        return false;
	}

	$(document).on('submit', '#form_editar_foto', function() { 
        $("#btn_subirfoto").attr("disabled",true);
        var data = $(this).serialize(); 
        $.ajax({  
            type : 'POST',
            mimeType: "multipart/form-data",
            url:'../controlador/usuario/controlador_usuario_foto_perfil.php',
            data:  new FormData(this),
            contentType: false,
                  cache: false,
            processData:false,
            success:function(resp) {
                $("#btn_subirfoto").attr("disabled",false);
                if (resp!=10) {
                    if(resp!=0){
                        if (resp==1) {
                            $("#txt_archivo_comprobante").val("");
                            Swal.fire("Mensaje de Confirmaci\u00F3n","Datos correctamente actualizados, <b>Foto de perfil actualizado</b>","success")
                            .then ( ( value ) =>  {
                                traer_idunico_principal();
                                $("#txtformato_foto").val("");
                                $("#txt_archivo_foto").val("");
                                $("#lb_archivo_foto").html("Seleccionar Archivo");
                                $("#modal_foto_perfil").modal('hide');
                                traer_administrador();
                            });
                        }
                        
                    }else{
                        Swal.fire("Mensaje de Error","Lo sentimos no se pudo completar el registro","error");
                        traer_idunico_principal();
                    }
                }
            }  
        });
        return false;
    });
}
function Editar_Perfil(){
    //Swal.fire("Mensaje de Advertencia","Opci&oacute;n bloqueada para la demo","warning");
    //return;
	var id        = $("#txtidtrabajador_principal").val();
	var nrodocumento  = $("#txtdni_perfil").val();
	var nombre    = $("#txtnombre_perfil").val();
	var apepat    = $("#txtapepat_perfil").val();
	var apemat    = $("#txtapemat_perfil").val();
	var fecnacimiento = $("#txt_fechanacimiento_perfil").val();    	
	var celular   = $("#txtcelular_perfil").val();
	var email     = $("#txtemail_perfil").val();
	var direccion = $('#txt_direccion_perfil').val();  

	if(nombre.length==0 || apepat.length==0 || apemat.length==0 || direccion.length==0 || fecnacimiento.length==0){
	  return   Swal.fire("Mensaje de Advertencia","Porfavor llene los campos vacios","warning");
	}
	var fechaactual = new Date();
    var anio = fechaactual.getFullYear();
	var fecha = fecnacimiento.split('/');
	var edad =  anio - fecha[2];
	var fecnacimiento = fecha[2] + '-' + fecha[1] + '-' + fecha[0];
	if(edad<18){
		return   Swal.fire("Mensaje de Advertencia","El empleado debe ser mayor de edad","warning");
	}
	if (validar_email(email)) {
	}else{
	  return Swal.fire("Mensaje de Error","Lo sentimos, formato de email ingresado no es valido.", "error");
	}
	  $.ajax({
		url:'../controlador/empleado/controlador_empleado_editar.php',
		type:'POST',
		data:{
			id:id,
			nrodocumento:nrodocumento,
			nombre:nombre,
			apepat:apepat,
			apemat:apemat,
			fecnacimiento:fecnacimiento,
			celular:celular,
			email:email,
			direccion:direccion,
			estado:'ACTIVO'
		}
	})
	.done(function(resp){
		if (resp > 0) {
		  if (resp==1) {
		  	traer_administrador();
		  	
			Swal.fire("Mensaje de Confirmaci\u00F3n","<b>Perfil</b> correctamente actualizado","success")
			.then ( ( value ) =>  {
				$("#modal_perfil").modal('hide');
			});				
		  }else {
			Swal.fire("Mensaje de Advertencia","Lo sentimos, el nro de documento ingresado ya esta registrado en nuestra data","warning")       		
		  }
		}else{
		  Swal.fire("Mensaje de Error","Lo sentimos, no se pudo completar el registro","error")
		}
	})
}
var table;
function listar_usuario_admin(){
    table = $("#tabla_usuario").DataTable({
		"ordering":false,   
        "pageLength":10,
        "destroy":true,
        "async": false ,
        "responsive": true,
    	"autoWidth": false,
      "ajax":{
        "method":"POST",
		"url":"../controlador/usuario/controlador_usuario_listar.php",
      },
      "columns":[
		  {"defaultContent":""},
          {"data":"usu_usuario"},
          {"data":"usu_rol"},
          {"data":"empleado"},   
		  {"data":"area_nombre"},
		  {"data":"usu_estatus",
			render: function (data, type, row ) {
			    return "<button style='font-size:13px;width:100%;' class='editar_clave btn-sm btn btn-warning ' type='button'><i class='fa fa-edit'></i><b>&nbsp;Cambiar</b></button>";			
			}
		  },
		  {"data":"usu_estatus",
			render: function (data, type, row ) {
				if (row.usu_rol=="ADMINISTRADOR") {
			       return "<button style='font-size:13px;width:100%;' class='editar_usuario btn-sm btn btn-success ' disabled type='button'><i class='fa fa-edit'></i><b>&nbsp;Editar</b></button>";
				}else{
				    if (data=="ACTIVO") {
				       return "<button style='font-size:13px;width:100%;' class='editar_usuario btn-sm btn btn-success ' type='button'><i class='fa fa-edit'></i><b>&nbsp;Editar</b></button>";
				    }
				    if (data=="INACTIVO") {
				       return "<button style='font-size:13px;width:100%;' class='editar_usuario btn-sm btn btn-success ' type='button'><i class='fa fa-edit'></i><b>&nbsp;Editar</b></button>";
				    }
			    }
			}
		  },
		  {"data":"usu_estatus",
			render: function (data, type, row ) {
				if (row.usu_rol=="ADMINISTRADOR") {
			       return "<button style='font-size:13px;width:100%;' class=' btn btn-danger btn-sm' disabled type='button'><i class='fa fa-user-times'></i><b>&nbsp;Desactivar</b></button>";
				}else{
				    if (data=="ACTIVO") {
				       return "<button style='font-size:13px;width:100%;' class='editar_estatus_inactivo btn-sm btn btn-danger' type='button'><i class='fa fa-user-times'></i><b>&nbsp;Desactivar</b></button>";
				    }
				    if (data=="INACTIVO") {
				       return "<button class='editar_estatus_activo btn-sm btn btn-success' style='font-size:13px;width:100%;' type='button' ><i class='fa fa-plus'></i>&nbsp;<b>Activar</b></button>";
				    }
			    }
			}
		  },
      ],
      "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        	$($(nRow).find("td")[0]).css('text-align', 'center' );
        	$($(nRow).find("td")[5]).css('text-align', 'center' );
        	$($(nRow).find("td")[0]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[1]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[2]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[3]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[5]).css('word-wrap', 'break-word' );
            $($(nRow).find("td")[6]).css('word-wrap', 'break-word' );
        },
        "language":idioma_espanol,
        select: true
	});
	table.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_usuario').DataTable().page.info();
        table.column(0, { page: 'current' }).nodes().each( function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        } );
    } );
}
$('#tabla_usuario').on('click','.editar_estatus_activo',function(){
    var data = table.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(table.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = table.row(this).data();
    }
	usuario     =  data.usu_usuario,
	idusuario     =  data.usu_id;
	
	Swal.fire({
		title: "Mensaje de advertencia",
		html: "¿Seguro que deseas <label style='color:#9B0000;'>activar</label> el usuario <label style='color:#9B0000;'>"+usuario+"</label> ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: "<b>SI</b>",
		cancelButtonText: "<b>NO</b>"
	})
	.then((willDelete) => {
		if (willDelete.value) {
		    //Swal.fire("Mensaje de Advertencia","Opci&oacute;n bloqueada para la demo","warning");
            //return;
			Modificar_Estatus(idusuario,'ACTIVO');
		}
	});
});
$('#tabla_usuario').on('click','.editar_estatus_inactivo',function(){
    var data = table.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(table.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = table.row(this).data();
    }
	usuario     =  data.usu_usuario,
	idusuario     =  data.usu_id;
	Swal.fire({
		title: "Mensaje de advertencia",
		html: "¿Seguro que deseas <label style='color:#9B0000;'>desactivar</label> el usuario <label style='color:#9B0000;'>"+usuario+"</label> ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: "<b>SI</b>",
		cancelButtonText: "<b>NO</b>"
	})
	.then((willDelete) => {
		if (willDelete.value) {
		    //Swal.fire("Mensaje de Advertencia","Opci&oacute;n bloqueada para la demo","warning");
        	//return;
			Modificar_Estatus(idusuario,'INACTIVO');
		}
	});
});
$('#tabla_usuario').on('click','.editar_usuario',function(){
    var data = table.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(table.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = table.row(this).data();
    }
	usuario     =  data.usu_usuario,
	tipousuario =  data.usu_rol,
	empleado    =  data.empleado,
	idarea      =  data.area_cod,
	area_nombre =  data.area_nombre,
	idusuario   =  data.usu_id;

	$("#txt_tipousuario").val(tipousuario);
	$("#txt_usuario").val(usuario);
	$("#txt_empleado").val(empleado);
	$("#txt_idsuario").val(idusuario);
	combo_area_editar(idarea,area_nombre);
	$('#modal_editar_usuario').modal({backdrop: 'static', keyboard: false})
	$("#modal_editar_usuario").modal("show");
});
$('#tabla_usuario').on('click','.editar_clave',function(){
    var data = table.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(table.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = table.row(this).data();
    }
	usuario     =  data.usu_usuario,
	tipousuario =  data.usu_rol,
	empleado    =  data.empleado,
	idarea      =  data.area_cod,
	area_nombre =  data.area_nombre,
	idusuario   =  data.usu_id;
	$("#txt_idsuario_configuracion").val(idusuario);
	$("#txt_usuario_configuracion").val(usuario);
	$("#txt_empleado_configuracion").val(empleado);
	$("#txt_clave_configuracion").val("");
	
	$('#modal_configuracion').modal({backdrop: 'static', keyboard: false})
	$("#modal_configuracion").modal("show");
});
function filterGlobal () {
    $('#tabla_usuario').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
function Modificar_Clave() {
	var idusuario = $("#txt_idsuario_configuracion").val();
	var clave     = $("#txt_clave_configuracion").val();
	$.ajax({
		url:'../controlador/usuario/controlador_modificar_clave.php',
		type:'POST',
		data:{
			idusuario:idusuario,
			clave:clave
		}
	})
	.done(function(resp){
		if (resp > 0) {
			Swal.fire("Mensaje de Confirmaci\u00F3n","<b>Se modifico con exit&oacute; la contrase&ntilde;a del usuario</b>","success")
			.then ( ( value ) =>  {
				$("#modal_configuracion").modal("hide");
			});				
  
		}else{
		  Swal.fire("Mensaje de Error","Lo sentimos, no se pudo completar la modificaci\u00F3n","error")
		}
	})
}
function Modificar_Estatus(idusuario,estatus){
	$.ajax({
		url:'../controlador/usuario/controlador_modificar_estatus.php',
		type:'POST',
		data:{
			idusuario:idusuario,
			estatus:estatus
		}
	})
	.done(function(resp){
		if (resp > 0) {
			listar_usuario_admin();
			Swal.fire("Mensaje de Confirmaci\u00F3n","Estatus Modificado","success")
			.then ( ( value ) =>  {
			});				
  
		}else{
		  Swal.fire("Mensaje de Error","Lo sentimos, no se pudo completar la modificaci\u00F3n","error")
		}
	})
}
function combo_area_editar(idarea,area_nombre){
	$.ajax({
		url:'../controlador/usuario/controlador_combo_area_editar_listar.php',
		type:'POST',
		data:{
			idarea:idarea
		}
	})
	.done(function(resp){
		var data = JSON.parse(resp);
		var cadena = "";
			cadena += "<option value='"+idarea+"'>"+area_nombre+"</option>";
		if (data.length > 0) {
			for (var i = 0; i < data.length; i++) {
				cadena += "<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
			}
		}
		$("#cmb_area").html(cadena);
		$("#cmb_area").val(idarea).trigger('change');
	})
}
function editar_usuario() {
    //Swal.fire("Mensaje de Advertencia","Opci&oacute;n bloqueada para la demo","warning");
    //return;
	var id_usuario = $("#txt_idsuario").val();
	var cmb_area   = $("#cmb_area").val();
	$.ajax({
		url:'../controlador/usuario/controlador_usuario_editar.php',
		type:'POST',
		data:{
			id_usuario:id_usuario,
			cmb_area:cmb_area
		}
	})
	.done(function(resp){
		if (resp > 0) {
			listar_usuario_admin();
			Swal.fire("Mensaje de Confirmaci\u00F3n","Datos correctamente actualizados, <b>usuario actualizado<b>","success")
			.then ( ( value ) =>  {
				$("#modal_editar_usuario").modal('hide');
			});	
		}else{
		  Swal.fire("Mensaje de Error","Lo sentimos, no se pudo completar el registro","error")
		}
	})
}
function combo_area(){
	$.ajax({
		url:'../controlador/usuario/controlador_combo_area_listar.php',
		type:'POST'
	})
	.done(function(resp){
		var data = JSON.parse(resp);

		if (data.length > 0) {
			cadena = "";
			for (var i = 0; i < data.length; i++) {
				cadena += "<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
			}
			$("#cmb_area_registro").html(cadena);
		}
		else{
			var cadena = "<option value=''>NO SE ENCONTRARON REGISTROS</option>";
			$("#cmb_area_registro").html(cadena);
		}
	})
}
function abrirModalRegistro(){
	$('.form-control').removeClass("is-invalid").removeClass("is-valid");
	$('#modal_registro_usuario').modal({backdrop: 'static', keyboard: false})
	$("#modal_registro_usuario").modal("show");
}
function ValidacionInputRegistroUsuario(usuario,clave){
	Boolean($("#"+usuario).val().length>0) ? $("#"+usuario).removeClass('is-invalid').addClass("is-valid") : $("#"+usuario).removeClass('is-valid').addClass("is-invalid"); 
	Boolean($("#"+clave).val().length>0) ? $("#"+clave).removeClass('is-invalid').addClass("is-valid") : $("#"+clave).removeClass('is-valid').addClass("is-invalid"); 
}
function Limpiar_POST_registro_usuario() {
	$("#txt_usuario_registro").val("");
	$("#txt_clave_registro").val("");
}
function combo_empleado(){
	$.ajax({
		url:'../controlador/usuario/controlador_combo_empleado_listar.php',
		type:'POST'
	})
	.done(function(resp){
		var data = JSON.parse(resp);

		if (data.length > 0) {
			cadena = "";
			for (var i = 0; i < data.length; i++) {
				cadena += "<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
			}
			$("#cmb_empleado_registro").html(cadena);
		}
		else{
			var cadena = "<option value=''>NO SE ENCONTRARON REGISTROS</option>";
			$("#cmb_empleado_registro").html(cadena);
		}
	})
}
function registrar_usuario(){
	var usuario  	= $("#txt_usuario_registro").val();
	var clave  		= $("#txt_clave_registro").val();
	var empleado 	= $("#cmb_empleado_registro").val();
	var area  		= $("#cmb_area_registro").val();
	var area_nombre = $('select[name="cmb_area_registro"] option:selected').text();
	var empleado_nombre = $('select[name="cmb_empleado_registro"] option:selected').text();
	var rol  		= $("#cmb_rol").val();
	if (usuario.length==0 || clave.length==0) {
		ValidacionInputRegistroUsuario('txt_usuario_registro','txt_clave_registro');
        return Swal.fire("Mensaje de Advertencia","Porfavor llene los campos vacios (*)","warning");
	}
	$.ajax({
		url:'../controlador/usuario/controlador_usuario_registro.php',
		type:'POST',
		data:{
			usuario:usuario,
			clave:clave,
			empleado:empleado,
			area:area,
			rol:rol
		}
	})
	.done(function(resp){
		if (resp > 0) {
			if (resp==1) {
				$("#modal_registro_usuario").modal('hide');
				Swal.fire("Mensaje de Confirmaci\u00F3n","Datos correctamente registrados, <b>nuevo usuario registrado</b>","success")
				.then ( ( value ) =>  {
					Limpiar_POST_registro_usuario();
					listar_usuario_admin();
				});				
			}else {
				if (resp==2) {
					Swal.fire("Mensaje de Advertencia","Lo sentimos, el emplado <label style='color:#9B0000;'>"+empleado_nombre+"</label> ya tiene un usuario registrado en el &aacute;rea <label style='color:#9B0000;'>"+area_nombre+"</label>","warning")       		
				}else{
					Swal.fire("Mensaje de Advertencia","Lo sentimos, el usuario  <label style='color:#9B0000;'>"+usuario+"</label>  ya se encuentra registrado en nuestra data","warning")       		
				}
			}
		}else{
		  Swal.fire("Mensaje de Error","Lo sentimos, no se pudo completar el registro","error")
		}
	})
}

function Traer_Widget_Admin(){
	$.ajax({
		url:'../controlador/usuario/controlador_administrador_widget.php',
		type:'POST'
	})
	.done(function(resp){
		var data = JSON.parse(resp);
		
		if (data.length > 0) {

			$("#admin_pendientes").html(data[0][0]);
			$("#admin_aceptados").html(data[0][2]);
			$("#admin_rechazados").html(data[0][1]);
			// ads_titulo ads_descripcion ads_archivo
                $("#ads_descarga").html('No hay ningun Anuncio!!');
                var arr_ads = (data[0][3] != undefined) ? data[0][3].split('|') : null;
                $("#ads_titulo").html(arr_ads != null ? arr_ads[0] : '');
                $("#ads_descripcion").html(arr_ads != null ? arr_ads[1] : '');
                if (arr_ads != null) {
                    if (arr_ads[2] != '')
                        $("#ads_descarga").html('<a id="ads_archivo" target="_blank" href="anuncio/' + arr_ads[2] + '" class="btn btn-sm btn-warning">Descargar</a>');
                    else
                        $("#ads_descarga").html('No hay ningun Anuncio!!');
                }
		}
	})
}
function Traer_Widget_Area(idarea){
	$.ajax({
		url:'../controlador/usuario/controlador_area_widget.php',
		type:'POST',
		data:{
			idarea:idarea
		}
	})
	.done(function(resp){
		var data = JSON.parse(resp);

		if (data.length > 0) {

			$("#area_pendientes").html(data[0][0]);
			$("#area_aceptados").html(data[0][2]);
			$("#area_rechazados").html(data[0][1]);
			// ads_titulo ads_descripcion ads_archivo
                $("#ads_descarga").html('No hay ningun Anuncio!!');
                var arr_ads = (data[0][3] != undefined) ? data[0][3].split('|') : null;
                $("#ads_titulo").html(arr_ads != null ? arr_ads[0] : '');
                $("#ads_descripcion").html(arr_ads != null ? arr_ads[1] : '');
                if (arr_ads != null) {
                    if (arr_ads[2] != '')
                        $("#ads_descarga").html('<a id="ads_archivo" target="_blank" href="anuncio/' + arr_ads[2] + '" class="btn btn-sm btn-warning">Descargar</a>');
                    else
                        $("#ads_descarga").html('No hay ningun Anuncio!!');
                }
		}
	})
}