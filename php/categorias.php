<?php

if ( isset($_POST['nombre']) ){

	//$categoria 	= mysql_real_escape_string($_POST['categoria']);
	$nombre 		= mysql_real_escape_string($_POST['nombre']);
	//$contacto  	= mysql_real_escape_string($_POST['contacto']);
	//$correo  	= mysql_real_escape_string($_POST['correo']);
	//$rfc  		= mysql_real_escape_string($_POST['rfc']);

	if ( mysql_query("INSERT INTO categorias SET nombre='".$nombre."'") ){
		$errorMsg = '<div class="alert alert-success">
				<i class="fa fa-check"></i> Categoria agregada correctamente.
			</div>';
	} else {
		$errorMsg = '<div class="alert alert-danger">
			<i class="fa fa-times"></i> Error, intenta nuevamente.
		</div>';
	}

}

?>

<section class="panel panel-default pos-rlt clearfix">

	<header class="panel-heading"> <i class="fa fa-list"></i> Categor&iacute;as </header>
	
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
			<!-- <a href="admin.php?m=categoriasAgregar" class="pull-left btn btn-sm btn-success"><i class="fa fa-plus"></i> Agregar Categor&iacute;a</a> -->
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
					<!-- <th>Subcategorias</th> -->
					<!-- <th>nivel de acceso</th>
					<th width="200">T&eacute;rmino suscripci&oacute;n</th> -->
					<th width="120"></th>
				</tr>
			</thead>
			<tbody>
				<?php
					if ( isset($_GET['del']) ){
						$del = mysql_real_escape_string($_GET['del']);
						mysql_query("DELETE FROM categorias WHERE id_categoria='".$del."'");
					}

					if ( isset($_GET['buscar']) ){
						$buscar = mysql_real_escape_string($_GET['buscar']);
						$consulta  = "SELECT * FROM categorias WHERE 
							(nombre LIKE '%".$buscar."%' 
							ORDER BY nombre ASC";
							$url = "admin.php?m=categorias&buscar=".$buscar;
					} else {
						$consulta  = "SELECT * FROM capacitacion.categorias ORDER BY nombre ASC";
						$url = "admin.php?m=clientes";
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
					if (!$consulta)
 					die("mySQL error: ". mysql_error());  
					##### PAGINADOR #####

					while($q = mysql_fetch_object($consulta)){
				?>
				<tr>
					<td><a href="admin.php?m=subCategorias&id=<?php echo "$q->id_categoria"; ?>"><u><?php echo $q->nombre; ?></u></a></td>
					<td>
						<a href="admin.php?m=categorias&id=<?php echo $q->id_categoria; ?>" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i> </a> &nbsp;&nbsp;&nbsp;
						<a href="admin.php?m=categorias&del=<?php echo $q->id_categoria; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
					</td>
				</tr>			
				<?php
							}
				?>

				<tr>
					<td><a href="admin.php?m=subCategorias&id=<?php echo "columna1"; ?>"> Columna 1</a></td>
					<!-- <td>columna 2</td> -->
					<td>
						<a href="admin.php?m=clientesEditar&id=" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i> </a> &nbsp;&nbsp;&nbsp;
						<a href="admin.php?m=clientes&del=" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="admin.php?m=subCategorias&id=<?php echo "columna2"; ?>"> Columna 2</a>
					</td>
					<!-- <td>columna 2</td> -->
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
								<input type="text" name="nombre" class="form-control" placeholder="Nueva Categor&iacute;a">
								</div>
									<!-- <label class="col-lg-3 control-label"></label> -->
									
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