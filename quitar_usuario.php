<?php

include_once "conexion.php";
$ids = $_GET['id'];
$actualizacion = "UPDATE usuarios SET estado='0' WHERE id=".$ids;
if (mysqli_query($conexion,$actualizacion)) { 
			header ('location: usuarios.php');
		}
		mysqli_close($conexion);
?>