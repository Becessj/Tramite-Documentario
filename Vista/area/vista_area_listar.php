<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mantenimiento de &aacute;rea</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php" ><i class="fa fa-home"></i> Inicio</a></li>
          <li class="breadcrumb-item active"> &Aacute;rea</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card"> 
         <div class="card-header">
            <h3 class="card-title">Listado de &aacute;reas</h3>
            <button class="btn btn-danger btn-sm float-right" data-toggle="modal" onclick="AbrirModalRegistro()"><i class="fas fa-plus"></i>&nbsp;Nuevo registro</button>
          </div>
          <div class="card-body">
                <table id="tabla_area" class="table tabel-display table-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>&Aacute;rea</th>
                      <th>Fecha Registro</th>
                      <th>Estatus</th>
                      <th align="center">Acci&oacute;n</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>&Aacute;rea</th>
                        <th>Fecha Registro</th>
                        <th>Estatus</th>
                        <th align="center">Acci&oacute;n</th>
                      </tr>
                  </tfoot>
                </table>
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

<!-- Modal -->
<div class="modal fade" id="modal_registro" data-backdrop="static" data-keyboard="false" tabindex="-1″ id="MiModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>REGISTRAR &Aacute;REA</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-sm-6">
                      <!-- text input -->
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" placeholder="Ingresar nombre" id="txt_nombre">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Estatus</label>
              <input type="text" class="form-control" placeholder="ACTIVO" readonly="" style="text-align:center;">
            </div>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" style="background:white;color:#28a745">Cerrar</button>
        <button type="button" class="btn btn-success btn-sm" onclick="Registrar_Area()">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal -->
<!-- Modal -->
<div class="modal fade" id="modal_editar" data-backdrop="static" data-keyboard="false" tabindex="-1″ id="MiModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>REGISTRAR &Aacute;REA</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-sm-6">
            <input type="text" id="idarea" hidden>                      <!-- text input -->
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" placeholder="Ingresar nombre" id="txt_nombre_editar">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Estatus</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="cbm_estatus">
                    <option data-select2-id="ACTIVO">ACTIVO</option>
                    <option data-select2-id="INACTIVO">INACTIVO</option>
                </select>
            </div>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" style="background:white;color:#28a745">Cerrar</button>
        <button type="button" class="btn btn-success btn-sm" onclick="Modificar_Area()">Modificar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal -->
<script src="js/console_area.js?rev=<?php echo time();?>"></script>

<script>
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_nombre").focus();  
           
    })
    $('.select2').select2();
  listar_area();
</script>
