<?php

include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM pacientes WHERE id_paciente=$id";

$resultado = mysqli_query($conexion,$sql);

$paciente = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html>
<head>
<title>Editar Paciente</title>
</head>

<body>

<h1>Editar Paciente</h1>


<form action="actualizar_paciente.php" method="POST">

<input type="hidden" name="id_paciente" 
value="<?php echo $paciente['id_paciente']; ?>">


Matrícula:
<input type="text" name="matricula" 
value="<?php echo $paciente['matricula']; ?>">
<br><br>


Apellido paterno:
<input type="text" name="apellido_paterno" 
value="<?php echo $paciente['apellido_paterno']; ?>">
<br><br>


Apellido materno:
<input type="text" name="apellido_materno" 
value="<?php echo $paciente['apellido_materno']; ?>">
<br><br>


Nombre:
<input type="text" name="nombre" 
value="<?php echo $paciente['nombre']; ?>">
<br><br>


Edad:
<input type="number" name="edad" 
value="<?php echo $paciente['edad']; ?>">
<br><br>


Sexo:
<select name="sexo">

<option value="Masculino">Masculino</option>
<option value="Femenino">Femenino</option>

</select>

<br><br>


Teléfono:
<input type="text" name="telefono" 
value="<?php echo $paciente['telefono']; ?>">

<br><br>


Dirección:
<input type="text" name="direccion" 
value="<?php echo $paciente['direccion']; ?>">

<br><br>


Diagnóstico:
<input type="text" name="diagnostico" 
value="<?php echo $paciente['diagnostico']; ?>">

<br><br>


<button type="submit">
Actualizar
</button>


</form>


</body>
</html>