<?php

include("conexion.php");


$id = $_POST['id_doctor'];

$nombre = $_POST['nombre'];
$especialidad = $_POST['especialidad'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];


$sql = "UPDATE doctores SET

nombre='$nombre',
especialidad='$especialidad',
telefono='$telefono',
correo='$correo'

WHERE id_doctor=$id";


if(mysqli_query($conexion,$sql)){

    header("Location: doctores.php");

}else{

    echo "Error: ".mysqli_error($conexion);

}

?>