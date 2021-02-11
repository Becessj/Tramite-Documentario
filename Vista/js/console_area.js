var table;
function listar_area(){

     table = $("#tabla_area").DataTable({
		"ordering":false,   
        "pageLength":10,
        "destroy":true,
        "async": false ,
        "responsive": true,
    	"autoWidth": false,
      "ajax":{
        "method":"POST",
		"url":"../controlador/area/controlador_area_listar.php",
      },
      "columns":[
		  {"defaultContent":""},
          {"data":"area_nombre"},
          {"data":"area_fecha_registro"},
		  {"data":"area_estado",
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
				       return "<button class='editar btn btn-primary  btn-sm'  type='button' ><b><i class='fas fa-edit'></i>&nbsp;Editar</b></button>&nbsp";
			
			    }
			}
		  
      ],
      "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        	$($(nRow).find("td")[5]).css('text-align', 'center' );
        },
        "language":idioma_espanol,
        select: true
	});
	table.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_area').DataTable().page.info();
        table.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
  
}


$('#tabla_area').on('click','.editar',function(){
    var data = table.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(table.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = table.row(this).data();
    }
    
    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#modal_editar").modal('show');
    $("#idarea").val(data.area_cod);
    $("#txt_nombre_editar").val(data.area_nombre);
    $("#cbm_estatus").val(data.area_estado).trigger("change");
})

function Registrar_Area(){
	var nombre = $("#txt_nombre").val();
	if(nombre.length==0){
		ValidacionInput("txt_nombre");
		return Swal.fire("Mensaje de advertencia","Tiene algunos campos vacios","warning");
	}

    $.ajax({
        "url":"../controlador/area/controlador_area_registro.php",
        type:'POST',
        data:{
            nombre:nombre
        }
    }).done(function(resp){
        if(resp>0){
                if(resp==1){
					LimpiarCampos();
					listar_area();
                    Swal.fire("Mensaje De Confirmaci\u00F3n","Datos guardados correctamente","success");
                    
                }else{
                    LimpiarCampos();
                    Swal.fire("Mensaje De Advertencia","El nombre del area ya existe en nuestra base de datos","warning");  
                }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos el registro no se pudo completar","error");
        }
    })		
	
}

function Modificar_Area(){
    var idarea = $("#idarea").val();
    var nombre = $("#txt_nombre_editar").val();
    var estatus = $("#cbm_estatus").val();
	if(nombre.length==0){
		ValidacionInput("txt_nombre_editar");
		return Swal.fire("Mensaje de advertencia","Tiene algunos campos vacios","warning");
	}
    $.ajax({
        "url":"../controlador/area/controlador_area_modificar.php",
        type:'POST',
        data:{
            idarea:idarea,
            nombre:nombre,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
                if(resp==1){
                    $("#modal_editar").modal('hide');
					listar_area();
                    Swal.fire("Mensaje De Confirmaci\u00F3n","Datos actualizados correctamente","success");
                    
                }else{
                    LimpiarCampos();
                    Swal.fire("Mensaje De Advertencia","El nombre del area ya existe en nuestra base de datos","warning");  
                }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos la actualizaci\u00F3n no se pudo completar","error");
        }
    })		
	
}

function ValidacionInput(txt_nombre){
	Boolean($("#"+txt_nombre).val().length>0) ? $("#"+txt_nombre).removeClass('is-invalid').addClass("is-valid") : $("#"+txt_nombre).removeClass('is-valid').addClass("is-invalid"); 
}

function LimpiarCampos(){
    $("#txt_nombre").val("");
    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#modal_registro").modal('hide');
}

function AbrirModalRegistro(){
    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#modal_registro").modal('show');

}