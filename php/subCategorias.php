<?php

if ( isset($_POST['nombre']) ){

	$categoria 	= mysql_real_escape_string($_POST['cat']);
	$nombre 		= mysql_real_escape_string($_POST['nombre']);
	// $login			= mysql_real_escape_string($_POST['categoria']);
	// $pass			= mysql_real_escape_string($_POST['pass']);
	// $meses  		= mysql_real_escape_string($_POST['meses']);
	// $tipo_usuario 	= mysql_real_escape_string($_POST['tipo_usuario']);
	//$contacto  	= mysql_real_escape_string($_POST['contacto']);
	//$correo  	= mysql_real_escape_string($_POST['correo']);
	//$rfc  		= mysql_real_escape_string($_POST['rfc']);
	if( isset($_POST['cat']))
	{
		if ( mysql_query("INSERT INTO carpetas SET nombre='".$nombre."', id_categoria=".$categoria)){
			$errorMsg = '<div class="alert alert-success">
					<i class="fa fa-check"></i> Categoria agregada correctamente.
				</div>';
		} else {
			$errorMsg = '<div class="alert alert-danger">
				<i class="fa fa-times"></i> Error, intenta nuevamente.
			</div>';
		}
	}
	else
	{
		$errorMsg = '<div class="alert alert-danger">
				<i class="fa fa-times"></i> Error, indica la categor&iacute;a
			</div>';
	}

}

?>
<section class="panel panel-default pos-rlt clearfix">




	<header class="panel-heading"> <i class="fa fa-folder"></i> Carpetas </header>
	

	<div class="row wrapper">
		<div class="col-sm-2 m-b-xs">
			<!-- <a href="admin.php?m=subCategoriaAgregar" class="pull-left btn btn-sm btn-success"><i class="fa fa-plus"></i> Agregar Carpetas </a> -->
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
					<th>Carpeta</th>
					<th>Categor&iacute;a</th>
					<!-- <th>nivel de acceso</th>
					<th width="200">T&eacute;rmino suscripci&oacute;n</th> -->
					<th width="120"></th>
				</tr>
			</thead>
			<tbody>
				<?php
					if ( isset($_GET['del']) ){
						$del = mysql_real_escape_string($_GET['del']);
						mysql_query("DELETE FROM carpetas WHERE id_carpeta='".$del."'");
					}

					if ( isset($_GET['buscar']) ){
						$buscar = mysql_real_escape_string($_GET['buscar']);
						$consulta  = "SELECT * FROM carpetas WHERE 
							(nombre LIKE '%".$buscar."%'
							ORDER BY nombre ASC";
							$url = "admin.php?m=categorias&buscar=".$buscar;
					} else {
						$consulta  = "Select cr.id_carpeta, cr.nombre as carpeta, ct.nombre as categoria FROM capacitacion.carpetas cr
								Left Join capacitacion.categorias ct on cr.id_categoria = ct.id_categoria";
								//ORDER BY cr.nombre ASC ";
								if(isset($_GET['id'])){
									$id_cat = mysql_real_escape_string($_GET['id']);
									$consulta = $consulta." Where cr.id_categoria =".$id_cat;
								}
							$consulta = $consulta." ORDER BY cr.nombre ASC ";
						$url = "admin.php?m=subCategorias";
					}
				?>
				<?php 
							##### PAGINADOR #####
					$rows_per_page = 20;

					if(isset($_GET['pag']))
						$page = mysql_real_escape_string($_GET['pag']);
					else if (@$_GET['pag'] == "0")
						$page = 1;
					else 
						$page = 1;

					$num_rows 		= mysql_num_rows(mysql_query($consulta));
					#if (!$num_rows)
 					#die("mySQL error: ". mysql_error());  
					$lastpage		= ceil($num_rows / $rows_per_page);    		
					$page     = (int)$page;
					if($page > $lastpage){
						$page = $lastpage;
					}
					if($page < 1){
						$page = 1;
					}
					$limit 		= 'LIMIT '. ($page -1) * $rows_per_page . ',' .$rows_per_page;
					$consulta  .=" $limit";

					#echo $consulta;
					$consulta = mysql_query($consulta);
					/*if (!$consulta)
 					die("mySQL error: ". mysql_error());  */
					##### PAGINADOR #####

					while($q = mysql_fetch_object($consulta)){
				?>
				<tr>
					<td><a href="admin.php?m=archivos&id=<?php echo "$q->id_carpeta"; ?>"><u><?php echo $q->carpeta; ?></u></a></td>
					<td><?php echo $q->categoria; ?></td>
					<td>
						<a href="admin.php?m=subCategorias&id=<?php echo $q->id_carpeta; ?>" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i> </a> &nbsp;&nbsp;&nbsp;
						<a href="admin.php?m=subCategorias&del=<?php echo $q->id_carpeta; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
					</td>
				</tr>			
				<?php
							}
				?>


				<tr>
					<td><a href="#"> Columna 1</a></td>
					<!-- <td><i class="fa fa-list"></i> columna 1</td> -->
					<td>columna 2 </td>
					<td>
						<a href="admin.php?m=clientesEditar&id=" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i> </a> &nbsp;&nbsp;&nbsp;
						<a href="admin.php?m=clientes&del=" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
					</td>
				</tr>
				<tr>
					<td><a href="#"> Columna 1</a></td>
					<td> Columna 2</td>
					<td>
						<a href="admin.php?m=clientesEditar&id=" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i> </a> &nbsp;&nbsp;&nbsp;
						<a href="admin.php?m=clientes&del=" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
					</td>
				</tr>
				<tr>
					<form class="bs-example form-horizontal" action="" method="post">
						<td>
							<div class="form-group">
								<div class="col-lg-6 col-md-9 col-sm-12"> 	

								<input type="text" name="nombre" class="form-control" placeholder="Nueva Carpeta">
								</div>
									<!-- <label class="col-lg-3 control-label"></label> -->								
							</div>
						</td>
						<td>
							
							<div class="form-group">
	<!-- 								<label class="col-md-3 control-label"> Categor&iacute;a </label>
									<div class="col-md-9"> -->
										<select class="form-control" name="cat" id="factura">
										<?php 
										$consulta  = "Select * From categorias order by nombre ASC";
										$consulta = mysql_query($consulta);
										while($q = mysql_fetch_object($consulta)){
										?>
											<option value="<?php echo $q->id_categoria ?>"><?php echo $q->nombre ?></option>
										<?php
											}
										?>	
										</select>
									<!-- </div> -->
								</div>
								
						</td>
						<td>
							<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check icon"></i> Agregar</button>
							<!-- <a href="admin.php?m=categoriasAgregar" class="pull-left btn btn-sm btn-success"> <i class="fa fa-plus"></i>&nbsp;&nbsp; Agregar </a> -->
						</td>
					</form>
				</tr>

			</tbody>
		</table>
	</div>


</section>