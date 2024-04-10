<?php
include_once "conexion.php";
$consulta1 = "SELECT * FROM servicios order by id DESC";
		$resultado1 = mysqli_query($conexion, $consulta1);
		$row1 = mysqli_fetch_assoc($resultado1);
			$insertar = "insert into supervisores_mantenimientos (id,nombre_id,mantenimiento_id,estado) values ('','cesar',".$row1["id"].",'1')";
			if (mysqli_query($conexion,$insertar)){
				header ('location: mantenimientos.php');
			}
?>