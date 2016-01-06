<div class="page-sidebar-wrapper">
	<div class="page-sidebar-wrapper">
		<?php 
		$activeClass = "usuarios";
		include 'menu.php';
		?>
	</div>
</div>
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Usuarios <small>Ver</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="home.php?s=dashboard">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="home.php?s=usuarios">Usuarios</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">ver</a>
							<i class="fa fa-angle-right"></i>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Información del Usuario
							</div>
						</div>
						<?php
						$data = $db->get("usuarios", "*", ["id" => $_GET["id"]]);
						?>
						<div class="portlet-body form">
							<div class="form-body">
								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3">Nombre:</label>
											<div class="col-md-9">
												<p class="form-control-static">
													 <?=$data["nombre"]?>
												</p>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3">Apellido:</label>
											<div class="col-md-9">
												<p class="form-control-static">
													 <?=$data["apellido"]?>
												</p>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3">usuario:</label>
											<div class="col-md-9">
												<p class="form-control-static">
													 <?=$data["usuario"]?>
												</p>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3">Tipo:</label>
											<div class="col-md-9">
												<p class="form-control-static">
													 <?=showTipo($data["tipo"])?>
												</p>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3">Estatus:</label>
											<div class="col-md-9">
												<p class="form-control-static">
													 <?=showEstatus($data["estatus"])?>
												</p>
											</div>
										</div>
									</div>
									<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3">Proveedor:</label>
											<div class="col-md-9">
												<p class="form-control-static">
													<?php
													$data = $db->get("proveedores", "*", ["id" => $data["id_proveedor"]])
													?>
													 <?=$data["razon_social"]?>
												</p>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
							</div>
							<div class="form-actions fluid">
								<div class="row">
									<div class="col-md-9">
										<div class="col-md-offset-3 col-md-9">
											<a href="home.php?s=usuarios"><button type="button" class="btn btn-default">Volver</button></a>
											<?php
											if ( priv( 3 ) ) { //Agregar/Editar Usuarios
											?>
												<a href="home.php?s=editusuario&id=<?=$_GET["id"]?>"><button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button></a>
											<?php
											}
											?>
										</div>
									</div>
									<div class="col-md-9">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
<div class="footer-inner">
	 2015 &copy; Grupo Ximplex C.A. Compras.
</div>
<div class="footer-tools">
	<span class="go-top">
		<i class="fa fa-angle-up"></i>
	</span>
</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap2-typeahead.min.html" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="assets/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.quicksearch.js"></script>
<script src="assets/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-switch/static/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/form-components.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   App.init();
   FormComponents.init();
});
</script>
</body>
<!-- END BODY -->

<!-- Mirrored from www.keenthemes.com/preview/conquer/table_advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Jul 2014 18:21:01 GMT -->
</html>
<?php
function showEstatus( $status ) {
	if ( $status == 0 ) {
		return "Activo";
	} elseif ( $status == 1 ) { 
		return "Esperando Cambio de Clave";
	} elseif ( $status == 2 ) {
		return "Inactivo";
	}
}
function showTipo( $type ) {
	if ( $type == 0 ) {
		return "Usuario Interno";
	} elseif ( $type == 1 ) { 
		return "Proveedor";
	} 
}
?>