<?php

include("conexion.php");


$id = $_GET['id'];


$sql = "DELETE FROM citas WHERE id_cita=$id";


if(mysqli_query($conexion,$sql)){

    header("Location: citas.php");

}else{

    echo "Error: ".mysqli_error($conexion);

}

?>