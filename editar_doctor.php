<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM doctores WHERE id_doctor=$id";
$resultado = mysqli_query($conexion,$sql);

$doctor = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Editar Doctor</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7f6;
    font-family:Arial,sans-serif;
}

/* MENU */

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
    font-size:20px;
    margin-top:10px;
}

.sidebar a{
    display:block;
    padding:15px 25px;
    color:white;
    text-decoration:none;
}

.sidebar a:hover{
    background:#004d32;
}

/* CONTENIDO */

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
    padding:30px;
    border-radius:12px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
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

<div class="sidebar">

<div class="logo">

<img src="img/logo.png">

<h3>
Hospital San Gabriel
</h3>

<p>
Sistema Integral Médico
</p>

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

<h4>Editar Doctor</h4>

<p>
Usuario:
<b><?php echo $_SESSION['usuario']; ?></b>
</p>

</div>

<div class="card mt-4">

<h2 class="titulo">
Actualizar Información del Doctor
</h2>

<form action="actualizar_doctor.php" method="POST">

<input type="hidden"
name="id_doctor"
value="<?php echo $doctor['id_doctor']; ?>">

<div class="mb-3">

<label class="form-label">
Nombre
</label>

<input
type="text"
name="nombre"
class="form-control"
value="<?php echo $doctor['nombre']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Especialidad
</label>

<input
type="text"
name="especialidad"
class="form-control"
value="<?php echo $doctor['especialidad']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Teléfono
</label>

<input
type="text"
name="telefono"
class="form-control"
value="<?php echo $doctor['telefono']; ?>">

</div>

<div class="mb-4">

<label class="form-label">
Correo Electrónico
</label>

<input
type="email"
name="correo"
class="form-control"
value="<?php echo $doctor['correo']; ?>">

</div>

<button type="submit" class="btn btn-hospital">
Guardar Cambios
</button>

<a href="doctores.php" class="btn btn-outline-secondary">
Cancelar
</a>

</form>

</div>

</div>

</body>
</html>