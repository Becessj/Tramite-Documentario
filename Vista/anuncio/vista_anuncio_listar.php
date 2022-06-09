<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mantenimiento de Anuncio</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php" ><i class="fa fa-home"></i> Inicio</a></li>
          <li class="breadcrumb-item active"> Anuncio</li>
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
            <h3 class="card-title">Listado de anuncios</h3>
            <button class="btn btn-danger btn-sm float-right" data-toggle="modal" onclick="AbrirModalRegistro()"><i class="fas fa-plus"></i>&nbsp;Nuevo registro</button>
          </div>
          <div class="card-body">
                <table id="tabla_anuncio" class="table tabel-display table-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Titulo</th>
                      <th>Descripcion</th>
                      <th>archivo</th>
                      <th align="center">Acci&oacute;n</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Archivo</th>
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
        <h5 class="modal-title" id="exampleModalLabel"><b>REGISTRAR ANUNCIO</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Titulo</label>
              <input type="text" class="form-control" placeholder="Ingresar titulo" id="txt_titulo">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Descripcion</label>
              <input type="text" class="form-control" placeholder="Ingresar descripcion" id="txt_descripcion">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Archivo</label>
              <input type="file" class="form-control" name="txt_archivo" placeholder="Adjunto" id="txt_archivo">
            </div>
          </div>
      </div>
      </div>
      <div class="modal-footer">
      <span id="ads_txt_add_loading"></span>
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" style="background:white;color:#28a745">Cerrar</button>
        <button type="button" class="btn btn-success btn-sm" onclick="Registrar_Anuncio()">Guardar</button>
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
        <h5 class="modal-title" id="exampleModalLabel"><b>REGISTRAR ANUNCIO</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-sm-6">
            <input type="text" id="id_anuncio" hidden>                      <!-- text input -->
            <div class="form-group">
              <label>Titulo</label>
              <input type="text" class="form-control" placeholder="Ingresar titulo" id="txt_titulo_editar">
            </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
                  <label>Descripcion</label>
                  <input type="text" class="form-control" placeholder="Ingresar descripcion" id="txt_descripcion_editar">
              </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
                  <label>Archivo</label>
                  <input type="text" id="id_archivo" hidden>
                  <input type="file" class="form-control" placeholder="Adjunto" name="txt_archivo_editar" id="txt_archivo_editar">
              </div>
          </div>
      </div>
      </div>
      <div class="modal-footer">
          <span id="ads_txt_upd_loading"></span>
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" style="background:white;color:#28a745">Cerrar</button>
        <button type="button" class="btn btn-success btn-sm" onclick="Modificar_Anuncio()">Modificar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal -->
<script src="js/console_anuncio.js?rev=<?php echo time();?>"></script>

<script>
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_titulo").focus();
           
    })
  listar_anuncio();
</script>
