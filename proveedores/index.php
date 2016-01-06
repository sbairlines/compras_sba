<div class="page-sidebar-wrapper">
	<div class="page-sidebar-wrapper">
		<?php 
		$activeClass = "proveedores";
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
					Proveedores <small>Listado</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">proveedores</a>
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
								<i class="fa fa-globe"></i>Listado de Proveedores
							</div>
						</div>
						<div class="portlet-body">
							<?php
							if ( priv( 2 ) ) { //Agregar/Editar Proveedores
							?>
							<div class="table-toolbar">
								<div class="btn-group">
									<a href="home.php?s=createproveedor">
										<button class="btn btn-success">
											Agregar
											<i class="fa fa-plus"></i>
										</button>
									</a>
								</div>
							</div>
							<?php
							}
							?>
							<table class="table table-bordered table-hover" id="sample_1">
								<thead>
									<tr>
										<th>
											 Razón Social
										</th>
										<th>
											 Rif
										</th>
										<th>
											 Ciudad
										</th>
										<th>
											 Telefono
										</th>
										<th>
											 Acciones
										</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$datas = $db->select("proveedores", "*", ["ORDER" => "razon_social"]);
	                            foreach ($datas as $data) {
	                            ?>
		                            <tr>
										<td>
											 <?=$data["razon_social"];?>
										</td>
										<td>
											 <?=$data["rif"];?>
										</td>
										<td>
											 <?=$data["ciudad"];?>
										</td>
										<td>
		                                     <?=$data["telefono"];?>
										</td>
										<td>
											<a href="home.php?s=viewproveedor&id=<?=$data["id"]?>"><i class="fa fa-eye"></i></a>
											<?php
											if ( priv( 2 ) ) { //Agregar/Editar Proveedores
											?>
												<a href="home.php?s=editproveedor&id=<?=$data["id"]?>"><i class="fa fa-edit"></i></a>
												<a href="lib/proveedores.php?t=delete&id=<?=$data["id"]?>"><i class="fa fa-eraser"></i></a>
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

<!-- Mirrored from www.keenthemes.com/preview/conquer/table_advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Jul 2014 18:21:01 GMT -->
</html>