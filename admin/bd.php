<?php
$servidor="localhost";
$baseDatos="revolucionarios";
$usuario="root";
$contrasenia="";

try{
    $conexion= new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establecer el modo de error a excepción para manejar los errores fácilmente
}catch(Exception $error){
    echo $error->getMessage();
}

?>