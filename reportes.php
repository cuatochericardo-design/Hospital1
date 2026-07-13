<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");


$pacientes = mysqli_fetch_assoc(
    mysqli_query($conexion,"SELECT COUNT(*) AS total FROM pacientes")
);

$doctores = mysqli_fetch_assoc(
    mysqli_query($conexion,"SELECT COUNT(*) AS total FROM doctores")
);

$consultas = mysqli_fetch_assoc(
    mysqli_query($conexion,"SELECT COUNT(*) AS total FROM consultas")
);

$recetas = mysqli_fetch_assoc(
    mysqli_query($conexion,"SELECT COUNT(*) AS total FROM recetas")
);

?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Reportes - Sistema Médico</title>


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
border:none;
border-radius:12px;
padding:25px;
box-shadow:0 3px 10px rgba(0,0,0,.08);

}



.titulo{

color:#006341;

}



.numero{

font-size:35px;
font-weight:bold;
color:#006341;

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
Panel de Reportes
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
Reportes Generales del Hospital
</h2>








<div class="row">



<div class="col-md-3">

<div class="card">


<h6>
Pacientes registrados
</h6>


<div class="numero">

<?php echo $pacientes['total']; ?>

</div>


</div>

</div>





<div class="col-md-3">

<div class="card">


<h6>
Doctores registrados
</h6>


<div class="numero">

<?php echo $doctores['total']; ?>

</div>


</div>

</div>





<div class="col-md-3">

<div class="card">


<h6>
Consultas realizadas
</h6>


<div class="numero">

<?php echo $consultas['total']; ?>

</div>


</div>

</div>





<div class="col-md-3">

<div class="card">


<h6>
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