<?php

include("conexion.php");

$matricula = $_POST['matricula'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$diagnostico = $_POST['diagnostico'];

$sql = "INSERT INTO pacientes 
(matricula, apellido_paterno, apellido_materno, nombre, edad, sexo, telefono, direccion, diagnostico)
VALUES
('$matricula','$apellido_paterno','$apellido_materno','$nombre','$edad','$sexo','$telefono','$direccion','$diagnostico')";

if(mysqli_query($conexion, $sql)){

    echo "Paciente guardado correctamente";
    echo "<br>";
    echo "<a href='pacientes.php'>Ver pacientes</a>";

}else{

    echo "Error: " . mysqli_error($conexion);

}

?>