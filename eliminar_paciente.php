<?php

include("conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM pacientes WHERE id_paciente=$id";

if(mysqli_query($conexion,$sql)){

    header("Location: pacientes.php");

}else{

    echo "Error al eliminar: ".mysqli_error($conexion);

}

?>