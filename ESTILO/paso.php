<!-- Pantalla de Error-->

<?php
	session_start();
	include_once 'connection/conection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pink Boutique</title>
</head>

<!--Estilos -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/login.css">

<body>
	<!--Codigo PHP de inicio de sesion-->
	<?php 
		//Recibe los datos del login
		$nombre = $_POST['nombre'];
		$password = $_POST['password'];
	
		//Realiza las consultas a la tabla usuarios
		$sql = "SELECT * FROM usuarios";
		$result=mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck > 0) {
			 while ($row = mysqli_fetch_assoc($result)){
				 $id=$row['idUsuarios'];
				 $nom=$row['Nombre'];
				 $pass= $row['Password'];
				 $tipo= $row['Tipo'];

				 if($nombre==$nom){
					 if($password==$pass){
						 $_SESSION['iduser']=$id;
						 $_SESSION['loggedin'] = true;
						 $_SESSION['username'] = $nom;
						 $_SESSION['start'] = time();
						 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

						 header('Location: Admin/index.php');
					}
				 }	 
			 }
		}
	?>
	
	<!--Navbar-->
	<div>
		<ul>
			<li><img src="img/logoblanco.png" alt="" id="logo"></li>
			<li><a class="active" href="#" id="first">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Shop</a></li>
			<li><a href="#">Contact</a></li>
			<div class="network"><li ><img src="img/logo-de-facebook.png" alt="" class="social"></li>
			<li ><img src="img/logo-de-instagram.png" alt="" class="social"></li></div>
		</ul>
	</div>
	
	<!--Login-->
	<div class="login-form">
		<div class="main-div">
			<div class="panel">
				<h2>Admin Login</h2>
				<p>Error</p>
			</div>
			<p>USUARIO/CONTRASEÑA INCORRECTOS</p>
			<a href="login.php" class="btn btn-primary">Regresar</a>
		</div>
	</div>
	
	<!-- Footer -->
	<footer class="pinkback">
	<br>
		<div class="footer-copyright text-center py-3">© 2018 Copyright:
			<a href=""> PinkBoutique.com</a>
		</div>
	</footer>

</body>
</html>