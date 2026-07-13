<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$pacientes = mysqli_query($conexion, "SELECT * FROM pacientes");
$doctores = mysqli_query($conexion, "SELECT * FROM doctores");

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



label{

    font-weight:bold;

}


.form-control,
.form-select{

    border-radius:8px;

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
Gestión de Consultas Médicas
</h4>


<p>
Usuario:
<b><?php echo $_SESSION['usuario']; ?></b>
</p>


</div>





<div class="card mt-4">


<h2 class="titulo">
Registrar Consulta Médica
</h2>



<form action="guardar_consulta.php" method="POST">


<div class="mb-3">

<label>
Paciente
</label>

<select name="id_paciente" class="form-select">


<?php while($p = mysqli_fetch_assoc($pacientes)){ ?>


<option value="<?php echo $p['id_paciente']; ?>">

<?php
echo $p['nombre']." ".
$p['apellido_paterno']." ".
$p['apellido_materno'];
?>

</option>


<?php } ?>


</select>


</div>




<div class="mb-3">

<label>
Doctor
</label>


<select name="id_doctor" class="form-select">


<?php while($d=mysqli_fetch_assoc($doctores)){ ?>


<option value="<?php echo $d['id_doctor']; ?>">

<?php echo $d['nombre']; ?>

</option>


<?php } ?>


</select>


</div>





<div class="mb-3">


<label>
Fecha
</label>


<input type="date" name="fecha" class="form-control" required>


</div>





<div class="mb-3">


<label>
Síntomas
</label>


<textarea name="sintomas" class="form-control" rows="3" required></textarea>


</div>





<div class="mb-3">


<label>
Diagnóstico
</label>


<textarea name="diagnostico" class="form-control" rows="3" required></textarea>


</div>





<div class="mb-3">


<label>
Tratamiento
</label>


<textarea name="tratamiento" class="form-control" rows="3" required></textarea>


</div>





<button class="btn btn-hospital">

Guardar Consulta

</button>



<a href="listar_consultas.php" class="btn btn-outline-success">

Ver Consultas Registradas

</a>



<a href="recetas.php" class="btn btn-outline-secondary">

Emitir Receta

</a>



</form>



</div>


</div>



</body>

</html>