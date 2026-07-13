<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$pacientes = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT COUNT(*) AS total FROM pacientes"));
$doctores = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT COUNT(*) AS total FROM doctores"));
$consultas = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT COUNT(*) AS total FROM consultas"));
$recetas = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT COUNT(*) AS total FROM recetas"));

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Sistema Integral Médico</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7f6;
    font-family:Arial, sans-serif;
}


/* MENU LATERAL */

.sidebar{
    width:250px;
    height:100vh;
    background:#006341;
    position:fixed;
    left:0;
    top:0;
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
    margin-bottom:15px;
}


.logo h3{
    font-size:20px;
    margin:0;
}


.logo p{
    font-size:13px;
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


/* CONTENIDO */

.contenido{

    margin-left:250px;

}


.header{

    background:white;
    padding:20px 35px;
    border-bottom:1px solid #ddd;

}



.card{

    border:none;
    border-radius:12px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);

}


.numero{

    font-size:35px;
    font-weight:bold;
    color:#006341;

}


.titulo{

    color:#555;

}


</style>

</head>


<body>



<div class="sidebar">


<div class="logo">


<img src="img/logo.png" alt="Logo Hospital">


<h3>
IMSS Digital
</h3>


<p>
Sistema Integral Médico Mexicano 
</p>


</div>



<a href="index.php">
Inicio
</a>


<a href="pacientes.php">
Pacientes
</a>


<a href="doctores.php">
Doctores
</a>


<a href="citas.php">
Citas
</a>


<a href="consultas.php">
Consultas
</a>


<a href="recetas.php">
Recetas
</a>


<a href="reportes.php">
Reportes
</a>


<a href="logout.php">
Cerrar sesión
</a>


</div>




<div class="contenido">


<div class="header">

<h4>
Sistema Integral de Gestión Médica
</h4>


<p class="mb-0">
Usuario:
<b>
<?php echo $_SESSION['usuario']; ?>
</b>
</p>


</div>




<div class="container mt-4">


<h2>
Dashboard
</h2>


<p>
Resumen general del sistema hospitalario
</p>




<div class="row mt-4">



<div class="col-md-3">

<div class="card p-4">

<h6 class="titulo">
Pacientes registrados
</h6>

<div class="numero">
<?php echo $pacientes['total']; ?>
</div>

</div>

</div>




<div class="col-md-3">

<div class="card p-4">

<h6 class="titulo">
Doctores registrados
</h6>

<div class="numero">
<?php echo $doctores['total']; ?>
</div>

</div>

</div>




<div class="col-md-3">

<div class="card p-4">

<h6 class="titulo">
Consultas realizadas
</h6>

<div class="numero">
<?php echo $consultas['total']; ?>
</div>

</div>

</div>




<div class="col-md-3">

<div class="card p-4">

<h6 class="titulo">
Recetas emitidas
</h6>

<div class="numero">
<?php echo $recetas['total']; ?>
</div>

</div>

</div>



</div>


</div>


</div>



</body>

</html>