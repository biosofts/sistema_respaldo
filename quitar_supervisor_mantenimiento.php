<?php

include_once "conexion.php";
$id_usuario = $_GET['id_usuario'];
$id_registro = $_GET['id_registro'];
$actualizacion = "UPDATE supervisores_mantenimientos SET estado='0' WHERE nombre_id=".$id_usuario." and mantenimiento_id=".$id_registro;
if (mysqli_query($conexion,$actualizacion)) { 
			header ('location: alta_supervisor_mantenimiento.php?id='.$id_registro);
		}
		mysqli_close($conexion);
?>