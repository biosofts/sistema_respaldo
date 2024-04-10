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
<meta http-equiv="content-type" content="text/html; charset=UTF8">
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
<div id="image1" style="position:absolute; overflow:hidden; left:22px; top:10px; width:201px; height:127px; z-index:0"><img src="images/WhatsApp Image 2024-01-16 at 7.01.31 PM.jpeg" alt="" title="" border=0 width=201 height=127></div>

<div id="roundrect1" style="position:absolute; overflow:hidden; left:228px; top:2px; width:10px; height:888px; z-index:1"><img border=0 width="100%" height="100%" alt="" src="images/roundrect379188312.gif"></div>

<div id="text7" style="position:absolute; overflow:hidden; left:247px; top:1px; width:1600px; height:35px; z-index:2">
<div class="wpmd">
<div align=center><font class="ws20"><B>M A N T E N I M I E N T O S</B></font></div>
</div></div>

<div id="text8" style="position:absolute; overflow:hidden; left:248px; top:83px; width:412px; height:35px; z-index:3">
<div class="wpmd">
<div><font class="ws16"><B>Modificar mantenimiento</B></font></div>
</div></div>

<?php
include_once "conexion.php";
$ids = $_GET['id'];
$consulta="select * from servicios where id=".$ids; 
		
		$fila = mysqli_fetch_assoc(mysqli_query($conexion,$consulta));
?>

<form name="form1" method="POST" action="modificar_mantenimiento_formulario.php" style="margin:0px">
<input name="formtext0" type="text" value="<?php echo $ids;?>" style="position:absolute;width:128px;left:378px;top:151px;z-index:2">>
<input name="formtext1" type="text" value="<?php echo $fila['obra'];?>" style="position:absolute;width:428px;left:378px;top:151px;z-index:5">
<input name="formtext2" type="text" value="<?php echo $fila['ticket'];?>" style="position:absolute;width:213px;left:971px;top:151px;z-index:7">
<input name="formtext3" type="text" value="<?php echo $fila['cliente'];?>" style="position:absolute;width:258px;left:1358px;top:147px;z-index:10">
<input name="formbutton1" type="submit" value="Modificar mantenimiento" style="position:absolute;left:1292px;top:500px;z-index:11">
<input name="formtext4" type="text" value="<?php echo $fila['presupuesto'];?>" style="position:absolute;width:206px;left:377px;top:248px;z-index:26">
<input name="formtext5" type="date" value="<?php echo $fila['fecha_respaldo'];?>" style="position:absolute;width:258px;left:750px;top:247px;z-index:28">
<select name="formselect1" style="position:absolute;left:378px;top:200px;width:826px;z-index:29">
<?php
include_once "conexion.php";
//sacar contenido del recibido
$contenido = "SELECT * FROM sucursales where id =".$fila['sucursal_id'];
$resultado_contenido = mysqli_query($conexion, $contenido);
$row1 = mysqli_fetch_assoc($resultado_contenido);
	echo "<option value='".$row1["id"]."'>".$row1["cio"]."-".$row1["inmueble"]."</option>";
//consutar todos
$consulta = "SELECT * FROM sucursales where estado = 1";
$resultado = mysqli_query($conexion, $consulta);
while ($row2 = mysqli_fetch_assoc($resultado)) {
	echo "<option value='".$row2["id"]."'>".$row2["cio"]."-".$row2["inmueble"]."</option>";
}
?>
</select>
<input name="formtext6" type="text" value="<?php echo $fila['oc_fecha'];?>" style="position:absolute;width:258px;left:377px;top:300px;z-index:33">
<select name="formselect3" style="position:absolute;left:1149px;top:244px;width:211px;z-index:35" required>
<?php
if ($fila["autorizacion"] == "autorizado")
	echo "<option value='1'>Autorizado</option>";
else
	echo "<option value='2'>rechazado</option>";
?>
<option value="1">Autorizado</option>
<option value="2">Rechazado</option>
</select>
<input name="formtext7" type="text" value="<?php echo $fila['factura'];?>" style="position:absolute;width:153px;left:744px;top:296px;z-index:37">
<input name="formtext8" type="date" value="<?php echo $fila['fecha_factura'];?>" style="position:absolute;width:153px;left:1040px;top:295px;z-index:39">
<input name="formtext9" type="text" value="<?php echo $fila['subtotal'];?>" style="position:absolute;width:123px;left:375px;top:353px;z-index:41">
<input name="formtext10" type="text" value="<?php echo $fila['iva'];?>" style="position:absolute;width:153px;left:626px;top:348px;z-index:43">
<input name="formtext11" type="text" value="<?php echo $fila['total'];?>" style="position:absolute;width:153px;left:870px;top:347px;z-index:45">
<select name="formselect4" style="position:absolute;left:1157px;top:343px;width:211px;z-index:48">
<?php
if ($fila["prioridad"] == "alto")
	echo "<option value='1'>Alta</option>";
else if ($fila["prioridad"] == "medio")
	echo "<option value='2'>Media</option>";
else
	echo "<option value='3'>Baja</option>";
?>

<option value="1">Alta</option>
<option value="2">Media</option>
<option value="3">Baja</option>
</select>
<textarea name="textarea1" style="position:absolute;left:373px;top:410px;width:808px;height:198px;z-index:50">
<?php echo $fila['comentario'];?>
</textarea>
</form>

<div id="text9" style="position:absolute; overflow:hidden; left:253px; top:153px; width:132px; height:26px; z-index:6">
<div class="wpmd">
<div><font class="ws12">Numero de obra:</font></div>
</div></div>

<div id="text10" style="position:absolute; overflow:hidden; left:873px; top:153px; width:216px; height:26px; z-index:8">
<div class="wpmd">
<div><font class="ws12">Folio / ticket:</font></div>
</div></div>

<div id="text11" style="position:absolute; overflow:hidden; left:1294px; top:148px; width:83px; height:26px; z-index:9">
<div class="wpmd">
<div><font class="ws12">Cliente:</font></div>
</div></div>

<div id="roundrect2" style="position:absolute; overflow:hidden; left:16px; top:252px; width:204px; height:14px; z-index:12"><img border=0 width="100%" height="100%" alt="" src="images/roundrect379188140.gif"></div>

<div id="roundrect3" style="position:absolute; overflow:hidden; left:16px; top:312px; width:204px; height:14px; z-index:13"><img border=0 width="100%" height="100%" alt="" src="images/roundrect379188125.gif"></div>

<div id="text1" style="position:absolute; overflow:hidden; left:24px; top:337px; width:194px; height:35px; z-index:14">
<a href="usuarios.php" title="Administraci�n de usuarios"><div class="wpmd">
<div><font class="ws16"><B>U S U A R I O S</B></font></div>
</div></a></div>

<div id="roundrect4" style="position:absolute; overflow:hidden; left:17px; top:376px; width:204px; height:14px; z-index:15"><img border=0 width="100%" height="100%" alt="" src="images/roundrect379188093.gif"></div>

<div id="text2" style="position:absolute; overflow:hidden; left:24px; top:402px; width:198px; height:35px; z-index:16">
<a href="mantenimientos.php" title="Administraci�n de mantenimientos"><div class="wpmd">
<div><font class="ws16"><B>MANTENIMIENTOS</B></font></div>
</div></a></div>

<div id="roundrect5" style="position:absolute; overflow:hidden; left:16px; top:442px; width:204px; height:14px; z-index:17"><img border=0 width="100%" height="100%" alt="" src="images/roundrect379188062.gif"></div>

<div id="text3" style="position:absolute; overflow:hidden; left:23px; top:468px; width:198px; height:35px; z-index:18">
<a href="servicios.php" title="Administraci�n de servicios"><div class="wpmd">
<div><font class="ws16"><B>S E R V I C I O S</B></font></div>
</div></a></div>

<div id="roundrect6" style="position:absolute; overflow:hidden; left:17px; top:505px; width:204px; height:14px; z-index:19"><img border=0 width="100%" height="100%" alt="" src="images/roundrect379188031.gif"></div>

<div id="text4" style="position:absolute; overflow:hidden; left:24px; top:531px; width:198px; height:35px; z-index:20">
<a href="inventario.php" title="Administraci�n de inventario"><div class="wpmd">
<div><font class="ws16"><B>I N V E N T A R I O</B></font></div>
</div></a></div>

<div id="roundrect7" style="position:absolute; overflow:hidden; left:20px; top:837px; width:204px; height:14px; z-index:21"><img border=0 width="100%" height="100%" alt="" src="images/roundrect379188000.gif"></div>

<div id="text6" style="position:absolute; overflow:hidden; left:26px; top:277px; width:189px; height:35px; z-index:22">
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

<div id="text12" style="position:absolute; overflow:hidden; left:254px; top:205px; width:120px; height:26px; z-index:25">
<div class="wpmd">
<div><font class="ws12">Sucursal / CIO:</font></div>
</div></div>

<div id="text16" style="position:absolute; overflow:hidden; left:255px; top:253px; width:120px; height:26px; z-index:31">
<div class="wpmd">
<div><font class="ws12">Presupuesto:</font></div>
</div></div>

<div id="text17" style="position:absolute; overflow:hidden; left:623px; top:248px; width:128px; height:26px; z-index:32">
<div class="wpmd">
<div><font class="ws12">Fecha respaldo:</font></div>
</div></div>

<div id="text18" style="position:absolute; overflow:hidden; left:1048px; top:247px; width:128px; height:26px; z-index:34">
<div class="wpmd">
<div><font class="ws12">Autorizacion:</font></div>
</div></div>

<div id="text19" style="position:absolute; overflow:hidden; left:270px; top:300px; width:101px; height:26px; z-index:36">
<div class="wpmd">
<div><font class="ws12">OC / fecha:</font></div>
</div></div>

<div id="text20" style="position:absolute; overflow:hidden; left:668px; top:299px; width:74px; height:26px; z-index:38">
<div class="wpmd">
<div><font class="ws12">Factura:</font></div>
</div></div>

<div id="text21" style="position:absolute; overflow:hidden; left:929px; top:296px; width:120px; height:26px; z-index:40">
<div class="wpmd">
<div><font class="ws12">Fecha factura:</font></div>
</div></div>

<div id="text22" style="position:absolute; overflow:hidden; left:283px; top:353px; width:86px; height:26px; z-index:42">
<div class="wpmd">
<div><font class="ws12">Sub-total:</font></div>
</div></div>

<div id="text23" style="position:absolute; overflow:hidden; left:550px; top:351px; width:74px; height:26px; z-index:44">
<div class="wpmd">
<div><font class="ws12">I.V.A.:</font></div>
</div></div>

<div id="text24" style="position:absolute; overflow:hidden; left:810px; top:347px; width:69px; height:26px; z-index:46">
<div class="wpmd">
<div><font class="ws12">Total:</font></div>
</div></div>

<div id="text25" style="position:absolute; overflow:hidden; left:1056px; top:346px; width:128px; height:26px; z-index:47">
<div class="wpmd">
<div><font class="ws12">Prioridad:</font></div>
</div></div>

<div id="text26" style="position:absolute; overflow:hidden; left:253px; top:410px; width:114px; height:26px; z-index:49">
<div class="wpmd">
<div><font class="ws12">Observaciones:</font></div>
</div></div>

<div id="g_image1" style="position:absolute; overflow:hidden; left:33px; top:856px; width:47px; height:47px; z-index:53"><a href="archivo.php" title="Registros guardados"><img src="images/paste5.jpg" alt="" title="" border=0 width=47 height=47></a></div>

<div id="g_image2" style="position:absolute; overflow:hidden; left:172px; top:855px; width:51px; height:51px; z-index:54"><a href="salir.php" title="Salir del sistema"><img src="images/paste8.jpg" alt="" title="" border=0 width=51 height=51></a></div>

</div>

</body>
</html>
