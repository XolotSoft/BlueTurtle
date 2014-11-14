<?php
session_start();
    if ($_SESSION["autentificado"]) {
		$menu1 = $_SESSION['username'];
		$no = $_GET['no'];
    }
    else {
        header("Location:index.php");
    }
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
					<a class="navbar-brand" href="#">BlueTurtle</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="EnvioRapido.php">Salida</a></li>
						<li><a href="recibidos.php">Entrada</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $menu1 ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="index.php">Salir</a></li>
								<li><a href="#">Perfil</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
			<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-lg-6">
				<form action="mensajec.php" method="POST" role="form">
					<legend>Escribe la contraseña</legend>
					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" name="pass" id="pass" class="form-control" required="required" title=""><br>
						<input type="hidden" name="no" value="<?php echo $no; ?>">
					</div>
					<input type="submit" name="enviar" value="Continuar" class="btn btn-primary pull-right"><br><br>
				</form>
			</div>
		</div>		
	</body>
</html>