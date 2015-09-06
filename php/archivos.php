<section class="panel panel-default pos-rlt clearfix">

	<header class="panel-heading"> <i class="fa fa-file-text icon"></i> Archivos </header>
	
	<!-- <div class="row wrapper">
			<div class="col-md-3">
							<div class="form-group">
								<label class="col-lg-3 control-label">Categor&iacute;as</label>
								<div class="col-lg-9">
									<select class="form-control" id="option">
											<option>Todas</option>	
											<option>Opt 1</option>
											<option>Opt 2</option>
											<option>Opt 3</option>
										</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="col-lg-3 control-label">Carpetas</label>
								<div class="col-lg-9">
									<select class="form-control" id="option">
											<option>Todas</option>	
											<option>Opt 1</option>
											<option>Opt 2</option>
											<option>Opt 3</option>
										</select>
								</div>
							</div>
						</div>
	</div> -->

	<div class="row wrapper">
		<div class="col-sm-2 m-b-xs">
			<a href="admin.php?m=archivosAgregar" class="pull-left btn btn-sm btn-success"><i class="fa fa-plus"></i> Nuevo Archivo </a>
		</div>
		<div class="col-sm-7 m-b-xs text-center">
			<!-- <a href="" class="btn btn-default btn-sm">Cuentas por Cobrar</a>
			<a href="" class="btn btn-default btn-sm">Reporte de Ingresos</a> -->
		</div>
		<div class="col-sm-3">
			<div class="input-group">
				<input type="text" class="input-sm form-control" placeholder="Buscar"> <span class="input-group-btn"> <button class="btn btn-sm btn-default" type="button"> <i class="fa fa-search"></i> </button> </span>
			</div>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-striped b-t b-light">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Carpetas</th>
					<th>Tipo</th>
					<!-- <th>nivel de acceso</th>
					<th width="200">T&eacute;rmino suscripci&oacute;n</th> -->
					<th width="120"></th>
				</tr>
			</thead>
			<tbody>

				<tr>
					<td><a href="admin.php?m=subCategorias&id=<?php echo "columna1"; ?>"> Columna 1</a></td>
					<td>columna 2</td>
					<td>coumna 3</td>
					<td>
						<a href="admin.php?m=clientesEditar&id=" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i> </a> &nbsp;&nbsp;&nbsp;
						<a href="admin.php?m=clientes&del=" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="admin.php?m=subCategorias&id=<?php echo "columna2"; ?>"> Columna 2</a>
					</td>
					<td>columna 2</td>
					<td>coumna 3</td>
					<td>
						<a href="admin.php?m=clientesEditar&id=" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i> </a> &nbsp;&nbsp;&nbsp;
						<a href="admin.php?m=clientes&del=" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
					</td>
				</tr>
<!-- 				<tr>
					<td colspan="2">
						<div class="form-group">
							<div class="col-lg-6 col-md-9 col-sm-12"> 	
							<input type="text" name="nombre" class="form-control" placeholder="Nueva Categor&iacute;a">
							</div>
								<label class="col-lg-3 control-label"></label>
								
						</div>
					</td>
					<td>
						<a href="admin.php?m=categoriasAgregar" class="pull-left btn btn-sm btn-success"> <i class="fa fa-plus"></i>&nbsp;&nbsp; Agregar </a>
					</td>
				</tr> -->

			</tbody>
		</table>
	</div>


</section>