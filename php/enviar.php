<?php
	session_start();
	$tokenNac = time() - $_SESSION['tokenNac'];
    if(isset($_SESSION['token']))
    {
    	if ($_POST['token'] === $_SESSION['token'])
    	{
    		if ($tokenNac >= 5)
    		{
    			if ($_SESSION["autentificado"]) {
					include('../Crypt/AES.php');
					$cipher  = new Crypt_AES(CRYPT_AES_MODE_ECB);
					$tipo    = $_POST['tipo'];
					$para    = $_POST['email'];
					$asunto  = "BlueTurtle".$tipo.$_SESSION['username'];
					if ($tipo == 'passwd'){
						if ($_POST['palCla'] == $_POST['conPal']){
							$cipher->setPassword($_POST['palCla']);
							$mensaje = base64_encode($cipher->encrypt($_POST['mensaje']));
							$mensaje = wordwrap($mensaje, 70, "\r\n");
							@mail($para,$asunto,$mensaje);
							echo "<script>alert('El mensaje se envio correctamente');
							location.href='../EnvioRapido.php';
							</script>";
						}
						else{
							header('Location:../index.php');
						}
					}
					if ($tipo == 'basica')
					{	
						$cipher->setPassword('whatever');
						$mensaje = base64_encode($cipher->encrypt($_POST['mensaje']));
						$mensaje = wordwrap($mensaje, 70, "\r\n");
						@mail($para,$asunto,$mensaje);
						echo "<script>alert('El mensaje se envio correctamente');
						location.href='../EnvioRapido.php';
						</script>";
					}
				}
				else {
				    header("Location:../index.php");
				}
    		}
    		else
    		{
    			header("Location:../index.php");
    		}
    	}
    	else
    	{
    		header("Location:../index.php");
    	}
    }
    else
    {
    	header("Location:../index.php");
    }
?>
