<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM citas WHERE id_cita=$id";
$resultado = mysqli_query($conexion,$sql);
$cita = mysqli_fetch_assoc($resultado);

// Pacientes
$pacientes = mysqli_query($conexion,
"SELECT id_paciente,nombre,apellido_paterno,apellido_materno FROM pacientes");

// Doctores
$doctores = mysqli_query($conexion,
"SELECT id_doctor,nombre FROM doctores");

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Editar Cita</title>

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

<h4>Editar Cita Médica</h4>

<p>
Usuario:
<b><?php echo $_SESSION['usuario']; ?></b>
</p>

</div>

<div class="card mt-4">

<h2 class="titulo">

Actualizar Información de la Cita

</h2>

<form action="actualizar_cita.php" method="POST">

<input
type="hidden"
name="id_cita"
value="<?php echo $cita['id_cita']; ?>">

<div class="mb-3">

<label class="form-label">

Paciente

</label>

<select name="id_paciente" class="form-select">

<?php while($p=mysqli_fetch_assoc($pacientes)){ ?>

<option
value="<?php echo $p['id_paciente']; ?>"
<?php if($p['id_paciente']==$cita['id_paciente']) echo "selected"; ?>>

<?php
echo $p['nombre']." ".$p['apellido_paterno']." ".$p['apellido_materno'];
?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label class="form-label">

Doctor

</label>

<select name="id_doctor" class="form-select">

<?php while($d=mysqli_fetch_assoc($doctores)){ ?>

<option
value="<?php echo $d['id_doctor']; ?>"
<?php if($d['id_doctor']==$cita['id_doctor']) echo "selected"; ?>>

<?php echo $d['nombre']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label class="form-label">

Fecha

</label>

<input
type="date"
name="fecha"
class="form-control"
value="<?php echo $cita['fecha']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">

Hora

</label>

<input
type="time"
name="hora"
class="form-control"
value="<?php echo $cita['hora']; ?>"
required>

</div>

<div class="mb-4">

<label class="form-label">

Motivo

</label>

<input
type="text"
name="motivo"
class="form-control"
value="<?php echo $cita['motivo']; ?>">

</div>

<button type="submit" class="btn btn-hospital">

Guardar Cambios

</button>

<a href="citas.php" class="btn btn-outline-secondary">

Cancelar

</a>

</form>

</div>

</div>

</body>
</html>