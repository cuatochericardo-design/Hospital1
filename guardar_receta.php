<?php

include("conexion.php");


$id_consulta = $_POST['id_consulta'];
$medicamento = $_POST['medicamento'];
$dosis = $_POST['dosis'];
$frecuencia = $_POST['frecuencia'];
$duracion = $_POST['duracion'];
$indicaciones = $_POST['indicaciones'];


$sql = "INSERT INTO recetas
(id_consulta, medicamento, dosis, frecuencia, duracion, indicaciones)

VALUES

('$id_consulta',
'$medicamento',
'$dosis',
'$frecuencia',
'$duracion',
'$indicaciones')";


if(mysqli_query($conexion,$sql)){

    echo "Receta guardada correctamente";

}else{

    echo "Error: ".mysqli_error($conexion);

}

?>