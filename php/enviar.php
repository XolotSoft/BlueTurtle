<?php

	include('../Crypt/AES.php');
	$cipher  = new Crypt_AES(CRYPT_AES_MODE_ECB);
	$tipo    = $_POST['tipo'];
	$para    = $_POST['email'];
	$asunto  = "BlueTurtle".$tipo."usuario";

	if ($tipo == 'passwd'){
		if ($_POST['palCla'] == $_POST['conPal']){
			$cipher->setPassword($_POST['palCla']);
			$mensaje = base64_encode($cipher->encrypt($_POST['mensaje']));
			$mensaje = wordwrap($mensaje, 70, "\r\n");
			@mail($para,$asunto,$mensaje);
			header('Location:../EnvioRapido.php');
		}
		else{
			header('Location:../../index.php');
		}
	}

	if ($tipo == 'basica')
	{	
		$cipher->setPassword('whatever');
		$mensaje = base64_encode($cipher->encrypt($_POST['mensaje']));
		$mensaje = wordwrap($mensaje, 70, "\r\n");
		@mail($para,$asunto,$mensaje);
		header('Location:../EnvioRapido.php');
	}

?>