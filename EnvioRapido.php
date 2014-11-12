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
		<!-- Personal JavaScript -->
		<script src="js/script.js"></script>
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="EnvioRapido.php">BlueTurtle</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="EnvioRapido.php">Salida</a></li>
						<li><a href="recibidos.php">Entrada</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Perfil</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Opciones <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Amigos</a></li>
								<li><a href="index.php">Salir</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
			<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-lg-6">
				<form action="php/enviar.php" method="POST" role="form">
					<legend>Envio Rápido</legend>
					<div class="form-group">
						<label for="tipo">Seguridad</label>
						<select name="tipo" id="envRapSeg" class="form-control" required="required" onchange="envRapOp(this.value);">
							<option value=""></option>
							<option value="basica">Básica</option>
							<option value="passwd">Palabra clave</option>
						</select><br>
						<div id="oculto">
							<label for="palCla">Palabra clave</label>
							<input type="password" name="palCla" id="palCla" class="form-control" value="" pattern="^[a-zA-Z0-9\s]{5,20}" title="" placeholder="minimo 5 letras o numeros" maxlength="20"><br>
							<label for="conPal">Confirmar</label>
							<input type="password" name="conPal" id="conPal" class="form-control" value="" pattern="^[a-zA-Z0-9\s]{5,20}" title="" disabled placeholder="minimo 5 letras o numeros" maxlength="20"><br>	
						</div>
						<label for="email">eMail</label>
						<input type="email" name="email" id="email" class="form-control" value="" required="required" title=""><br>
						<label for="mensaje">Mensaje</label>
						<textarea name="mensaje" id="mensaje" cols="40" rows="5" class="form-control" required="required" maxlength="250"></textarea>
					</div>
					<input type="submit" name="enviar" value="Enviar" class="btn btn-primary pull-right"><br><br>
				</form>
			</div>
		</div>		
	</body>
</html>