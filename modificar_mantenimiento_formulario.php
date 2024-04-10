<?php
session_start();

error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');

include_once "conexion.php";
if(isset($_POST['formbutton1'])) {
		$ids = $_POST['formtext0'];
		$obra = $_POST['formtext1'];
		$ticket = $_POST['formtext2'];
		$cliente = $_POST['formtext3'];
		$presupuesto = $_POST['formtext4'];
		$fecha_respaldo = $_POST['formtext5'];
		$oc_fecha = $_POST['formtext6'];
		$factura = $_POST['formtext7'];
		$fecha_factura = $_POST['formtext8'];
		$subtotal = $_POST['formtext9'];
		$iva = $_POST['formtext10'];
		$total = $_POST['formtext11'];

		$sucursal_id = $_POST['formselect1'];
		$autorizacion = $_POST['formselect3'];
		$prioridad = $_POST['formselect4'];
		
		$comentario = $_POST['textarea1'];
		
		$actualizacion = "UPDATE servicios SET 
			obra='".$obra."', 
			ticket='".$ticket."', 
			cliente='".$cliente."', 
			presupuesto='".$presupuesto."', 
			fecha_respaldo='".$fecha_respaldo."', 
			oc_fecha='".$oc_fecha."', 
			factura='".$factura."', 
			fecha_factura='".$fecha_factura."', 
			subtotal='".$subtotal."', 
			iva='".$iva."', 
			total='".$total."', 
			sucursal_id='".$sucursal_id."', 
			autorizacion='".$autorizacion."', 
			prioridad='".$prioridad."', 
			comentario='".$comentario."',
			actualizo='".$_SESSION['nombre_usuario']."' WHERE id=".$ids;
		if (mysqli_query($conexion,$actualizacion)) { 
			header ('location: mantenimientos.php');
		}
		echo $actualizacion;
		mysqli_close($conexion);
}
?>