<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$id_paciente = $_POST['id_paciente'];
$id_doctor = $_POST['id_doctor'];
$fecha = $_POST['fecha'];
$sintomas = $_POST['sintomas'];
$diagnostico = $_POST['diagnostico'];
$tratamiento = $_POST['tratamiento'];

$sql = "INSERT INTO consultas
(id_paciente,id_doctor,fecha,sintomas,diagnostico,tratamiento)

VALUES
('$id_paciente','$id_doctor','$fecha','$sintomas','$diagnostico','$tratamiento')";

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Consulta Registrada</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7f6;
    font-family:Arial,sans-serif;
}

.card{
    max-width:700px;
    margin:80px auto;
    padding:40px;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,.15);
    text-align:center;
}

.titulo{
    color:#006341;
}

.btn-hospital{
    background:#006341;
    color:white;
}

.btn-hospital:hover{
    background:#004d32;
    color:white;
}

</style>

</head>

<body>

<div class="card">

<?php

if(mysqli_query($conexion,$sql)){

?>

<h2 class="titulo">
✅ Consulta registrada correctamente
</h2>

<p class="mt-3">
La información médica se almacenó correctamente en el sistema.
</p>

<div class="mt-4">

<a href="recetas.php" class="btn btn-success">

💊 Emitir Receta

</a>

<a href="listar_consultas.php" class="btn btn-primary">

📋 Ver Consultas

</a>

<a href="consultas.php" class="btn btn-warning">

➕ Nueva Consulta

</a>

<a href="index.php" class="btn btn-outline-secondary">

🏠 Inicio

</a>

</div>

<?php

}else{

?>

<h2 class="text-danger">
❌ Error al guardar la consulta
</h2>

<p>

<?php echo mysqli_error($conexion); ?>

</p>

<a href="consultas.php" class="btn btn-secondary">

Regresar

</a>

<?php

}

?>

</div>

</body>

</html>