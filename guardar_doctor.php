<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");


// Datos del doctor

$nombre = $_POST['nombre'];
$especialidad = $_POST['especialidad'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];


// Datos de acceso

$usuario = $_POST['usuario'];
$password = $_POST['password'];



// Guardar doctor

$sql = "INSERT INTO doctores
(nombre, especialidad, telefono, correo)

VALUES

('$nombre','$especialidad','$telefono','$correo')";



if(mysqli_query($conexion,$sql)){



    // Guardar usuario del médico

    $sql_usuario = "INSERT INTO usuarios
    (usuario,password,rol)

    VALUES

    ('$usuario','$password','Medico')";



    if(mysqli_query($conexion,$sql_usuario)){


?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Doctor Registrado</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

body{

background:#f5f7f6;
font-family:Arial;

}


.card{

width:500px;
margin:100px auto;
padding:40px;
text-align:center;
background:white;
border-radius:15px;
box-shadow:0 5px 20px rgba(0,0,0,.15);

}


.titulo{

color:#006341;

}


.btn-hospital{

background:#006341;
color:white;

}


</style>

</head>


<body>


<div class="card">


<h2 class="titulo">

✅ Doctor registrado correctamente

</h2>


<p>

El doctor y su cuenta de acceso fueron creados.

</p>


<a href="doctores.php" class="btn btn-hospital">

Ver Doctores

</a>


<a href="agregar_doctor.php" class="btn btn-secondary">

Nuevo Doctor

</a>


</div>


</body>

</html>


<?php


    }else{

        echo "Error al crear usuario: ".mysqli_error($conexion);

    }



}else{


echo "Error al guardar doctor: ".mysqli_error($conexion);


}


?>