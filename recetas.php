<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");


$consultas = mysqli_query($conexion,
"SELECT 
consultas.id_consulta,
consultas.fecha,
pacientes.nombre,
pacientes.apellido_paterno,
pacientes.apellido_materno

FROM consultas

INNER JOIN pacientes 
ON consultas.id_paciente = pacientes.id_paciente");

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Recetas Médicas</title>


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

<h4>
Emisión de Receta Médica
</h4>


<p>
Usuario:
<b><?php echo $_SESSION['usuario']; ?></b>
</p>


</div>






<div class="card mt-4">


<h2 class="titulo">
Nueva Receta
</h2>



<form action="guardar_receta.php" method="POST">



<div class="mb-3">


<label class="form-label">
Consulta
</label>


<select name="id_consulta" class="form-select">


<?php while($c=mysqli_fetch_assoc($consultas)){ ?>


<option value="<?php echo $c['id_consulta']; ?>">


<?php

echo "Consulta ".$c['id_consulta']." - ".
$c['nombre']." ".
$c['apellido_paterno']." ".
$c['apellido_materno'];

?>


</option>


<?php } ?>


</select>


</div>





<div class="mb-3">


<label>
Medicamento
</label>


<input type="text" 
name="medicamento" 
class="form-control"
required>


</div>





<div class="mb-3">


<label>
Dosis
</label>


<input type="text" 
name="dosis"
class="form-control"
placeholder="Ejemplo: 500 mg"
required>


</div>





<div class="mb-3">


<label>
Frecuencia
</label>


<input type="text"
name="frecuencia"
class="form-control"
placeholder="Ejemplo: Cada 8 horas"
required>


</div>





<div class="mb-3">


<label>
Duración
</label>


<input type="text"
name="duracion"
class="form-control"
placeholder="Ejemplo: 5 días"
required>


</div>





<div class="mb-3">


<label>
Indicaciones
</label>


<textarea name="indicaciones"
class="form-control"
rows="4"></textarea>


</div>





<button class="btn btn-hospital">

Guardar Receta

</button>



<a href="listar_recetas.php" class="btn btn-outline-success">

Ver Recetas

</a>



</form>



</div>



</div>


</body>

</html>