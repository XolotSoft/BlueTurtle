<?php 
$no = $_GET['no'];
$tipo = $_GET['tipo'];

if($tipo == 'basica'){
header("location:../mensaje.php?no=$no");
}
if($tipo == 'passwd'){
header("location:../passwd.php?no=$no");
	}
 ?>

