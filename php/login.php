<?php 
	include ('conexion.php');
	$usuario   = $_POST["user"];
	$pass      = $_POST["pass"];
	$sentencia = "SELECT * FROM usuarios WHERE usuario='$usuario'";
	$query     = mysqli_query($con,$sentencia);
	$arreglo   = mysqli_fetch_array($query);
	if ($pass == $arreglo['password']) {
		session_start();
		$_SESSION['autentificado'] = true;
		$_SESSION['username']      = $arreglo['nombre'];
		$_SESSION['user']          = $arreglo['usuario'];
		$_SESSION['email']         = $arreglo['email'];
		header("location:../EnvioRapido.php");
	}
	else
	{
		header("location:../index.php");
	}
?>