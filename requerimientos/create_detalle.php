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
					Detalle del Requerimiento
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="home.php?s=dashboard">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="home.php?s=requerimientos">Requerimientos</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">detalle</a>
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
								<i class="fa fa-globe"></i>Requerimiento
							</div>
						</div>
						<?php
						$data = $db->get("requerimientos", "*", ["id" => $_GET["id"]]);
						?>
						<div class="portlet-body form">
							
							<div class="modal fade" id="publicaSuspende0" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Publicar Requerimiento</h4>
										</div>
										<div class="modal-body">
											 Desea publicar este Requerimiento?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">No, Aun no</button>
											<button type="button" id="btnPublicaSuspende0" class="btn btn-info">Si, Estoy de acuerdo</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							
							<div class="modal fade" id="publicaSuspende2" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Suspender Requerimiento</h4>
										</div>
										<div class="modal-body">
											<p>Desea suspender este Requerimiento?</p>
											<p>Suspender el requerimiento hará que no este visible para los proveedores.</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">No, Dejarlo Visible</button>
											<button type="button" id="btnPublicaSuspende2" class="btn btn-danger">Si, Estoy de acuerdo</button>
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
								<?php
								if ( priv( 1 ) ) { //Agregar/Editar Requerimientos
								?>
									<a href="home.php?s=editrequerimiento&id=<?=$_GET["id"]?>"><button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button></a>
								<?php
								}
								?>
							</div>
						</div>
						<?php
						if ( priv( 1 ) ) { //Agregar/Editar Requerimientos
						?>
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-globe"></i>Detalle del Requerimiento
								</div>
							</div>
							<form class="form-horizontal" action="lib/requerimientos.php?t=createdetalle&id=<?=$_GET["id"];?>" method="post" role="form">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Descripción</label>
										<div class="col-md-9">
											<input type="text" name="txtDetDescripcion" class="form-control" placeholder="Descripcion del item">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Cantidad</label>
										<div class="col-md-9">
											<input type="text" name="txtDetCantidad" class="form-control" placeholder="Cantidad">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Unidad de medida</label>
										<div class="col-md-9">
											<input type="text" name="txtDetUnidadMedida" class="form-control" placeholder="Unidad de medida Ejemplo: Kg, Lt, Mtr. Etc">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Condición de Pago</label>
										<div class="col-md-9">
											<select name="cboDetCondicionPago">
												<?php
												$condiciones = $db->select("condicion_pago", "*", ["estatus" => 0]);
												foreach ($condiciones as $condicion) {
												?>
													<option value="<?=$condicion["nombre"]?>"><?=$condicion["nombre"]?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<button type="submit" class="btn btn-success">Agregar</button>
								</div>
							</form>
						<?php
						}
						?>
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Items Agregados
							</div>
						</div>
						<table class="table table-bordered table-hover" id="sample_1">
							<thead>
								<tr>
									<th>
										 Descripción
									</th>
									<th>
										 Cantidad
									</th>
									<th>
										 Unid. Medida
									</th>
									<th>
										 Condic. de Pago
									</th>
									<th>
										 Acciones
									</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$datas = $db->select("detalle_requerimiento", "*", ["id_requerimiento" => $_GET["id"]]);
			                foreach ($datas as $data) {
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
										if ( priv( 1 ) ) { //Agregar/Editar Requerimientos
										?>
											<a href="lib/requerimientos.php?t=delete&id=<?=$data["id"]?>"><i class="fa fa-eraser"></i></a>
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
						
						
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
					<?php
					$publicado = $db->get("requerimientos", "*", ["id" => $_GET["id"]]);
					if ( $publicado["estatus"] == 0 ) {
						$class = "btn-danger";
						$texto = "Suspender Requerimiento";
						$action = "2";
						$id = "#publicaSuspende2";
					} else {
						$class = "btn-info";
						$texto = "Publicar Requerimiento";
						$action = "0";
						$id = "#publicaSuspende0";
					}
					?>
					<div class="form-actions right">
						<a href="home.php?s=requerimientos"><button type="button" class="btn btn-default">Volver</button></a>
						<?php
						if ( priv( 1 ) ) { //Agregar/Editar Requerimientos
						?>
							<a id="btnParaPublicarSuspender" data-toggle="modal" url="lib/requerimientos.php?t=publicarequerimiento&id=<?=$_GET["id"]?>&action=<?=$action?>" href="<?=$id?>"><button type="button" class="btn <?=$class?>"><?=$texto?></button></a>
						<?php
						}
						?>
					</div>
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
   
	$('#btnPublicaSuspende0').bind('click', function(){
		var url = $('#btnParaPublicarSuspender').attr("url");
		$(location).attr('href',url);
	});
	$('#btnPublicaSuspende2').bind('click', function(){
		var url = $('#btnParaPublicarSuspender').attr("url");
		$(location).attr('href',url);
	});
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