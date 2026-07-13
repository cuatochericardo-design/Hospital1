<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$sql = "SELECT * FROM doctores";
$resultado = mysqli_query($conexion,$sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Doctores - Sistema Médico</title>

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
    border-radius:12px;
    padding:25px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);

}


.titulo{

    color:#006341;

}



/* TABLA */

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
Gestión de Doctores
</h4>


<p>
Usuario:
<b><?php echo $_SESSION['usuario']; ?></b>
</p>


</div>




<div class="card mt-4">


<h2 class="titulo">
Lista de Doctores
</h2>



<a href="agregar_doctor.php" class="btn btn-success mb-3">
Agregar Doctor
</a>





<div class="table-responsive">


<table class="table table-bordered table-hover">


<tr>

<th>ID</th>
<th>Nombre</th>
<th>Especialidad</th>
<th>Teléfono</th>
<th>Correo</th>
<th>Acciones</th>

</tr>



<?php while($fila=mysqli_fetch_assoc($resultado)){ ?>


<tr>


<td>
<?php echo $fila['id_doctor']; ?>
</td>


<td>
<?php echo $fila['nombre']; ?>
</td>


<td>
<?php echo $fila['especialidad']; ?>
</td>


<td>
<?php echo $fila['telefono']; ?>
</td>


<td>
<?php echo $fila['correo']; ?>
</td>


<td>


<a class="btn btn-warning btn-sm"
href="editar_doctor.php?id=<?php echo $fila['id_doctor']; ?>">
Editar
</a>



<a class="btn btn-danger btn-sm"
href="eliminar_doctor.php?id=<?php echo $fila['id_doctor']; ?>"
onclick="return confirm('¿Eliminar doctor?')">
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