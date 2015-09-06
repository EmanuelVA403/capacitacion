<section class="panel panel-default pos-rlt clearfix">


	<header class="panel-heading"> <i class="fa fa-users icon"></i> Usuarios </header>
	
	<div class="row wrapper">
		<div class="col-sm-2 m-b-xs">
			<a href="admin.php?m=clientesAgregar" class="pull-left btn btn-sm btn-success"><i class="fa fa-plus"></i> Nuevo usuario</a>
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
					<th>Login</th>
					<th>Tipo usuario</th>
					<th width="200">T&eacute;rmino suscripci&oacute;n</th>
					<th width="120"></th>
				</tr>
			</thead>
			<tbody>
				<?php
					if ( isset($_GET['del']) ){
						$del = mysql_real_escape_string($_GET['del']);
						mysql_query("DELETE FROM usuarios WHERE id_usuario='".$del."'");
					}

					if ( isset($_GET['buscar']) ){
						$buscar = mysql_real_escape_string($_GET['buscar']);
						$consulta  = "SELECT * FROM usuarios WHERE 
							(nombre LIKE '%".$buscar."%' OR 
								login LIKE '%".$buscar."%' 
							ORDER BY nombre ASC";
							$url = "admin.php?m=clientes&buscar=".$buscar;
					} else {
						$consulta  = "SELECT * FROM capacitacion.usuarios ORDER BY nombre ASC";
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

					<td><?php echo $q->nombre; ?></td>
					<td><?php echo $q->login; ?></td>
					<td><?php echo $q->tipo_usuario; ?></td>
					<td><?php echo $q->fecha_expira; ?></td>
					<td>
						<a href="admin.php?m=clientesEditar&id=<?php echo $q->id_usuario; ?>" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i> </a> &nbsp;&nbsp;&nbsp;
						<a href="admin.php?m=clientes&del=<?php echo $q->id_usuario; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
					</td>
				</tr>			
				<?php
							}
				?>



				<tr>
					<td>columna 1</td>
					<td>columna 2 </td>
					<td>columna 3</td>
					<td>columna 4</td>
					<td>
						<a href="admin.php?m=clientesEditar&id=" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i> </a> &nbsp;&nbsp;&nbsp;
						<a href="admin.php?m=clientes&del=" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
					</td>
				</tr>
				<tr>
					<td>columna 1</td>
					<td>columna 2 </td>
					<td>columna 3</td>
					<td>columna 4 </td>
					<td>
						<a href="admin.php?m=clientesEditar&id=" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i> </a> &nbsp;&nbsp;&nbsp;
						<a href="admin.php?m=clientes&del=" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
					</td>
				</tr>

			</tbody>
		</table>
	</div>

</section>