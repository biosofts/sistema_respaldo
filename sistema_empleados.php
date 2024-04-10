<?php
session_start();
if ($_SESSION['nombre_usuario'] == "")
	header ('location: index.php');

error_reporting(1);
header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
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

<style type="text/css">
div#container
{
	position:relative;
	width: 1863px;
	margin-top: 0px;
	margin-left: auto;
	margin-right: auto;
	text-align:left; 
}
body {text-align:center;margin:0}
</style>

</head>
<body>
<div id="container">
<div id="html1" style="position:absolute; overflow:hidden; left:243px; top:73px; width:1600px; height:814px; z-index:7">
<table border=1 align="center">
<tr align="center">
	<td>Obra</td>
	<td>Ticket</td>
	<td>cliente</td>
	<td>CIO</td>
	<!--<td>Supervisor(es)</td>-->
	<td>Presupuesto</td>
	<td>Fecha respaldo</td>
	<td>Autorizacion</td>
	<td>OC Fecha</td>
	<td>Factura</td>
	<td>Fecha factura</td>
	<td>Subtotal</td>
	<td>I.V.A.</td>
	<td>Total</td>
	<td>Observaciones del administrador</td>
	<td>Prioridad</td>
	<td>Hoja servicio</td>
	<td>Reporte fotografico</td>
	<td>Comentarios</td>
	<td>Fecha creacion</td>
	<!--<td>Creador</td>-->
	<td>Actualizo</td>
	<!--<td>Supervisores</td>-->
	<!--<td>Modificar</td>-->
	<!--<td>Quitar</td>-->

</tr>
<?php 
include_once "conexion.php";
$consulta_supervisor = "SELECT * FROM supervisores_mantenimientos where estado = 1 and nombre_id=".$_SESSION["id_usuario"];
$resultado_supervisor = mysqli_query($conexion, $consulta_supervisor);

while ($row1 = mysqli_fetch_assoc($resultado_supervisor)) {

$consulta = "SELECT * FROM servicios where activo = 1 and id=".$row1["mantenimiento_id"];
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
	    /*//cosulta supervisor principal
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
		echo "<td>Ver</td>";
		echo "<td>Ver</td>";
		//echo "<td><a href='alta_comentarios_mantenimientos.php?id=".$row["id"]."'> Ver </a></td>";
		$verificar_checados="select * from observacion_servicio where servicio_id=".$row["id"]." and checado='NO'";
		$comentarios_por_revisar = mysqli_num_rows(mysqli_query($conexion, $verificar_checados));
		if( $comentarios_por_revisar == 0)
			echo "<td bgcolor='00FF00'><a href='alta_comentarios_mantenimientos.php?id=".$row["id"]."'> Ver </a></td>";
		else
			echo "<td bgcolor='FF0000'><a href='alta_comentarios_mantenimientos.php?id=".$row["id"]."'> Ver </a></td>";echo "<td>".$row["fecha_creacion"]."</td>";
		//echo "<td>".$row["creador_registro"]."</td>";
		echo "<td>".$row["actualizo"]."</td>";
		//echo "<td> <a title='Agregar supervisor' href='alta_supervisor_mantenimiento.php?id=".$row["id"]."'><img src='images/paste2.jpg' border=0 width='50%' height='50%'></a></td>";
		//echo "<td> <a title='Modificar usuario' href='modificar_cio.php?id=".$row["id"]."'><img border=0 width='50%' height='50%' alt='' src='images/modificar.png'></a></td>";
		//echo "<td> <a title='Modificar usuario' href='quitar_cio.php?id=".$row["id"]."'><img border=0 width='50%' height='50%' alt='' src='images/tache.png'></a></td>";
    echo "</tr>";
}
}
?>
</table>
</div>

<div id="image1" style="position:absolute; overflow:hidden; left:22px; top:10px; width:201px; height:127px; z-index:0"><img src="images/WhatsApp Image 2024-01-16 at 7.01.31 PM.jpeg" alt="" title="" border=0 width=201 height=127></div>

<div id="roundrect1" style="position:absolute; overflow:hidden; left:228px; top:2px; width:10px; height:888px; z-index:1"><img border=0 width="100%" height="100%" alt="" src="images/roundrect267572546.gif"></div>

<div id="roundrect2" style="position:absolute; overflow:hidden; left:20px; top:251px; width:204px; height:14px; z-index:2"><img border=0 width="100%" height="100%" alt="" src="images/roundrect267572531.gif"></div>

<div id="text8" style="position:absolute; overflow:hidden; left:244px; top:5px; width:1255px; height:35px; z-index:3">
<div class="wpmd">
<div><font class="ws16"><B>Registros relacionados</B></font></div>
</div></div>

<div id="text1" style="position:absolute; overflow:hidden; left:30px; top:276px; width:189px; height:35px; z-index:4">
<a href="sistema_empleados.php" title="Inicio de sistema"><div class="wpmd">
<div><font class="ws16"><B>I N I C I O</B></font></div>
</div></a></div>

<div id="image5" style="position:absolute; overflow:hidden; left:172px; top:855px; width:51px; height:51px; z-index:23"><a href="salir.php" title="Salir del sistema"><img src="images/paste8.jpg" alt="" title="" border=0 width=51 height=51></a></div>

<div id="text10" style="position:absolute; overflow:hidden; left:26px; top:139px; width:197px; height:66px; z-index:19">
<div class="wpmd">
<div><font class="ws14">Bienvenido: <?php echo $_SESSION["nombre_usuario"];?> </font></div>
</div></div>

<div id="text11" style="position:absolute; overflow:hidden; left:26px; top:218px; width:203px; height:36px; z-index:20">
<div class="wpmd">
<div><font class="ws14">Usuario: <?php if($_SESSION["rol"] == 1) echo "Administrador"; else echo "Empleado"?></font></div>



</div>

</body>
</html>
