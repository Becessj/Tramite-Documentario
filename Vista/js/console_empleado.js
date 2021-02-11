var table;
function listar_empleado(){
     table = $("#tabla_empleados").DataTable({
		"ordering":false,   
        "pageLength":10,
        "destroy":true,
        "async": false ,
        "responsive": true,
    	"autoWidth": false,
      "ajax":{
        "method":"POST",
		"url":"../controlador/empleado/controlador_empleado_listar.php",
      },
      "columns":[
		  {"defaultContent":""},
          {"data":"emple_nrodocumento"},
          {"data":"empleado"},
          {"data":"emple_movil"},
          {"data":"emple_email"},
          {"data":"emple_direccion"},
		  {"data":"emple_estatus",
				render: function (data, type, row ) {
					if(data=='INACTIVO'){
						return '<span class="badge bg-danger bg-lg">'+data+'</span>';
					}else{
						return '<span class="badge bg-success bg-lg">'+data+'</span>';
					}
		
			}
		  },
		  {"data":null,
			render: function (data, type, row ) {
				       return "<button class='editar btn btn-primary  btn-sm'  type='button' ><i class='fas fa-edit'></i><b>&nbsp;Editar</b></button>";
			
			}
		 }
		  
      ],
      "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        },
        "language":idioma_espanol,
        select: true
	});
	table.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_empleados').DataTable().page.info();
        table.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
  
}


$('#tabla_empleados').on('click','.editar',function(){
    var data = table.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(table.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = table.row(this).data();
    }
    
    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#modal_editar").modal('show');
    $("#txt_idpersona").val(data.empleado_id);
    $("#txt_nombre_editar").val(data.emple_nombre);
    $("#txt_apepat_editar").val(data.emple_apepat);
    $("#txt_apemat_editar").val(data.emple_apemat);
    $("#txt_fechanacimiento_editar").val(data.fnacimiento);
    $("#txt_nrodocumento_editar").val(data.emple_nrodocumento);
    $("#txt_movil_editar").val(data.emple_movil);
    $("#txt_email_editar").val(data.emple_email);
    $("#txt_direccion_editar").val(data.emple_direccion);
    $("#cbm_estatus").val(data.emple_estatus).trigger("change");
})

function Registrar_Empleado(){
    var nombre = $("#txt_nombre").val();
    var apepat = $("#txt_apepat").val();
    var apemat = $("#txt_apemat").val();
    var fechanacimiento = $("#txt_fechanacimiento").val();
    var nrodocumento = $("#txt_nrodocumento").val();
    var movil = $("#txt_movil").val();
    var direccion = $("#txt_direccion").val();
    var email = $("#txt_email").val();

	if(nombre.length==0 || apepat.length==0 || apemat.length==0 || fechanacimiento.length==0 || nrodocumento.length==0 || movil.length==0 || direccion.length==0 || email.length==0){
		ValidacionInput("txt_nombre","txt_apepat","txt_apemat","txt_fechanacimiento","txt_nrodocumento","txt_movil","txt_direccion","txt_email");
		return Swal.fire("Mensaje de advertencia","Tiene algunos campos vacios","warning");
	}
	var fechaactual = new Date();
    var anio = fechaactual.getFullYear();
	var fecha = fechanacimiento.split('/');
	var edad =  anio - fecha[2];
	var fechanacimiento = fecha[2] + '-' + fecha[1] + '-' + fecha[0];
	if(edad<18){
		return   Swal.fire("Mensaje de Advertencia","El empleado debe ser mayor de edad","warning");
	}
	if (validar_email(email)) {
	}else{
	  return Swal.fire("Mensaje de Error","Lo sentimos, formato de email ingresado no es valido.", "error");
	}
    $.ajax({
        "url":"../controlador/empleado/controlador_empleado_registro.php",
        type:'POST',
        data:{
            nombre:nombre,
            apepat:apepat,
            apemat:apemat,
            fechanacimiento:fechanacimiento,
            nrodocumento:nrodocumento,
            movil:movil,
            direccion:direccion,
            email:email

        }
    }).done(function(resp){
        if(resp>0){
                if(resp==1){
					LimpiarCampos();
					listar_empleado();
                    Swal.fire("Mensaje De Confirmacion","Datos guardados correctamente","success");
                    
                }else{
                    LimpiarCampos();
                    Swal.fire("Mensaje De Advertencia","El nro de docuemento ya esta registrada en nuestra base de datos","warning");  
                }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos el registro no se pudo completar","error");
        }
    })		
	
}

function Modificar_Empleado(){
	var id        = $("#txt_idpersona").val();
	var nrodocumento  = $("#txt_nrodocumento_editar").val();
	var nombre    = $("#txt_nombre_editar").val();
	var apepat    = $("#txt_apepat_editar").val();
	var apemat    = $("#txt_apemat_editar").val();
	var fecnacimiento = $("#txt_fechanacimiento_editar").val();    	
	var celular   = $("#txt_movil_editar").val();
	var email     = $("#txt_email_editar").val();
    var direccion = $('#txt_direccion_editar').val();  
    var estatus = $("#cbm_estatus").val(); 

	if(nombre.length==0 || apepat.length==0 || apemat.length==0 || fecnacimiento.length==0 || nrodocumento.length==0 || celular.length==0 || direccion.length==0 || email.length==0){
		ValidacionInput("txt_nombre_editar","txt_apepat_editar","txt_apemat_editar","txt_fechanacimiento_editar","txt_nrodocumento_editar","txt_movil_editar","txt_direccion_editar","txt_email_editar");
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
			estado:estatus
		}
	})
	.done(function(resp){
		if (resp > 0) {
		  if (resp==1) {	  	
            listar_empleado();
			Swal.fire("Mensaje De Confirmaci\u00F3n","Datos guardados correctamente","success");
            $("#modal_editar").modal('hide');
		  }else {
            Swal.fire("Mensaje De Advertencia","El nro de docuemento ya se encuentra en la base de datos","warning");      		
		  }
		}else{
		  Swal.fire("Mensaje de Error","Lo sentimos, no se pudo completar el registro","error")
		}
	})	
	
}

function ValidacionInput(txt_nombre,txt_apepat,txt_apemat,txt_fechanacimiento,txt_nrodocumento,txt_movil,txt_direccion,txt_email){
    Boolean($("#"+txt_nombre).val().length>0) ? $("#"+txt_nombre).removeClass('is-invalid').addClass("is-valid") : $("#"+txt_nombre).removeClass('is-valid').addClass("is-invalid"); 

    Boolean($("#"+txt_apepat).val().length>0) ? $("#"+txt_apepat).removeClass('is-invalid').addClass("is-valid") : $("#"+txt_apepat).removeClass('is-valid').addClass("is-invalid"); 

    Boolean($("#"+txt_apemat).val().length>0) ? $("#"+txt_apemat).removeClass('is-invalid').addClass("is-valid") : $("#"+txt_apemat).removeClass('is-valid').addClass("is-invalid"); 

    Boolean($("#"+txt_fechanacimiento).val().length>0) ? $("#"+txt_fechanacimiento).removeClass('is-invalid').addClass("is-valid") : $("#"+txt_fechanacimiento).removeClass('is-valid').addClass("is-invalid"); 

    Boolean($("#"+txt_nrodocumento).val().length>0) ? $("#"+txt_nrodocumento).removeClass('is-invalid').addClass("is-valid") : $("#"+txt_nrodocumento).removeClass('is-valid').addClass("is-invalid"); 

    Boolean($("#"+txt_movil).val().length>0) ? $("#"+txt_movil).removeClass('is-invalid').addClass("is-valid") : $("#"+txt_movil).removeClass('is-valid').addClass("is-invalid"); 

    Boolean($("#"+txt_direccion).val().length>0) ? $("#"+txt_direccion).removeClass('is-invalid').addClass("is-valid") : $("#"+txt_direccion).removeClass('is-valid').addClass("is-invalid"); 

    Boolean($("#"+txt_email).val().length>0) ? $("#"+txt_email).removeClass('is-invalid').addClass("is-valid") : $("#"+txt_email).removeClass('is-valid').addClass("is-invalid"); 
}

function LimpiarCampos(){
    $("#txt_nombre").val("");
    $("#txt_apepat").val("");
    $("#txt_apemat").val("");
    $("#txt_fechanacimiento").val("");
    $("#txt_nrodocumento").val("");
    $("#txt_movil").val("");
    $("#txt_direccion").val("");
    $("#txt_email").val("");
    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#modal_registro").modal('hide');
}

function AbrirModalRegistro(){
    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#modal_registro").modal('show');
}

function validar_email(email) {
	var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email) ? true : false;
}