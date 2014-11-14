<?php 
	session_start();
	session_destroy();
	$var1="lower";
	$var2="merion";
	$clave="blackmamba";
?>
<!DOCTYPE html>
<html lang="es-MX">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="src/faviconbt.ico" rel="icon" type="image/x-icon" />
		<title>BlueTurtle</title>
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-lg-4">
			<div class="page-header">
			  <h1>BlueTurtle<small> mensajeria</small></h1>
			</div>
				<form action="php/login.php" method="POST" role="form">
					<legend>Inicia Sesión</legend>
					<div class="form-group">
						<label for="user">Usuario</label>
						<input type="text"  name="user" id="user" class="form-control" required="required" title="Escribe tu nombre de usuario"><br>
						<label for="pass">Contraseña</label>
						<input type="password" name="pass" id="pass" class="form-control" required="required" title="Escribe tu contraseña">
						<input name="var1" type="hidden" value="<?php echo $var1 ?>">
						<input name="var2" type="hidden"  value="<?php echo $var2 ?>" >
						<input name="token" type="hidden" value="<?php echo md5($var2.$var1.$_SERVER['HTTP_HOST'].$clave) ?>" />
					</div>
					<button type="submit" class="btn btn-primary pull-right">Entrar</button>
				</form>
				<a href="registro.php">Registrarse</a>
			</div>
		</div>		
	</body>
</html>