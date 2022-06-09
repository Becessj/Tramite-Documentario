<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="favicon.ico">
<title>Ventana modal dinámica Bootstrap - BaulPHP</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">

<style>
#conte-modal {
	text-align: center;
	padding: 10px;
}
#fondo {
	background: url(imagenes/DB.png) no-repeat;
	max-width: 650px;
	text-align: center;
	color: #FFF;
	/* This works in IE 8 & 9 too */
	filter: alpha(opacity=60);
	-moz-opacity:0.6;
	/* Safari 1.x (pre WebKit!) */
	-webkit-opacity: 0.6;
	-o-opacity: 0.6;
	opacity: 0.6;
	background-size:100% auto;
}
.mo-title {
	font-size: 2em;
	margin-bottom: 350px;
}


</style>
</head>

<body>
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="#">BaulPHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a> </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
      </form>
    </div>
  </nav>
</header>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Ventana modal dinámica Bootstrap</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
      
      <div id="fondo">
        <div class="mo-title">&nbsp;</div>
        <div onClick="loadDynamicContentModal('oracle')"
            class="btn btn-success">Oracle</div>
        <div onClick="loadDynamicContentModal('sql-server')"
            class="btn btn-info">SQL Server</div>
        <div onClick="loadDynamicContentModal('mysql')"
            class="btn btn-primary">MySQL</div>
        <div onClick="loadDynamicContentModal('postgresql')"
            class="btn btn-secondary">PostgreSQL</div>
      </div>        
    
      
      <div class="modal fade" id="bootstrap-modal" role="dialog">
        <div class="modal-dialog" role="document"> 
          <!-- Modal contenido-->
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Contenido modal dinámico Bootstrap</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div id="conte-modal"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
function loadDynamicContentModal(modal){
	var options = {
			modal: true,
			height:300,
			width:600
		};
	$('#conte-modal').load('ObtenerDatos.php?my_modal='+modal, function() {
		$('#bootstrap-modal').modal({show:true});
    });    
}
</script> 
    
    <!-- Fin Contenido --> 
  </div>
</div>
<!-- Fin row -->

</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
    <p>Códigos <a href="https://www.baulphp.com/" target="_blank">BaulPHP</a></p>
    </span> </div>
</footer>
<script src="assets/jquery-1.12.4-jquery.min.js"></script> 
<script src="assets/jquery.validate.min.js"></script> 
<script src="assets/ValidarRegistro.js"></script> 
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script> 
<script src="assets/js/vendor/popper.min.js"></script> 
<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>