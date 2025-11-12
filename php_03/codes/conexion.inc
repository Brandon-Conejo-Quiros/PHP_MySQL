<?php
$servidor  = "127.0.0.1";
$basedatos = "NorthWind";
$usuario   = "root";     // o 'jruiz' si prefieres
$contra    = "123";      // o 'parda99*' si usas jruiz

error_reporting(0);

if(!$conex = mysqli_connect($servidor, $usuario, $contra, $basedatos)){
    echo "<h3><font color='red'>Error: No se puede conectar al servidor de MySQL.</font></h3><hr>";
    echo "<strong>Número:</strong> " . mysqli_connect_errno() . "<br>";
    echo "<strong>Descripción:</strong> " . mysqli_connect_error() . "<br>";
    exit;
}
mysqli_set_charset($conex,"utf8");
?>
