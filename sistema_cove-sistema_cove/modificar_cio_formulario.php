<?php
session_start();

error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');

include_once "conexion.php";
if(isset($_POST['formbutton1'])) {
		$ids = $_POST['formtext0'];
		$cio = $_POST['formtext1'];
		$inmueble = $_POST['formtext2'];
		$ciudad = $_POST['formtext3'];
		
		$actualizacion = "UPDATE sucursales SET cio='".$cio."', inmueble='".$inmueble."', ciudad='".$ciudad."', updated_time='".date('Y-m-d H:i:s')."', actualizo='".$_SESSION['nombre_usuario']."' WHERE id=".$ids;
		if (mysqli_query($conexion,$actualizacion)) { 
			header ('location: mantenimientos.php');
		}
		echo $actualizacion;
		mysqli_close($conexion);
}
?>