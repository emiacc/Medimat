<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
<link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />

<!-- begin #content -->
<div id="content" class="content">			
	<div class="row">
		<div class="col-md-12">
			<!-- begin panel1 -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Producto</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-1"><h4>Nº <?=$producto->id_producto?></h4></div>
						<div class="col-xs-9"><h4>Producto: <?=$producto->descripcion?></h4></div>
						<div class="col-xs-2"><h4>Unidades: <?=$producto->unidades?></h4></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-xs-3"><h5>Kg a productir: <?=$producto->kg?></h5></div>
						<div class="col-xs-3"><h5>Peso pieza (gr): <?=$producto->gr_pieza?></h5></div>
						<div class="col-xs-3"><h5>Scrap (%): <?=$producto->scrap?></h5></div>
						<div class="col-xs-3"><h5>Total Pallets: <?=$producto->pallets?></h5></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-xs-5">
							<h5>Materia Prima:</h5>
							<?php foreach ($materia_producto as $materia): ?>
								<div class="row">
									<div class="col-xs-7">
										<h5><?=$materia->descripcion?></h5>
									</div>
									<div class="col-xs-5">
										<h5>Virgen: <?=$materia->virgen?></h5>
										<h5>Recuperado: <?=$materia->recuperado?></h5>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="col-xs-5 col-xs-offset-2">
							<h5>Masterbatches:</h5>
							<?php foreach ($masters_producto as $master): ?>
								<div class="row">
									<div class="col-xs-7">
										<h5><?=$master->descripcion?></h5>
									</div>
									<div class="col-xs-5">
										<h5>Cantidad: <?=$master->cantidad?></h5>
									</div>
								</div>
							<?php endforeach; ?>
						</div>						
					</div>
				</div>
			</div>
			<!-- end .panel1 -->
		</div>		
	</div>	
</div>
<!-- end #content -->

<?php $this->load->view('view_scripts') ?>

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
	
<script>
	$(document).ready(function() {
		App.init();
		$("#ULsidebar > li").removeClass("active");
		$("#LIproductos").addClass("active");

		$("#datepicker-default").val('10/09/2015');
		$(".datepicker1").datepicker({format: 'dd/mm/yyyy',autoclose:true});
	});
</script>
<style>.panel-body { padding: 28px 35px; } </style>
</body>
</html>