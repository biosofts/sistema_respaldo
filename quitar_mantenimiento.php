<?php

include_once "conexion.php";
$ids = $_GET['id'];
$actualizacion = "UPDATE servicios SET activo='0' WHERE id=".$ids;
if (mysqli_query($conexion,$actualizacion)) { 
			header ('location: mantenimientos.php');
		}
		mysqli_close($conexion);
?>