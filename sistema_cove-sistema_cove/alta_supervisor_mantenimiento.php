<?php
session_start();
if ($_SESSION['nombre_usuario'] == "" || $_SESSION['rol'] == 2)
  header ('location: salir.php');

error_reporting(1);
header('Content-Type: text/html; charset=UTF-8');
$ids = $_GET['id'];
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

<script language="JavaScript1.4" type="text/javascript">
<!--
function jsPlay(soundobj) {
 var thissound= eval("document."+soundobj);
 try {
     thissound.Play();
 }
 catch (e) {
     thissound.DoPlay();
 }
}
//-->
</script>

<script language="javascript" type="text/javascript">
<!--
function MM_swapImgRestore() {
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() {
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) {
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() {
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

//-->
</script>

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

<div id="roundrect1" style="position:absolute; overflow:hidden; left:228px; top:2px; width:10px; height:888px; z-index:1"><img border=0 width="100%" height="100%" alt="" src="images/roundrect616195484.gif"></div>

<div id="text7" style="position:absolute; overflow:hidden; left:247px; top:1px; width:1600px; height:35px; z-index:2">
<div class="wpmd">
<div align=center><font class="ws20"><B>M A N T E N I M I E N T O S</B></font></div>
</div></div>

<div id="text8" style="position:absolute; overflow:hidden; left:248px; top:83px; width:1600px; height:95px; z-index:3">
<div class="wpmd">
<div><font class="ws16"><B>Agregar supervisores a mantenimiento: 
<?php
/*include_once "conexion.php";
$consultax = "SELECT * FROM servicios where activo='1' and id=".$ids;
$resultadox = mysqli_query($conexion, $consultax);
$rowx = mysqli_fetch_assoc($resultadox);
  $consultanx = "SELECT * FROM sucursales where id=".$rowx["sucursal_id"];
  $resultadonx = mysqli_fetch_assoc(mysqli_query($conexion, $consultanx));
    echo  $resultadonx["cio"]." - ".$resultadonx["inmueble"]." - ".$resultadonx["ciudad"];
*/?>
</B></font></div>
</div></div>

<form name="form1" method="POST" action="alta_supervisor_mantenimiento.php" style="margin:0px">
<input name="formtext1" type="text"  value='<?php echo $ids; ?>' style="position:absolute;left:999px;width:20px;top:152px;z-index:21">
<input name="formbutton1" type="submit" value="Agregar supervisor" style="position:absolute;left:999px;top:152px;z-index:21">
<select name="formselect1" style="position:absolute;left:475px;top:154px;width:486px;z-index:22">
<?php
include_once "conexion.php";
$consulta = "SELECT * FROM usuarios where estado = 1";
$resultado = mysqli_query($conexion, $consulta);
while ($row = mysqli_fetch_assoc($resultado)) {
  echo "<option value='".$row["id"]."'>".$row["nombre"]."</option>";
}
?>
</select>
</form>

<?php
include_once "conexion.php";
if(isset($_POST['formbutton1'])) {
    $id_registro = $_POST['formtext1'];
    $id_usuario = $_POST['formselect1'];
    
    $consulta_insertar="insert into supervisores_mantenimientos (id,nombre_id, mantenimiento_id, estado) values ('','".$id_usuario."','".$id_registro."','1')"; 
    
    if (mysqli_query($conexion,$consulta_insertar)) { 
      echo "<script>location.href='alta_supervisor_mantenimiento.php?id=".$id_registro."';</script>";
      //echo "<script>location.href='mantenimientos.php';</script>";
    }
    mysqli_close($conexion);
}
?>

<div id="roundrect2" style="position:absolute; overflow:hidden; left:16px; top:252px; width:204px; height:14px; z-index:5"><img border=0 width="100%" height="100%" alt="" src="images/roundrect616195312.gif"></div>

<div id="roundrect3" style="position:absolute; overflow:hidden; left:16px; top:312px; width:204px; height:14px; z-index:6"><img border=0 width="100%" height="100%" alt="" src="images/roundrect616195296.gif"></div>

<div id="text1" style="position:absolute; overflow:hidden; left:24px; top:337px; width:194px; height:35px; z-index:7">
<a href="usuarios.php" title="Administración de usuarios"><div class="wpmd">
<div><font class="ws16"><B>U S U A R I O S</B></font></div>
</div></a></div>

<div id="roundrect4" style="position:absolute; overflow:hidden; left:17px; top:376px; width:204px; height:14px; z-index:8"><img border=0 width="100%" height="100%" alt="" src="images/roundrect616195265.gif"></div>

<div id="text2" style="position:absolute; overflow:hidden; left:24px; top:402px; width:198px; height:35px; z-index:9">
<a href="mantenimientos.php" title="Administración de mantenimientos"><div class="wpmd">
<div><font class="ws16"><B>MANTENIMIENTOS</B></font></div>
</div></a></div>

<div id="roundrect5" style="position:absolute; overflow:hidden; left:16px; top:442px; width:204px; height:14px; z-index:10"><img border=0 width="100%" height="100%" alt="" src="images/roundrect616195234.gif"></div>

<div id="text3" style="position:absolute; overflow:hidden; left:23px; top:468px; width:198px; height:35px; z-index:11">
<a href="servicios.php" title="Administración de servicios"><div class="wpmd">
<div><font class="ws16"><B>S E R V I C I O S</B></font></div>
</div></a></div>

<div id="roundrect6" style="position:absolute; overflow:hidden; left:17px; top:505px; width:204px; height:14px; z-index:12"><img border=0 width="100%" height="100%" alt="" src="images/roundrect616195203.gif"></div>

<div id="text4" style="position:absolute; overflow:hidden; left:24px; top:531px; width:198px; height:35px; z-index:13">
<a href="inventario.php" title="Administración de inventario"><div class="wpmd">
<div><font class="ws16"><B>I N V E N T A R I O</B></font></div>
</div></a></div>

<div id="roundrect7" style="position:absolute; overflow:hidden; left:20px; top:837px; width:204px; height:14px; z-index:14"><img border=0 width="100%" height="100%" alt="" src="images/roundrect616195171.gif"></div>

<div id="text6" style="position:absolute; overflow:hidden; left:26px; top:277px; width:189px; height:35px; z-index:15">
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


<div id="g_image1" style="position:absolute; overflow:hidden; left:33px; top:856px; width:47px; height:47px; z-index:18"><a href="archivo.php" title="Registros guardados"><img src="images/paste5.jpg" alt="" title="" border=0 width=47 height=47></a></div>

<div id="g_image2" style="position:absolute; overflow:hidden; left:172px; top:855px; width:51px; height:51px; z-index:19"><a href="salir.php" title="Salir del sistema"><img src="images/paste8.jpg" alt="" title="" border=0 width=51 height=51></a></div>

<div id="text5" style="position:absolute; overflow:hidden; left:250px; top:156px; width:203px; height:36px; z-index:20">
<div class="wpmd">
<div><font class="ws14">Usuarios en el sistema: </font></div>
</div></div>

<div id="text9" style="position:absolute; overflow:hidden; left:249px; top:235px; width:203px; height:36px; z-index:23">
<div class="wpmd">
<div><font class="ws14">Supervisores actuales:</font></div>
</div></div>

<div id="html1" style="position:absolute; overflow:scroll; left:453px; top:236px; width:514px; height:148px; z-index:24">
<?php 
include_once "conexion.php";
$ids = $_GET['id'];
$consulta = "SELECT * FROM supervisores_mantenimientos where mantenimiento_id =".$ids." and estado = '1' ";
$resultado = mysqli_query($conexion, $consulta);

if(mysqli_num_rows($resultado) == 0){
  echo "Este mantenimiento aun no cuenta con supervisores";
}
else{
echo "<table border=1 align='center'><tr align='center'><td>Nombre</td><td>Quitar</td></tr>";
  
    while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr align='center'>";      //cosulta supervisor principal
    $consulta_sup = "SELECT * FROM usuarios where id =".$row["nombre_id"];
    $resultado_sup = mysqli_query($conexion, $consulta_sup);
    $row_sup = mysqli_fetch_assoc($resultado_sup);
    echo "<td>".$row_sup["nombre"]."</td>";
    echo "<td align='center'> <a title='Quitar supervisor' href='quitar_supervisor_mantenimiento.php?id_usuario=".$row_sup["id"]."&id_registro=".$ids."'><img border=0 width='15%' height='15%' alt='' src='images/tache.png'></a></td>";
    echo "</tr>";
    }
}
?>
</table>

</div>

<div id="nav10d" style="position:absolute; left:610px; top:439px; z-index:25"><a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('nav10','','images/nav6169762500a.gif',1)" href="mantenimientos.php"><img name="nav10" onLoad="MM_preloadImages('images/nav6169762500a.gif')" alt="" border=0 src="images/nav6169762500i.gif"></a></div>

</div>

</body>
</html>
