<?php

session_start();

include("conexion.php");


$usuario = $_POST['usuario'];
$password = $_POST['password'];



$sql = "SELECT * FROM usuarios 
WHERE usuario='$usuario' 
AND password='$password'";


$resultado = mysqli_query($conexion,$sql);



if(mysqli_num_rows($resultado) > 0){


    $fila = mysqli_fetch_assoc($resultado);


    $_SESSION['usuario'] = $fila['usuario'];

    $_SESSION['rol'] = $fila['rol'];



    // Todos entran al menú principal por ahora

    header("Location: index.php");

    exit();



}else{


?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Error de acceso</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body class="bg-light">


<div class="container mt-5">


<div class="alert alert-danger text-center">


<h4>
❌ Usuario o contraseña incorrectos
</h4>


<a href="login.php" class="btn btn-secondary">
Regresar al login
</a>


</div>


</div>


</body>

</html>


<?php

}

?>