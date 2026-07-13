<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Registrar Doctor</title>

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

<h4>
Registro de Doctores
</h4>


<p>
Usuario:
<b>
<?php echo $_SESSION['usuario']; ?>
</b>
</p>


</div>



<div class="card mt-4">


<h2 class="titulo">
Nuevo Doctor
</h2>



<form action="guardar_doctor.php" method="POST">



<div class="mb-3">

<label>
Nombre
</label>

<input
type="text"
name="nombre"
class="form-control"
required>

</div>




<div class="mb-3">

<label>
Apellido paterno
</label>

<input
type="text"
name="apellido_paterno"
class="form-control"
required>

</div>




<div class="mb-3">

<label>
Apellido materno
</label>

<input
type="text"
name="apellido_materno"
class="form-control"
required>

</div>




<div class="mb-3">

<label>
Especialidad
</label>

<input
type="text"
name="especialidad"
class="form-control"
required>

</div>




<div class="mb-3">

<label>
Teléfono
</label>

<input
type="text"
name="telefono"
class="form-control">

</div>




<div class="mb-3">

<label>
Correo electrónico
</label>

<input
type="email"
name="correo"
class="form-control">

</div>




<hr>


<h5 class="titulo">
Cuenta de acceso del médico
</h5>




<div class="mb-3">

<label>
Usuario
</label>

<input
type="text"
name="usuario"
class="form-control"
placeholder="Ejemplo: jperez"
required>

</div>





<div class="mb-4">

<label>
Contraseña
</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>




<button type="submit" class="btn btn-hospital">

Guardar Doctor

</button>


<a href="doctores.php" class="btn btn-outline-secondary">

Cancelar

</a>



</form>


</div>


</div>


</body>

</html>