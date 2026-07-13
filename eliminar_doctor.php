<?php

include("conexion.php");


$id = $_GET['id'];


$sql = "DELETE FROM doctores WHERE id_doctor=$id";


if(mysqli_query($conexion,$sql)){

    header("Location: doctores.php");

}else{

    echo "Error: ".mysqli_error($conexion);

}

?>