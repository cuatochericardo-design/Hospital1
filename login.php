<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Ingreso - Hospital San Gabriel</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>


body{

    background:#f5f7f6;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Arial,sans-serif;

}



.login-card{

    width:380px;
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,.15);
    text-align:center;

}



.logo img{

    width:100px;
    height:100px;
    object-fit:cover;
    margin-bottom:15px;

}



.logo h2{

    color:#006341;
    font-weight:bold;

}



.logo p{

    color:#666;

}



.form-control{

    border-radius:8px;

}



.btn-hospital{

    width:100%;
    background:#006341;
    color:white;
    border:none;
    padding:12px;
    border-radius:8px;
    font-size:16px;

}



.btn-hospital:hover{

    background:#004d32;
    color:white;

}



</style>


</head>



<body>



<div class="login-card">



<div class="logo">


<img src="img/logo.png">



<h2>
Bienvenido a IMSS
</h2>



<p>
Sistema Integral Médico Mexicano
</p>


</div>





<form action="validar.php" method="POST">


<div class="mb-3 text-start">


<label>
Usuario
</label>


<input 
type="text" 
name="usuario" 
class="form-control"
required>


</div>





<div class="mb-3 text-start">


<label>
Contraseña
</label>


<input 
type="password" 
name="password" 
class="form-control"
required>


</div>





<button type="submit" class="btn-hospital">

Ingresar al Sistema

</button>



</form>



</div>



</body>

</html>