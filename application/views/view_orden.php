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
					<h4 class="panel-title">Orden de Trabajo</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-1"><h4>Nº <?=$orden_trabajo->id_orden?></h4></div>
						<div class="col-xs-3"><h4>Cliente: <?=$orden_trabajo->cliente?></h4></div>
						<div class="col-xs-8"><h4>Producto: <?=$orden_trabajo->producto?></h4></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-xs-2"><h5>Nº Lote: <?=$orden_trabajo->lote?></h5></div>
						<div class="col-xs-3"><h5>Nº OC Cliente: <?=$orden_trabajo->orden_de_compra?></h5></div>
						<div class="col-xs-4">
							<h5>Cantidades a producir:</h5>
							<?php foreach ($entregas_x_orden as $entrega): $fecha = new DateTime($entrega->fecha_entrega); ?>
								<h5><?=$entrega->cantidad." - ".date_format($fecha, 'd/m/Y')?></h5>
							<?php endforeach; ?>
						</div>
						<div class="col-xs-3"><h5>Entrega total: <?php $fecha = new DateTime($orden_trabajo->fecha_entrega); echo date_format($fecha, 'd/m/Y'); ?></h5></div>
					</div>
					<hr>
					<div class="row">
						<?php foreach ($materias_x_orden as $materia): ?>
							<div class="row">
								<div class="col-xs-5"><h5>Materia Prima: <?=$materia->materia?></h5></div>
								<div class="col-xs-5"><h5>Masterbach (color): <?=$materia->master?></h5></div>
								<div class="col-xs-2"><h5>Lote Nº: <?=$materia->lote?></h5></div>
							</div><hr>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<!-- end .panel1 -->

			<!-- begin panel2 -->	
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Inicio de Trabajo</h4>
				</div>
				<div class="panel-body">	
					<div class="row">
						<form class="form-horizontal">
							<div class="form-group">
								<div class="col-xs-4"><input type="text" class="form-control" placeholder="Legajo / Operario"></div>
								<div class="col-xs-4 col-xs-offset-3"><input type="text" class="form-control datepicker1" id="datepicker-default" placeholder="Fecha Inicio"/></div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-5 col-xs-offset-1">
									<div class="checkbox"><label><input type="checkbox">Provisión de 1 caja y 1-2 bolsas (embalaje) con su rotulación</label></div>
									<div class="checkbox"><label><input type="checkbox">Funcionamiento de balanza</label></div>
									<div class="checkbox"><label><input type="checkbox">Tolva cargada con el material que corresponde</label></div>
								</div>
								<div class="col-xs-6">
									<div class="checkbox"><label><input type="checkbox">Se cumple Instructivo de limpieza y desinfección del área</label></div>
									<div class="checkbox"><label><input type="checkbox">Posee la vestimenta adecuada para el área</label></div>
								</div>
							</div>
							<div class="row">
								<button type="submit" class="btn btn-sm btn-primary pull-right">Registrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- end .panel2 -->
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
		$("#LIorden_trabajo").addClass("active");

		$("#datepicker-default").val('10/09/2015');
		$(".datepicker1").datepicker({format: 'dd/mm/yyyy',autoclose:true});
	});
</script>
<style>.panel-body { padding: 28px 35px; } </style>
</body>
</html>