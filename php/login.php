<?php 
	include ('conexion.php');
	$clave = "blackmamba";
	$salt='$xyba%5639*';
	if ($_POST['token'] === md5($_POST['var2'].$_POST['var1'].$_SERVER['HTTP_HOST'].$clave))
	{
		$usuario   = $_POST["user"];
		$pass      = sha1(md5($salt.$_POST['pass']));
		$sentencia = "SELECT * FROM usuarios WHERE usuario='$usuario'";
		$query     = mysqli_query($con,$sentencia);
		$arreglo   = mysqli_fetch_array($query);
		if ($pass == $arreglo['password']) {
			session_start();
			$_SESSION['autentificado'] = true;
			$_SESSION['username']      = $arreglo['nombre'];
			$_SESSION['user']          = $arreglo['usuario'];
			$_SESSION['password']      = $arreglo['password'];
			$_SESSION['email']         = $arreglo['email'];
			$_SESSION['pwemail']       = $arreglo['pwemail'];
			header("location:../EnvioRapido.php");
		}
		else
		{
			echo "<script>alert('los datos son incorrectos');
			location.href='../index.php';
			</script>";
		}
	}
	else
	{
		header("location:../index.php");
	}
?>