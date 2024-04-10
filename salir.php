<?php
session_start();
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');
$files = glob('respaldo/*.sql'); //obtenemos todos los nombres de los ficheros
foreach($files as $file){
    if(is_file($file))
    unlink($file); //elimino el fichero
}
$dbhost = 'localhost';
$dbname = 'sistema';
$dbuser = 'root';
$dbpass = '';
$directorio = 'C:\xampp\mysql\bin\mysqldump.exe';
$backup_file ="respaldo/tablas_principales". $dbname . date("Y-m-d-H-i-s"). '.sql';
$command = $directorio . " --user=$dbuser --pass=".$dbpass." $dbname > $backup_file";
system($command,$output);
session_destroy();
header ('location: index.php');
?>