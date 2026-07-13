<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$sql = "SELECT
consultas.id_consulta,
consultas.fecha,
consultas.sintomas,
consultas.diagnostico,
consultas.tratamiento,

pacientes.nombre,
pacientes.apellido_paterno,
pacientes.apellido_materno,

doctores.nombre AS doctor

FROM consultas

INNER JOIN pacientes
ON consultas.id_paciente = pacientes.id_paciente

INNER JOIN doctores
ON consultas.id_doctor = doctores.id_doctor";

$resultado = mysqli_query($conexion,$sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Consultas Médicas</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7f6;
    font-family:Arial,sans-serif;
}

.sidebar{
    width:250px;
    height:100vh;
    position:fixed;
    background:#006341;
    color:white;
}

.logo{
    text-align:center;
    padding:25px;
    border-bottom:1px solid rgba(255,255,255,.2);
}

.logo img{
    width:90px;
    height:90px;
    object-fit:cover;
}

.logo h3{
    margin-top:10px;
    font-size:20px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 25px;
}

.sidebar a:hover{
    background:#004d32;
}

.contenido{
    margin-left:250px;
    padding:30px;
}

.header{
    background:white;
    padding:20px;
    border-bottom:1px solid #ddd;
}

.card{
    background:white;
    border-radius:12px;
    padding:30px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.titulo{
    color:#006341;
}

th{
    background:#006341 !important;
    color:white !important;
}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">

<img src="img/logo.png">

<h3>Hospital San Gabriel</h3>

<p>Sistema Integral Médico</p>

</div>

<a href="index.php">Inicio</a>
<a href="pacientes.php">Pacientes</a>
<a href="doctores.php">Doctores</a>
<a href="citas.php">Citas</a>
<a href="consultas.php">Consultas</a>
<a href="recetas.php">Recetas</a>
<a href="reportes.php">Reportes</a>
<a href="logout.php">Cerrar sesión</a>

</div>

<div class="contenido">

<div class="header">

<h4>Historial de Consultas</h4>

<p>
Usuario:
<b><?php echo $_SESSION['usuario']; ?></b>
</p>

</div>

<div class="card mt-4">

<h2 class="titulo">

Consultas Médicas Registradas

</h2>

<div class="mb-3">

<a href="consultas.php" class="btn btn-success">

Nueva Consulta

</a>

<a href="index.php" class="btn btn-outline-secondary">

Regresar al Inicio

</a>

</div>

<div class="table-responsive">

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>Paciente</th>
<th>Doctor</th>
<th>Fecha</th>
<th>Síntomas</th>
<th>Diagnóstico</th>
<th>Tratamiento</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php while($fila=mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td>

<?php
echo $fila['nombre']." ".
$fila['apellido_paterno']." ".
$fila['apellido_materno'];
?>

</td>

<td>

<?php echo $fila['doctor']; ?>

</td>

<td>

<?php echo $fila['fecha']; ?>

</td>

<td>

<?php echo $fila['sintomas']; ?>

</td>

<td>

<?php echo $fila['diagnostico']; ?>

</td>

<td>

<?php echo $fila['tratamiento']; ?>

</td>

<td>

<a
class="btn btn-danger btn-sm"
href="eliminar_consulta.php?id=<?php echo $fila['id_consulta']; ?>"
onclick="return confirm('¿Eliminar esta consulta?')">

Eliminar

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>

</html>