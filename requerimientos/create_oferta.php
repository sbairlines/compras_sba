<div class="page-sidebar-wrapper">
	<div class="page-sidebar-wrapper">
		<?php 
		$activeClass = "requerimientos";
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
					Oferta <small>Nueva</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="home.php?s=dashboard">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="home.php?s=requerimientos">Ofertas</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">nueva</a>
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
								<i class="fa fa-globe"></i>Nueva Oferta
							</div>
						</div>
						<?php
						$data = $db->get("requerimientos", "*", ["id" => $_GET["id_req"]]);
						?>
						<div class="portlet-body form">
							<div class="modal fade" id="publicaOferta" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Publicar Oferta</h4>
										</div>
										<div class="modal-body">
											 Esta seguro de publicar su oferta?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">No, Aun no</button>
											<button type="button" id="btnPublicaOferta" class="btn btn-info">Si, Estoy de acuerdo</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">Descripción:</label>
											<div class="col-md-9">
												<p class="form-control-static">
													 <?=$data["descripcion"]?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">Fecha Inicio:</label>
											<div class="col-md-9">
												<p class="form-control-static">
													 <?=date("d-m-Y", strtotime($data["fecha_inicio"]))?>
												</p>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">Fecha Fin:</label>
											<div class="col-md-9">
												<p class="form-control-static">
													 <?=date("d-m-Y", strtotime($data["fecha_fin"]))?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
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
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3">Estatus:</label>
											<div class="col-md-9">
												<p class="form-control-static">
													 <?=showEstatus($data["estatus"])?>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Items Agregados
							</div>
						</div>
						<form class="form-horizontal" id="frmOferta" action="lib/ofertas.php?t=create&id_req=<?=$_GET["id_req"];?>" method="post" role="form">
							<table class="table table-bordered table-hover" id="sample_1">
								<thead>
									<tr>
										<th>
											 Descripción
										</th>
										<th>
											 Cant.
										</th>
										<th>
											 Unid. Medida
										</th>
										<th>
											 Condic. de Pago
										</th>
										<th>
											 Precio Unitario
										</th>
										<th>
											 Cant. Dispon.
										</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$datas = $db->select("detalle_requerimiento", "*", ["id_requerimiento" => $_GET["id_req"]]);
				                foreach ($datas as $data) {
				                	$ofer = $db->get("detalle_oferta", "*", ["id_detalle_requerimiento" => $data["id"]]);
				                ?>
				                    <tr>
										<td>
											 <?=$data["descripcion"];?>
										</td>
										<td>
											 <?=$data["cantidad"];?>
										</td>
										<td>
											 <?=$data["unidad_medida"];?>
										</td>
										<td>
											<?=$data["condicion_pago"];?>
										</td>
										<td>
											<?php
											if ( priv( 4 ) ) { //Agregar/Editar Ofertas
											?>
												<input type="text" value="<?=$ofer["precio_unitario"]?>" name="txtPrecioUnitario[<?=$data["id"];?>]" />
											<?php
											} else {
											?>
												<?=$ofer["precio_unitario"]?>
											<?php
											}
											?>
										</td>
										<td>
											<?php
											if ( priv( 4 ) ) { //Agregar/Editar Ofertas
											?>
												<input type="text" value="<?=$ofer["cantidad_disponible"]?>" name="txtCantDispon[<?=$data["id"];?>]" />
											<?php
											} else {
											?>
												<?=$ofer["cantidad_disponible"]?>
											<?php
											}
											?>
										</td>
									</tr>
								<?php
				                }
				                ?>
								</tbody>
							</table>
							<div class="form-actions right">
								<a href="home.php?s=requerimientos"><button type="button" class="btn btn-default">Volver</button></a>
								<a data-toggle="modal" href="#publicaOferta"><button type="button" class="btn btn-info">Guardar</button></a>
							</div>
						</form>
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
   
   	$('#btnPublicaOferta').bind('click', function(){
		$('#frmOferta').submit();
	});
});
</script>
</body>
<!-- END BODY -->
</html>
<?php
function showEstatus( $status ) {
	if ( $status == 0 ) {
		return "Activo";
	} elseif ( $status == 1 ) { 
		return "inactivo";
	} elseif ( $status == 2 ) {
		return "Suspendido";
	}
}
function showTipo( $type ) {
	if ( $type == 0 ) {
		return "Subasta";
	} elseif ( $type == 1 ) { 
		return "Licitacion";
	} 
}
?>