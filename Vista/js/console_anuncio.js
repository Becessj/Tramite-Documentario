var table;

function listar_anuncio() {

    table = $("#tabla_anuncio").DataTable({
        "ordering": false,
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "responsive": true,
        "autoWidth": false,
        "ajax": {
            "method": "POST",
            "url": "../controlador/anuncio/controlador_anuncio_listar.php",
        },
        "columns": [
            {"defaultContent": ""},
            {"data": "titulo"},
            {"data": "descripcion"},
            {
                "data": "archivo",
                render: function (data, type, row) {
                    if (data == 'INACTIVO') {
                        return '<span class="badge bg-danger bg-lg">' + data + '</span>';
                    } else {
                        return '<span class="badge bg-success bg-lg">' + data + '</span>';
                    }

                }
            },

            {
                "data": null,
                render: function (data, type, row) {
                    return "<button class='editar btn btn-primary  btn-sm'  type='button' ><b><i class='fas fa-edit'></i>&nbsp;Editar</b></button>&nbsp";

                }
            }

        ],
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            $($(nRow).find("td")[5]).css('text-align', 'center');
        },
        "language": idioma_espanol,
        select: true
    });
    table.on('draw.dt', function () {
        var PageInfo = $('#tabla_anuncio').DataTable().page.info();
        table.column(0, {page: 'current'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

}


$('#tabla_anuncio').on('click', '.editar', function () {
    var data = table.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if (table.row(this).child.isShown()) {//Cuando esta en tamaño responsivo
        var data = table.row(this).data();
    }

    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#modal_editar").modal('show');
    $("#id_anuncio").val(data.anuncio_id);
    $("#txt_titulo_editar").val(data.titulo);
    $("#txt_descripcion_editar").val(data.descripcion);
    $("#id_archivo").val(data.archivo);
})

function Registrar_Anuncio() {
    var titulo = $("#txt_titulo").val();
    var descripcion = $("#txt_descripcion").val();
    var txt_archivo = $('#txt_archivo')[0].files[0]
    if (titulo.length == 0) {
        ValidacionInput("txt_titulo");
        return Swal.fire("Mensaje de advertencia", "Tiene algunos campos vacios", "warning");
    }
    if (descripcion.length == 0) {
        ValidacionInput("txt_descripcion");
        return Swal.fire("Mensaje de advertencia", "Tiene algunos campos vacios", "warning");
    }
    var form_data = new FormData();
    form_data.append("txt_archivo", $('#txt_archivo')[0].files[0]);
    form_data.append("titulo", titulo);
    form_data.append("descripcion", descripcion);
    $.ajax({
        "url": "../controlador/anuncio/controlador_anuncio_registro.php",
        type: 'POST',
        contentType: false,
        processData: false,
        data: form_data,
        beforeSend: function() {$('#ads_txt_add_loading').html('Procesando anuncio...')}
    }).always(function (){
        $("#ads_txt_add_loading").html('')
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                LimpiarCampos();
                listar_anuncio();
                Swal.fire("Mensaje De Confirmacion", "Datos guardados correctamente", "success");

            } else {
                LimpiarCampos();
                Swal.fire("Mensaje De Advertencia", "El nombre del anuncio ya existe en nuestra base de datos", "warning");
            }
        } else {
            Swal.fire("Mensaje De Error", "Lo sentimos el registro no se pudo completar", "error");
        }
    })

}

function Modificar_Anuncio() {
    var id_anuncio = $("#id_anuncio").val();
    var titulo = $("#txt_titulo_editar").val();
    var descripcion = $("#txt_descripcion_editar").val();
    var id_archivo = $("#id_archivo").val();
    if (titulo.length == 0) {
        ValidacionInput("txt_titulo_editar");
        return Swal.fire("Mensaje de advertencia", "Tiene algunos campos vacios", "warning");
    }
    if (descripcion.length == 0) {
        ValidacionInput("txt_descripcion_editar");
        return Swal.fire("Mensaje de advertencia", "Tiene algunos campos vacios", "warning");
    }
    var form_data = new FormData();
    form_data.append("id_anuncio", id_anuncio);
    form_data.append("titulo", titulo);
    form_data.append("descripcion", descripcion);
    form_data.append("id_archivo", id_archivo);
    form_data.append("archivo", $('#txt_archivo_editar')[0].files[0]);
    $.ajax({
        "url": "../controlador/anuncio/controlador_anuncio_modificar.php",
        type: 'POST',
        contentType: false,
        processData: false,
        data: form_data,
        beforeSend: function() {$('#ads_txt_upd_loading').html('Procesando anuncio...')}
    }).always(function (){
        $("#ads_txt_upd_loading").html('')
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                $("#modal_editar").modal('hide');
                listar_anuncio();
                Swal.fire("Mensaje De Confirmaci\u00F3n", "Datos actualizados correctamente", "success");

            } else {
                LimpiarCampos();
                Swal.fire("Mensaje De Advertencia", "El nombre del anuncio ya existe en nuestra base de datos", "warning");
            }
        } else {
            Swal.fire("Mensaje De Error", "Lo sentimos la actualizaci\u00F3n no se pudo completar", "error");
        }
    })
}

function ValidacionInput(txt_titulo) {
    Boolean($("#" + txt_titulo).val().length > 0) ? $("#" + txt_titulo).removeClass('is-invalid').addClass("is-valid") : $("#" + txt_titulo).removeClass('is-valid').addClass("is-invalid");
}

function LimpiarCampos() {
    $("#txt_titulo").val("");
    $("#txt_descripcion").val("");
    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#modal_registro").modal('hide');
}

function AbrirModalRegistro() {
    $('.form-control').removeClass("is-invalid").removeClass("is-valid");
    $("#modal_registro").modal('show');

}