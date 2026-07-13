<?php

include("conexion.php");

$id=$_GET['id'];

$sql="DELETE FROM consultas WHERE id_consulta=$id";


if(mysqli_query($conexion,$sql)){
    header("Location:listar_consultas.php");
}else{
    echo "Error al eliminar";
}

?>