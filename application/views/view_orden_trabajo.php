<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
<link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />

<!-- begin #content -->
<div id="content" class="content">			
	<div class="row">
		<div class="col-md-12">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Órdenes de Trabajo</h4>
				</div>
				<div class="panel-body">
					<a href="#modal-message" class="btn btn-sm btn-primary" data-toggle="modal">Nueva Orden </a>
					<table class="table table-hover" id="tabla_materias_primas">
						<thead>
							<tr>
								<th>Nº</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>Fecha Entrega</th>
								<th>Próxima Entrega</th>
								<th>Cliente</th>
								<th>Nº orden compra</th>
								<th>Lote</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php foreach ($ordenes_trabajo as $orden): ?>
								<tr class="table_click" data-id="<?=$orden->id_orden?>">
									<td><?=$orden->id_orden?></td>
									<td><?php $fecha = new DateTime($orden->fecha_creacion); echo date_format($fecha, 'd/m/Y'); ?></td>
									<td><?=$orden->descripcion?></td>
									<td><?php $fecha = new DateTime($orden->fecha_entrega); echo date_format($fecha, 'd/m/Y'); ?></td>
									<td><?php if($orden->proxima != NULL){ $fecha = new DateTime($orden->proxima); echo date_format($fecha, 'd/m/Y'); }?></td>
									<td><?=$orden->cliente?></td>								
									<td><?=$orden->orden_de_compra?></td>								
									<td><?=$orden->lote?></td>								
								</tr>
							<?php endforeach; ?>					
						</tbody>
					</table>
				</div>
			</div>
			<!-- end .panel -->
		</div>		
	</div>	
</div>
<!-- end #content -->

<!-- #modal-dialog -->
<div class="modal modal-message fade" id="modal-message">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Nueva orden de trabajo</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="form-group">
						<div class="col-sm-3"><input type="text" class="form-control" placeholder="Cliente"></div>
						<div class="col-sm-4"><input type="text" class="form-control" placeholder="Producto"></div>
						<div class="col-sm-3"><input type="text" class="form-control" placeholder="Nº OC Cliente"></div>
						<div class="col-sm-2"><input type="text" class="form-control datepicker1" id="datepicker-default" placeholder="Fecha enrtega"/></div>
					</div>
					<hr>
					<div class="col-sm-5">
						<div class="form-group" id="entrega_parcial">									
						</div>
						<button type="button" class="btn btn-white agregar" data-id="entrega_parcial">Agregar Entrega Parcial</button>						
					</div>
					
					<div class="col-sm-1"></div>
					
					<div class="col-sm-6">
						<div class="form-group" id="materia_prima">										
						</div>
						<button type="button" class="btn btn-white agregar" data-id="materia_prima">Agregar Materia Prima</button>
					</div>
				</form>	
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cerrar</a>
				<a href="javascript:;" class="btn btn-sm btn-primary">Registrar</a>
			</div>
		</div>
	</div>
</div>
<!-- end #modal-dialog -->	

<!-- #items appened -->	
<div id="entrega_parcial_base" style="display:none">
	<div class="form-group">
		<div class="col-sm-6"><input type="text" class="form-control" placeholder="Cantidad"></div>
		<div class="col-sm-6"><input type="text" class="form-control datepicker1" value="Fecha Entrega"></div>
		<div class="exis">X</div>
	</div>
</div>
<div id="materia_prima_base" style="display:none">
	<div class="form-group">
		<div class="col-sm-5">
			<select class="form-control">
				<option value="">Materia Prima</option>
				<?php foreach ($materias_primas as $materia) : ?>
					<option value="<?=$materia->id_materia?>"><?=$materia->descripcion?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col-sm-5">
			<select class="form-control">
				<option value="">Masterbach</option>
				<?php foreach ($masterbachs as $masterbach) : ?>
					<option value="<?=$masterbach->id_masterbach?>"><?=$masterbach->descripcion?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col-sm-2"><input type="text" class="form-control" placeholder="Lote"></div>
		<div class="exis">X</div>
	</div>
</div>
<!-- end #items appened -->	

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
		//$("#datepicker-default").val('10/09/2015');
		$(".datepicker1").datepicker({format: 'dd/mm/yyyy',autoclose:true});
				
		$(".agregar").click(function(){
			var id = $(this).data('id');
			$("#"+id).append( $("#"+id+"_base").html() );	
			$(".datepicker1").datepicker({format: 'dd/mm/yyyy',autoclose:true});
			$(".exis").click(function(){
				$(this).parent().remove();
			});
		});		
		
		$(".table_click").click(function(){
			var id = $(this).data('id');
			location.href = "<?=base_url()?>orden_trabajo/orden/"+id;
		});
	});
</script>
<style>
	.table_click { cursor: pointer;	}
	.exis { position: absolute; right: -15px; margin-top: 8px; cursor: pointer; }
</style>
</body>
</html>