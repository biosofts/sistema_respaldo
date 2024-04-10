<?php
session_start();
if ($_SESSION['nombre_usuario'] == "" || $_SESSION['rol'] == 2)
	header ('location: salir.php');

error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Sistema COVE</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="author" content="BiosoftsTechnologies Solutions">
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
	width: 1866px;
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
<div id="image1" style="position:absolute; overflow:hidden; left:22px; top:10px; width:201px; height:127px; z-index:0"><img src="images/WhatsApp Image 2024-01-16 at 7.01.31 PM.jpeg" alt="" title="" border=0 width=201 height=127></div>

<div id="roundrect1" style="position:absolute; overflow:hidden; left:228px; top:2px; width:10px; height:888px; z-index:1"><img border=0 width="100%" height="100%" alt="" src="images/roundrect264984703.gif"></div>

<div id="text7" style="position:absolute; overflow:hidden; left:247px; top:1px; width:1600px; height:35px; z-index:2">
<div class="wpmd">
<div align=center><font class="ws20"><B>U&nbsp; S&nbsp; U&nbsp; A&nbsp; R&nbsp; I&nbsp; O&nbsp; S</B></font></div>
</div></div>

<div id="text8" style="position:absolute; overflow:hidden; left:244px; top:81px; width:1255px; height:35px; z-index:3">
<div class="wpmd">
<div><font class="ws16"><B>Usuarios en el sistema</B></font></div>
</div></div>

<div id="html1" style="position:absolute; overflow:scroll; left:250px; top:127px; width:1600px; height:760px; z-index:4">
<table border=1 align="center">
<tr align="center">
	<td>ID</td>
	<td>nombre</td>
	<td>Direccion</td>
	<td>Usuario</td>
	<td>Password</td>
	<td>Estado</td>
	<td>Tipo Empleado</td>
	<td>Fecha actualizacion</td>
	<td>Creador</td>
	<td>Modificar</td>
	<td>Quitar</td>
</tr>
<?php 
include_once "conexion.php";
$consulta = "SELECT * FROM usuarios where estado = 1";
$resultado = mysqli_query($conexion, $consulta);


/* fetch associative array */
while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr align='center'>";
	    echo "<td>".$row["id"]."</td>";
	    echo "<td>".$row["nombre"]."</td>";
	    echo "<td>".$row["direccion"]."</td>";
	    echo "<td>".$row["usuario"]."</td>";
	    echo "<td>".$row["password"]."</td>";
		echo "<td>Activo</td>";
		if($row["rol"] == 1) 
			echo "<td>Administrador</td>";
		else 
			echo "<td>Empleado</td>";
		echo "<td>".$row["fecha_modificacion"]."</td>";
		echo "<td>".$row["realizo"]."</td>";
		echo "<td> <a title='Modificar usuario' href='modificar_usuario.php?id=".$row["id"]."'><img border=0 width='20%' height='20%' alt='' src='images/modificar.png'></a></td>";
		echo "<td> <a title='Modificar usuario' href='quitar_usuario.php?id=".$row["id"]."'><img border=0 width='20%' height='20%' alt='' src='images/tache.png'></a></td>";
    echo "</tr>";
}

?>
</table>
</div>

<div id="image2" style="position:absolute; overflow:hidden; left:1789px; top:64px; width:53px; height:60px; z-index:5"><a title='Agregar usuario' href='alta_usuario.php'><img src="images/paste2.jpg" alt="" title="" border=0 width=53 height=60></a></div>

<div id="roundrect2" style="position:absolute; overflow:hidden; left:16px; top:252px; width:204px; height:14px; z-index:6"><img border=0 width="100%" height="100%" alt="" src="images/roundrect276358437.gif"></div>

<div id="roundrect3" style="position:absolute; overflow:hidden; left:16px; top:312px; width:204px; height:14px; z-index:7"><img border=0 width="100%" height="100%" alt="" src="images/roundrect276358453.gif"></div>

<div id="text1" style="position:absolute; overflow:hidden; left:24px; top:337px; width:194px; height:35px; z-index:8">
<a href="usuarios.php" title="Administración de usuarios"><div class="wpmd">
<div><font class="ws16"><B>U S U A R I O S</B></font></div>
</div></a></div>

<div id="roundrect4" style="position:absolute; overflow:hidden; left:17px; top:376px; width:204px; height:14px; z-index:9"><img border=0 width="100%" height="100%" alt="" src="images/roundrect276358484.gif"></div>

<div id="text2" style="position:absolute; overflow:hidden; left:24px; top:402px; width:198px; height:35px; z-index:10">
<a href="mantenimientos.php" title="Administración de mantenimientos"><div class="wpmd">
<div><font class="ws16"><B>MANTENIMIENTOS</B></font></div>
</div></a></div>

<div id="roundrect5" style="position:absolute; overflow:hidden; left:16px; top:442px; width:204px; height:14px; z-index:11"><img border=0 width="100%" height="100%" alt="" src="images/roundrect276358515.gif"></div>

<div id="text3" style="position:absolute; overflow:hidden; left:23px; top:468px; width:198px; height:35px; z-index:12">
<a href="servicios.php" title="Administración de servicios"><div class="wpmd">
<div><font class="ws16"><B>S E R V I C I O S</B></font></div>
</div></a></div>

<div id="roundrect6" style="position:absolute; overflow:hidden; left:17px; top:505px; width:204px; height:14px; z-index:13"><img border=0 width="100%" height="100%" alt="" src="images/roundrect276358546.gif"></div>

<div id="text4" style="position:absolute; overflow:hidden; left:24px; top:531px; width:198px; height:35px; z-index:14">
<a href="inventario.php" title="Administración de inventario"><div class="wpmd">
<div><font class="ws16"><B>I N V E N T A R I O</B></font></div>
</div></a></div>

<div id="roundrect7" style="position:absolute; overflow:hidden; left:20px; top:837px; width:204px; height:14px; z-index:15"><img border=0 width="100%" height="100%" alt="" src="images/roundrect276358578.gif"></div>

<div id="image4" style="position:absolute; overflow:hidden; left:33px; top:856px; width:47px; height:47px; z-index:22"><a href="archivo.php" title="Registros guardados"><img src="images/paste5.jpg" alt="" title="" border=0 width=47 height=47></a></div>

<div id="image5" style="position:absolute; overflow:hidden; left:172px; top:855px; width:51px; height:51px; z-index:23"><a href="salir.php" title="Salir del sistema"><img src="images/paste8.jpg" alt="" title="" border=0 width=51 height=51></a></div>

<div id="text6" style="position:absolute; overflow:hidden; left:26px; top:277px; width:189px; height:35px; z-index:17">
<a href="sistema.php" title="Inicio de sistema"><div class="wpmd">
<div><font class="ws16"><B>I N I C I O</B></font></div>
</div></a></div>

<div id="text10" style="position:absolute; overflow:hidden; left:26px; top:139px; width:197px; height:66px; z-index:19">
<div class="wpmd">
<div><font class="ws14">Bienvenido: <?php echo $_SESSION["nombre_usuario"];?> </font></div>
</div></div>

<div id="text11" style="position:absolute; overflow:hidden; left:26px; top:218px; width:203px; height:36px; z-index:20">
<div class="wpmd">
<div><font class="ws14">Usuario: <?php if($_SESSION["rol"] == 1) echo "Administrador"; else echo "Empleado"?></font></div>

</div></div>
</div>

</body>
</html>
