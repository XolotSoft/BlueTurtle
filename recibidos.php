<?php 
	session_start();
    if ($_SESSION["autentificado"]) {
    	$menu1=$_SESSION['username'];
    	$hostname = '{mx1.hostinger.mx:143/imap}INBOX';
		$username = 'usuariouno@blueturtle.zz.mu';
		$password = '123456';
		$inbox = imap_open($hostname,$username,$password) or die('Cannot connect: ' . imap_last_error());
		$emails = imap_search($inbox,'SUBJECT "BlueTurtle"');
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
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">BlueTurtle</a>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="EnvioRapido.php">Salida</a></li>
						<li class="active"><a href="recibidos.php">Entrada</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Perfil</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $menu1 ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Amigos</a></li>
								<li><a href="index.php">Salir</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<div class="panel panel-default">
				<div class="panel-heading">Mensajes Recibidos</div>
				<table class="table">
					<thead>
						<tr>
							<th></th>
							<th>Usuario</th>
							<th>Tipo</th>
							<th>Fecha</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if($emails) {
								rsort($emails);
								$i=1;
								foreach($emails as $email_number) {
									$overview = imap_fetch_overview($inbox,$email_number,0);
									$usuario = substr($overview[0]->subject, 16);
									$tipo = substr($overview[0]->subject, 10,6);
									$fecha = date("d/m/Y H:i",strtotime($overview[0]->date));
									echo '<tr>';
									echo '<td>'.$i.'</td>';
									echo '<td><a href="php/tipoCifrado.php?no='.$overview[0]->msgno.'&tipo='.$tipo.'">'.$usuario.'</a></td>';
									echo '<td>'.$tipo.'</td>';
									echo '<td>'.$fecha.'</td>';
									echo '</tr>';
									$i++;
								}
							} 
							imap_close($inbox);
						?>	
					</tbody>
				</table>
			</div>
		</div>		
	</body>
</html>