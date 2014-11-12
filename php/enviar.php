<?php

	include('../Crypt/AES.php');
	$cipher  = new Crypt_AES(CRYPT_AES_MODE_ECB);
	$tipo    = $_POST['tipo'];
	$para    = $_POST['email'];
	$asunto  = "BlueTurtle";
	$mensaje = base64_encode($cipher->encrypt($_POST['mensaje']));
	$mensaje = wordwrap($mensaje, 70, "\r\n");
	$headers = "From: "."\r\n";

	if ($tipo == 'palabra'){
		if ($_POST['palCla'] == $_POST['conPal']){
			$cipher->setPassword($_POST['palCla']);
			@mail($para,$asunto,$mensaje,$headers);
			header('Location:../EnvioRapido.php');
			
		}
		else{
			header('Location:../../index.php');
		}
	}

	if ($tipo == 'basica')
	{	
		$cipher->setPassword('whatever');
		@mail($para,$asunto,$mensaje,$headers);
		header('Location:../EnvioRapido.php');
	}

?>