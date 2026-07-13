<?php

include("conexion.php");


$id_paciente = $_POST['id_paciente'];
$id_doctor = $_POST['id_doctor'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$motivo = $_POST['motivo'];


$sql = "INSERT INTO citas
(id_paciente, id_doctor, fecha, hora, motivo)

VALUES

('$id_paciente','$id_doctor','$fecha','$hora','$motivo')";


if(mysqli_query($conexion,$sql)){

    echo "Cita guardada correctamente";
    echo "<br>";
    echo "<a href='citas.php'>Ver citas</a>";

}else{

    echo "Error: ".mysqli_error($conexion);

}


?>