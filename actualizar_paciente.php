<?php

include("conexion.php");


$id = $_POST['id_paciente'];
$matricula = $_POST['matricula'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$diagnostico = $_POST['diagnostico'];


$sql = "UPDATE pacientes SET

matricula='$matricula',
apellido_paterno='$apellido_paterno',
apellido_materno='$apellido_materno',
nombre='$nombre',
edad='$edad',
sexo='$sexo',
telefono='$telefono',
direccion='$direccion',
diagnostico='$diagnostico'

WHERE id_paciente=$id";


if(mysqli_query($conexion,$sql)){

    header("Location: pacientes.php");

}else{

    echo "Error: ".mysqli_error($conexion);

}

?>