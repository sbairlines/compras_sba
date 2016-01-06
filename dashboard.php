<div class="page-sidebar-wrapper">
	<div class="page-sidebar-wrapper">
		<?php 
		$activeClass = "dashboard";
		include 'menu.php';?>
	</div>
</div>
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success">Save changes</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<!-- END BEGIN STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Dashboard <small>Ultimas Ofertas</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">dashboard</a>
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
								<i class="fa fa-globe"></i>Listado de Ofertas 
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover" id="sample_1">
								<thead>
									<tr>
										<th>
											 Descripción
										</th>
										<th>
											 Fecha Inicio
										</th>
										<th>
											 Fecha Fin
										</th>
										<th>
											 Tipo
										</th>
										<th>
											 Estatus
										</th>
										<th>
											 Acciones
										</th>
									</tr>
								</thead>
								<tbody>
								<?php
								if ( $_SESSION["usuario"]["tipo"] == 0 ) {
									$datos = $db->select("requerimientos", "*", ["estatus" => 0, "ORDER" => "fecha_inicio DESC", "LIMIT" => 10]);
								} else {
									$datos = $db->select("requerimiento_clasificacion", ["[>]requerimientos" => ["id_requerimiento" => "id"]], "*", ["AND" => ["fecha_inicio[<=]" => date("Y-m-d"), "fecha_fin[>=]" => date("Y-m-d"), "estatus" => "0", "id_clasificacion" => $_SESSION["usuario"]["clasificaciones"]], "GROUP" => "id_requerimiento", "LIMIT" => 10]);
								}
	                            foreach ($datos as $data) {
	                            ?>
		                            <tr>
										<td>
											 <?=$data["descripcion"];?>
										</td>
										<td>
											 <?=$data["fecha_inicio"];?>
										</td>
										<td>
											 <?=$data["fecha_fin"];?>
										</td>
										<td>
											<?=showTipo($data["tipo"]);?>
										</td>
										<td>
		                                     <?=showEstatus($data["estatus"]);?>
										</td>
										<td>
											<a href="home.php?s=createdetallerequerimiento&id=<?=$data["id"]?>"><i class="fa fa-eye"></i></a>
											<?php
											if ( priv( 1 ) ) { //Agregar/Editar Requerimientos
											?>
												<a href="home.php?s=editrequerimiento&id=<?=$data["id"]?>"><i class="fa fa-edit"></i></a>
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
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/table-advanced.js"></script>
<script>
jQuery(document).ready(function() {       
   App.init();
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
		return "Inactivo";
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