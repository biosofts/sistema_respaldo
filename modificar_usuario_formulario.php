<?php
session_start();
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');

include_once "conexion.php";
if(isset($_POST['formbutton1'])) {
		$ids = $_POST['formtext0'];
		$nombre = $_POST['formtext1'];
		$direccion = $_POST['formtext2'];
		$usuario = $_POST['formtext3'];
		$password = $_POST['formtext3'];
		$rol = $_POST['formselect1'];
		
		
		$actualizacion = "UPDATE usuarios SET nombre='".$nombre."', direccion='".$direccion."', usuario='".$usuario."', password='".$password."', rol='".$rol."',fecha_modificacion='".date('Y-m-d H:i:s')."', realizo='".$_SESSION['nombre_usuario']."' WHERE id=".$ids;
		if (mysqli_query($conexion,$actualizacion)) { 
			header ('location: usuarios.php');
		}
		echo $actualizacion;
		mysqli_close($conexion);
}
?>