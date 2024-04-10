<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="generator" content="Web Page Maker">
<style type="text/css">
/*----------Text Styles----------*/
.ws6 {font-size: 8px;}
.ws7 {font-size: 9.3px;}
.ws8 {font-size: 11px;}
.ws9 {font-size: 12px;}
.ws10 {font-size: 13px;}
.ws11 {font-size: 15px;}
.ws12 {font-size: 16px;}
.ws14 {font-size: 19px;}
.ws16 {font-size: 21px;}
.ws18 {font-size: 24px;}
.ws20 {font-size: 27px;}
.ws22 {font-size: 29px;}
.ws24 {font-size: 32px;}
.ws26 {font-size: 35px;}
.ws28 {font-size: 37px;}
.ws36 {font-size: 48px;}
.ws48 {font-size: 64px;}
.ws72 {font-size: 96px;}
.wpmd {font-size: 13px;font-family: Arial,Helvetica,Sans-Serif;font-style: normal;font-weight: normal;}
/*----------Para Styles----------*/
DIV,UL,OL /* Left */
{
 margin-top: 0px;
 margin-bottom: 0px;
}
</style>

</head>
<body>
<div class="wpmd">
<table border=1 align="center">
<tr align="center">
	<td>Obra</td>
	<td>Ticket</td>
	<td>cliente</td>
	<td>CIO</td>
	<td>Supervisor(es)</td>
	<td>Presupuesto</td>
	<td>Fecha respaldo</td>
	<td>Autorizacion</td>
	<td>OC Fecha</td>
	<td>Factura</td>
	<td>Fecha factura</td>
	<td>Subtotal</td>
	<td>I.V.A.</td>
	<td>Total</td>
	<td>Comentarios</td>
	<td>Prioridad</td>
	<td>Hoja servicio</td>
	<td>Reporte fotografico</td>
	<td>Fecha creacion</td>
	<td>Creador</td>
	<td>Actualizo</td>

</tr>
<?php 
include_once "conexion.php";
$consulta = "SELECT * FROM servicios where activo = 1";
$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr align='center'>";
	    echo "<td>".$row["obra"]."</td>";
	    echo "<td>".$row["ticket"]."</td>";
	    echo "<td>".$row["cliente"]."</td>";
	    
	    //consulta sucursal
	    $consulta_suc = "SELECT * FROM sucursales where id =".$row["sucursal_id"];
		$resultado_suc = mysqli_query($conexion, $consulta_suc);
		$row_suc = mysqli_fetch_assoc($resultado_suc);
	    echo "<td>".$row_suc["cio"]." / ".$row_suc["inmueble"]." / ".$row_suc["ciudad"]."</td>";
	    //fin consulta sucursal
	    //cosulta supervisor principal
	    $consulta_sup = "SELECT * FROM supervisores_mantenimientos where mantenimiento_id =".$row["id"]." and estado = 1 ";
		$resultado_sup = mysqli_query($conexion, $consulta_sup);
		if(mysqli_num_rows($resultado_sup) == 0)
			echo "<td>Sin supervisores</td>";
		else{
		echo "<td>";
		$i=1;
		while($row_sup = mysqli_fetch_assoc($resultado_sup)){
			$consulta_sup_nombre = "SELECT * FROM usuarios where id =".$row_sup["nombre_id"];
			$resultado_sup_nombre = mysqli_query($conexion, $consulta_sup_nombre);
			$row_sup_nombre = mysqli_fetch_assoc($resultado_sup_nombre);
			echo $i.".-".$row_sup_nombre["nombre"]."<BR>";
			$i = $i + 1;
		}
		echo "</td>";}
		//fin consulta supervisor principal*/
	    echo "<td>".$row["presupuesto"]."</td>";
	    echo "<td>".$row["fecha_respaldo"]."</td>";
		echo "<td>".$row["autorizacion"]."</td>";
		echo "<td>".$row["oc_fecha"]."</td>";
		echo "<td>".$row["factura"]."</td>";
		echo "<td>".$row["fecha_factura"]."</td>";
		echo "<td>".$row["subtotal"]."</td>";
		echo "<td>".$row["iva"]."</td>";
		echo "<td>".$row["total"]."</td>";
		echo "<td>".$row["comentario"]."</td>";
		echo "<td>".$row["prioridad"]."</td>";
		echo "<td>".$row["hoja_servicio"]."</td>";
		echo "<td>".$row["reporte_fotografico"]."</td>";
		echo "<td>".$row["fecha_creacion"]."</td>";
		echo "<td>".$row["creador_registro"]."</td>";
		echo "<td>".$row["actualizo"]."</td>";
		
    echo "</tr>";
}
?>
</table>
</div></div>


</body>
</html>
