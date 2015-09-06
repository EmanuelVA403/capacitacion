<?php

if ( isset($_POST['nombre']) ){

	//$categoria 	= mysql_real_escape_string($_POST['categoria']);
	$nombre 		= mysql_real_escape_string($_POST['nombre']);
	$login			= mysql_real_escape_string($_POST['login']);
	$pass			= mysql_real_escape_string($_POST['pass']);
	$meses  		= mysql_real_escape_string($_POST['meses']);
	$tipo_usuario 	= mysql_real_escape_string($_POST['tipo']);
	//$contacto  	= mysql_real_escape_string($_POST['contacto']);
	//$correo  	= mysql_real_escape_string($_POST['correo']);
	//$rfc  		= mysql_real_escape_string($_POST['rfc']);

	if ( mysql_query("INSERT INTO usuarios SET nombre='".$nombre."',login='".$login."',pass='".$pass."',fecha_expira=date_add(CURDATE(), INTERVAL ".$meses." MONTH),tipo_usuario='".$tipo_usuario."'") ){
		$errorMsg = '<div class="alert alert-success">
				<i class="fa fa-check"></i> Usuario agregado correctamente.
			</div>';
	} else {
		$errorMsg = '<div class="alert alert-danger">
			<i class="fa fa-times"></i> Error, intenta nuevamente.
		</div>';
	}

}

?>
		<section class="panel panel-default">
			<header class="panel-heading">
				<div class="pull-right">
					<a href="" class="return"><i class="fa fa-mail-reply"></i> Regresar</a>
				</div>
				<i class="fa fa-plus icon"></i> Agregar Usuario
			</header>
			<div class="panel-body">
				<form class="bs-example form-horizontal" action="" method="post">
					<?php echo $errorMsg; ?>
 					<!-- <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-3 control-label">Categoria</label>
								<div class="col-lg-9"><input type="text" name="categoria" class="form-control" placeholder="Categoria o giro del negocio"></div>
							</div>
						</div> 
						
					</div> -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-3 control-label">Nombre</label>
								<div class="col-lg-9">
									<input type="text" name="nombre" class="form-control" placeholder="Nombre de usuario">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-3 control-label">Tipo usuario</label>
								<div class="col-lg-9">
									<select class="form-control" id="option" name="tipo">
											<option value="0">Usuario</option>	
											<option value="1">Administrador</option>
										</select>
									<!-- <input type="text" name="contacto" class="form-control" placeholder="Persona de contacto"> -->
								</div>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-3 control-label">Login</label>
								<div class="col-lg-9"><input type="text" name="login" class="form-control" placeholder=""></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-3 control-label">Contrase&ntilde;a</label>
								<div class="col-lg-9"><input type="text" name="pass" class="form-control" placeholder=""></div>
							</div>
						</div>
						

					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-3 control-label">Duraci&oacute;n (meses)</label>
								<div class="col-lg-9"><input type="text" name="meses" class="form-control" placeholder=""></div>
							</div>
						</div>
<!-- 						<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-2 control-label">RFC</label>
								<div class="col-lg-10"><input type="text" name="rfc" class="form-control" placeholder=""></div>
							</div>
						</div> -->
					</div>
					<div class="line line-dashed line-lg pull-in"></div>
					<div class="form-group text-right">
						<div class="col-lg-12"> 
							<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check icon"></i> Agregar</button>
							<a href="admin.php?m=clientes" class="btn btn-sm btn-danger"><i class="fa fa-times icon"></i> Cancelar</a>
						</div>
					</div>
				</form>
			</div>
		</section>
