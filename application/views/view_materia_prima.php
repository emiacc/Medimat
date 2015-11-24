<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
<link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
<link href="<?= base_url(); ?>assets/plugins/parsley/src/parsley.css" rel="stylesheet" />

<!-- begin #content -->
<div id="content" class="content">			
	<div class="row">
		<div class="col-md-8">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Materia Prima</h4>
				</div>
				<div class="panel-body">
					<a href="#modal-dialog" data-toggle="modal" class="btn btn-primary pull-right m-r-25 m-b-25">Registrar Ingreso</a>
					<table class="table table-hover" id="tabla_materias_primas">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Stock Mínimo (Kg)</th>
								<th>Stock Vigente (Kg)</th>
								<th>Ver Historial</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($materias_primas as $materia): ?>
								<tr data-id="<?=$materia->id_materia?>">
									<td class="table_click table_historial">
										<?php if($materia->id_tipo_materia == 1): ?>
											<a class="btn btn-primary btn-icon btn-circle btn-xs">M</a>
										<?php else: ?>
											<a class="btn btn-info btn-icon btn-circle btn-xs">E</a>
										<?php endif; ?>&nbsp;
										<?=$materia->descripcion?>
									</td>
									<td class="text-center"><?=$materia->stock_minimo?></td>
									<td class="text-center">0</td>
									<td class="text-center table_click table_historial"><i class="fa fa-bars fa-lg"></i></td>									
								</tr>
							<?php endforeach; ?>					
						</tbody>
					</table>
				</div>
			</div>
			<!-- end .panel -->
		</div>	
		<?php if(!empty($historial)): ?>
		<div class="col-md-4">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Historial <?=$materia_seleccionada->descripcion?></h4>
				</div>
				<div class="panel-body">
					<table class="table table-hover" id="tabla_materias_primas">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Tipo</th>
								<th>Cantidad</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($historial as $item): $fecha = new Datetime($item->fecha) ?>
								<tr data-id="<?=$materia_seleccionada->id_materia?>">
									<td class="text-center"><?=date_format($fecha, 'd/m/Y')?></td>
									<td class="text-center">
										<?php if($item->ingreso == 1): ?>
											<i class="fa fa-plus fa-lg"></i>
										<?php else: ?>
											<i class="fa fa-minus fa-lg"></i>
										<?php endif; ?>&nbsp;
									</td>
									<td class="text-center"><?=$item->cantidad?></td>
								</tr>
							<?php endforeach; ?>					
						</tbody>
					</table>
				</div>
			</div>
			<!-- end .panel -->
		</div>
		<?php elseif(isset($historial)): ?>
			<h4 class="historial-vacio">NO SE REGISTRARON MOVIMIENTOS</h4>
		<?php endif; ?>
	</div>	
</div>
<!-- end #content -->

<!-- #modal-dialog -->
<div class="modal fade" id="modal-dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Ingreso de Materia Prima</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-bordered" id="form_ingreso_materia" method="POST" action="<?=base_url()?>materia_prima/ingreso" data-parsley-validate="true">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Fecha</label>
                        <div class="col-md-9"><input type="text" class="form-control" id="datepicker-default" name="fecha_ingreso" placeholder="Seleccione Fecha" data-parsley-required="true"/></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Materia Prima</label>
                        <div class="col-md-9 ui-sortable">
                        	<select id="select_materias" name="select_materias" class="form-control" data-parsley-required="true">
                        			<option value="">Seleccione...</option>
                        		<?php foreach ($materias_primas as $materia): ?>
                        			<option value="<?=$materia->id_materia?>"><?=$materia->descripcion?></option>
                        		<?php endforeach; ?>
                        	</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Cantidad</label>
                        <div class="col-md-9 ui-sortable"><input type="text" name="cantidad" class="form-control" placeholder="Cantidad" data-parsley-required="true" data-parsley-type="digits"></div>
                    </div>
                </form>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cerrar</a>
				<a href="javascript:;" class="btn btn-sm btn-primary" id="ingreso_materia">Registrar</a>
			</div>
		</div>
	</div>
</div>		

<?php $this->load->view('view_scripts') ?>

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>assets/plugins/parsley/dist/parsley.js"></script>
<script src="<?= base_url(); ?>assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
	
<script>
	$(document).ready(function() {
		App.init();
		$("#ULsidebar > li").removeClass("active");
		$("#LImateria").addClass("active");

		d = new Date();
		mes = (d.getMonth()+1);
		if(mes < 10) mes = "0"+mes;
		currentDay = d.getDate()+"-"+mes+"-"+ d.getFullYear();
		$("#datepicker-default").val(currentDay);
		$("#datepicker-default").datepicker({format: 'dd-mm-yyyy',autoclose:true});
		
		$(".table_historial").click(function(){
			location.href = '<?=base_url()?>materia_prima/index/'+$(this).parent().data('id');
		});

		$("#ingreso_materia").click(function(){
			$("#form_ingreso_materia").submit();
		});
		
		/*$(".table_ingreso").click(function(){
			var id = $(this).parent().data('id');
			$('#select_materias').val(id);			
			$('#modal-dialog').modal('show');
		});*/

		

	});
</script>
<style>
	.table_click { cursor: pointer;	}
	.historial-vacio
	{
	    text-align: center;
    	color: red;
    	margin-top: 30px;
	}
</style>
</body>
</html>