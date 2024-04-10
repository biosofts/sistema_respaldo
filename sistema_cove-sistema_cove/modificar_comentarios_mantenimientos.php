<?php
session_start();
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');
include_once "conexion.php";
$ids = $_GET['id_mantenimiento'];
$id_comentario = $_GET['id_comentario'];

		$actualizacion = "UPDATE observacion_servicio SET checado='2', id_administrador_checador='".$_SESSION['id_usuario']."', fecha_verificado='".date('Y-m-d H:i:s')."' WHERE id=".$id_comentario;
		if (mysqli_query($conexion,$actualizacion)) { 
			echo "<script>location.href='alta_comentarios_mantenimientos.php?id=".$ids."';</script>";
		}
		mysqli_close($conexion);
?>