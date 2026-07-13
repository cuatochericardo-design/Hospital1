<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");


$sql = "SELECT 
citas.id_cita,
pacientes.nombre AS paciente,
doctores.nombre AS doctor,
citas.fecha,
citas.hora,
citas.motivo

FROM citas

INNER JOIN pacientes 
ON citas.id_paciente = pacientes.id_paciente

INNER JOIN doctores
ON citas.id_doctor = doctores.id_doctor";


$resultado = mysqli_query($conexion,$sql);

?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Citas - Sistema Médico</title>


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
    padding:25px;
    border-radius:12px;
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


<h3>
Hospital San Gabriel
</h3>


<p>
Sistema Integral Médico
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
Gestión de Citas Médicas
</h4>


<p>
Usuario:
<b><?php echo $_SESSION['usuario']; ?></b>
</p>


</div>





<div class="card mt-4">


<h2 class="titulo">
Lista de Citas
</h2>



<a href="agregar_cita.php" class="btn btn-success mb-3">
Agregar Cita
</a>




<div class="table-responsive">


<table class="table table-bordered table-hover">


<tr>

<th>ID</th>
<th>Paciente</th>
<th>Doctor</th>
<th>Fecha</th>
<th>Hora</th>
<th>Motivo</th>
<th>Acciones</th>

</tr>



<?php while($fila=mysqli_fetch_assoc($resultado)){ ?>


<tr>


<td>
<?php echo $fila['id_cita']; ?>
</td>


<td>
<?php echo $fila['paciente']; ?>
</td>


<td>
<?php echo $fila['doctor']; ?>
</td>


<td>
<?php echo $fila['fecha']; ?>
</td>


<td>
<?php echo $fila['hora']; ?>
</td>


<td>
<?php echo $fila['motivo']; ?>
</td>


<td>


<a class="btn btn-warning btn-sm"
href="editar_cita.php?id=<?php echo $fila['id_cita']; ?>">
Editar
</a>



<a class="btn btn-danger btn-sm"
href="eliminar_cita.php?id=<?php echo $fila['id_cita']; ?>"
onclick="return confirm('¿Eliminar cita?')">
Eliminar
</a>


</td>


</tr>


<?php } ?>


</table>


</div>


</div>


</div>



</body>

</html>