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
					<h4 class="panel-title">Productos</h4>
				</div>
				<div class="panel-body">
					<a href="#modal-message" class="btn btn-sm btn-primary" data-toggle="modal">Nuevo Producto</a>
					<table class="table table-hover" id="tabla_materias_primas">
						<thead>
							<tr>
								<th>Nº</th>
								<th>Nombre</th>
								<th>Codigo</th>								
								<th>Peso pieza (gr)</th>
								<th>Incidencia SCRAP (%)</th>
								<th>Total Pallets</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php foreach ($productos as $producto): ?>
								<tr class="table_click" data-id="<?=$producto->id_producto?>">
									<td><?=$producto->id_producto?></td>
									<td><?=$producto->descripcion?></td>
									<td><?=$producto->codigo?></td>		
									<td><?=$producto->gr_pieza?></td>								
									<td><?=$producto->scrap?></td>								
									<td><?=$producto->pallets?></td>								
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
				<h4 class="modal-title">Nuevo producto</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" action="<?=base_url()?>productos/nuevo_producto" id="form_ingreso_prducto">
					<div class="form-group">
						<div class="col-sm-6"><input type="text" class="form-control" name="descripcion" placeholder="Producto"></div>
						<div class="col-sm-6"><input type="text" class="form-control" name="codigo" placeholder="codigo"></div>
						<!--<div class="col-sm-3"><input type="text" class="form-control" placeholder="Unidades a producir"></div>-->
					</div>
						
					<div class="form-group">
						<!--<div class="col-sm-3"><input type="text" class="form-control" placeholder="Kg a producir"></div>-->
						<div class="col-sm-6"><input type="text" class="form-control" name="gr_pieza" placeholder="Peso pieza (gr)"></div>
						<div class="col-sm-3"><input type="text" class="form-control" name="scrap" placeholder="Incidencia SCRAP"></div>
						<div class="col-sm-3"><input type="text" class="form-control" name="pallets" placeholder="Total Pallets"></div>
					</div>
						
					<hr>
					<div class="col-sm-5">
						<div class="form-group" id="masterbatch">									
						</div>
						<button type="button" class="btn btn-white agregar" data-id="masterbatch">Agregar Msterbatch</button>						
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
				<a href="javascript:;" class="btn btn-sm btn-primary" id="ingreso_producto">Registrar</a>
			</div>
		</div>
	</div>
</div>
<!-- end #modal-dialog -->	

<!-- #items appened -->	
<div id="masterbatch_base" style="display:none">
	<div class="form-group">
		<div class="col-sm-6">
			<select class="form-control" name="id_masterbach[]">
				<option value="">Masterbach</option>
				<?php foreach ($masterbachs as $masterbach) : ?>
					<option value="<?=$masterbach->id_masterbach?>"><?=$masterbach->descripcion?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col-sm-6"><input type="text" class="form-control" name="cantidad[]" placeholder="Cantidad"></div>
		<div class="exis">X</div>
	</div>
</div>
<div id="materia_prima_base" style="display:none">
	<div class="form-group">
		<div class="col-sm-6">
			<select class="form-control" name="id_materia[]">
				<option value="">Materia Prima</option>
				<?php foreach ($materias_primas as $materia) : ?>
					<option value="<?=$materia->id_materia?>"><?=$materia->descripcion?></option>
				<?php endforeach; ?>
			</select>
		</div>
		
		<div class="col-sm-3"><input type="text" class="form-control" name="virgen[]" placeholder="Viregen"></div>
		<div class="col-sm-3"><input type="text" class="form-control" name="recuperado[]" placeholder="Recuerado"></div>
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
		$("#LIproductos").addClass("active");
		
		$(".agregar").click(function(){
			var id = $(this).data('id');
			$("#"+id).append( $("#"+id+"_base").html() );	
			$(".exis").click(function(){
				$(this).parent().remove();
			});
		});	
		
		$(".table_click").click(function(){
			var id = $(this).data('id');
			location.href = "<?=base_url()?>productos/producto/"+id;
		});

		$("#ingreso_producto").click(function(){
			$("#form_ingreso_prducto").submit();
		});
	});
</script>
<style>
	.table_click { cursor: pointer;	}
	.exis { position: absolute; right: -15px; margin-top: 8px; cursor: pointer; }	
</style>
</body>
</html>