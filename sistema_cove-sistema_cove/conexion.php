<?php
$conexion = mysqli_connect('localhost', 'root', '', 'sistema');
if (mysqli_connect_errno())
  {
  echo "Conexion fallida a MySQL: " . mysqli_connect_error();
  }
?>