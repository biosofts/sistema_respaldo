<?php
session_start();
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Sistema COVE</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
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
	width: 1502px;
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

<div id="roundrect1" style="position:absolute; overflow:hidden; left:0px; top:141px; width:1502px; height:17px; z-index:1"><img border=0 width="100%" height="100%" alt="" src="images/roundrect259560031.gif"></div>

<div id="image2" style="position:absolute; overflow:hidden; left:404px; top:272px; width:208px; height:208px; z-index:2"><img src="images/paste1.jpg" alt="" title="" border=0 width=208 height=208></div>

<form name="form1" method="POST" action="index.php" style="margin:0px">
<input name="formtext1" type="text" style="position:absolute;width:309px;left:772px;top:317px;z-index:4">
<input name="formtext2" type="password" style="position:absolute;width:309px;left:773px;top:373px;z-index:5">
<input name="formbutton1" type="submit" value="Enviar" style="position:absolute;left:787px;top:437px;z-index:6">
</form>



<div id="text2" style="position:absolute; overflow:hidden; left:639px; top:318px; width:134px; height:34px; z-index:8">
<div class="wpmd">
<div><font color="#000000" class="ws12">Usuario:</font></div>
</div></div>

<div id="text3" style="position:absolute; overflow:hidden; left:639px; top:373px; width:134px; height:34px; z-index:9">
<div class="wpmd">
<div><font color="#000000" class="ws12">Password:</font></div>
</div></div>

<?php
include_once "conexion.php";
if(isset($_POST['formbutton1'])) {
		$usuario = $_POST['formtext1'];
		$password = $_POST['formtext2'];

		$consulta="select * from usuarios where usuario='$usuario' and password='$password'"; 
		//$resultado=mysql_query($consulta) or die (mysql_error()); 

		if (mysqli_num_rows(mysqli_query($conexion,$consulta))== 0) { 
			echo"<div id='text1' style='position:absolute; overflow:hidden; left:531px; top:506px; width:476px; height:34px; z-index:7'>";
			echo"<div class='wpmd'>";
			echo"<div><font color='#FF0000' class='ws12'>Credenciales no validas, contacte al administrador del sistema</font></div>";
			echo"</div></div>";
		}
		else{
			$fila = mysqli_fetch_assoc(mysqli_query($conexion,$consulta)) ;
			    $_SESSION["nombre_usuario"]=$fila["nombre"];
			    $_SESSION["rol"]=$fila["rol"];
			    $_SESSION["id_usuario"]=$fila["id"];
			    
			    	if( $_SESSION["rol"] == 1)
						header ('location: sistema.php');
					else 
						header ('location: sistema_empleados.php');	
		}
		mysqli_close($conexion);
}
?>

</div>


</body>
</html>
