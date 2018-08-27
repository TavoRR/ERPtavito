<!-- Pagina de Login al ERP -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Moda y Estilo Cinthya Pineda</title>
</head>

<!--Estilos-->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/login.css">

<body>
	<!--Navbar-->
	<div>
	<ul>
		<li><img src="img/majestic.png" alt="" id="logo"></li>
		<div class="network"><li ><img src="img/logo-de-facebook.png" alt="" class="social"></li>
		<li ><img src="img/logo-de-instagram.png" alt="" class="social"></li></div>
	</ul>
	</div>
	
	<!--Login-->
	<div class="login-form">
		<div class="main-div">
    		<div class="panel">
    		<br><br><br><br>
   				<h2>Bienvenido a Moda y Estilo Cinthya Pineda ERP</h2>
   				<p>Por favor ingresar tu nombre y contraseña</p>
   			</div>
   			<!--Formulario -->
    		<form id="Login" method="POST" action="paso.php">
        		<div class="form-group">
					<input type="text" class="form-control" id="inputEmail" placeholder="Nombre" name="nombre">
        		</div>

				<div class="form-group">
					<input type="password" class="form-control" id="inputPassword" placeholder="Contraseña" name="password">
				</div><br><br>
        		<button type="submit" class="btn btn-primary">ENTRAR</button>
    		</form>
    		<!--Formulario -->
    	</div>
	</div>
	
	<!-- Footer -->
	<!--<footer class="pinkback">
	<br>
		<div class="footer-copyright text-center py-3">© 2018 Copyright:
			<a href=""> ModayEstiloCinthyaPineda.com</a>
	  	</div>
	</footer>-->
</body>
</html>