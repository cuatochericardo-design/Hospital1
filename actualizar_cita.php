<?php

include("conexion.php");


$id = $_POST['id_cita'];

$id_paciente = $_POST['id_paciente'];
$id_doctor = $_POST['id_doctor'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$motivo = $_POST['motivo'];


$sql = "UPDATE citas SET

id_paciente='$id_paciente',
id_doctor='$id_doctor',
fecha='$fecha',
hora='$hora',
motivo='$motivo'

WHERE id_cita=$id";


if(mysqli_query($conexion,$sql)){

    header("Location: citas.php");

}else{

    echo "Error: ".mysqli_error($conexion);

}

?>