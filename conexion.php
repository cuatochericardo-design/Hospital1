<?php
$conexion = new mysqli("localhost", "root", "", "hospital_db1");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>