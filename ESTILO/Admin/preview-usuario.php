<?php
	session_start();
	include_once 'connection/conection.php';

	//Checa el inicio de sesion
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		
	}
	else{
		header ('Location: ../login.php');
	}
	$now = time();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pink Boutique ERP</title>
	
	
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		
		
		<link rel="stylesheet" href="../css/main.css">

		
		
		
</head>
<body>
<?php
	
	$sql = "SELECT * FROM usuarios"
	
?>
<?php
	
	//Recibir por POST los datos del formulario
	
	$nombre =$_POST["nombre"];
	$tipo = $_POST["tipo"];
	$password = $_POST["password"];
	
	
?>
	<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Brand</span>
			</div>
			<a href="#" class="nav-trigger"><span>cdaa</span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Pink Boutique</span>
			</div>
			<div class="user-Sidenav">
				<center><img alt="User" src="img/user.png" ></center>
				<span id="user-name"><?php echo $_SESSION['username'] ?></span>
				<hr>
			</div>
			<nav>
				<ul>
					<li >
						<a href="index.php">
							<span><i class="fa fa-dashboard"></i></span>
							<span>Inicio</span>
						</a>
					</li>
					<li>
						<a href="inventario.php?pagina=1">
							<span><i class="fa fa-clipboard"></i></span>
							<span>Inventario</span>
						</a>
					</li>
					<li>
						<a href="ventas.php?pagina=1">

							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Ventas</span>
						</a>
					</li>
					<li >
						<a href="envios.php">
							<span><i class="fa fa-send"></i></span>
							<span>Envios</span>
						</a>
					</li>
					<li>
						<a href="usuarios.php">
							<span><i class="fa fa-user"></i></span>
							<span>Usuarios</span>
						</a>
					</li>
					<li>
						<a href="reportes.php">
							<span><i class="fa fa-book"></i></span>
							<span>Reportes</span>
						</a>
					</li>
					<li>
						<a href="../logout.php">
							<span><i class="fa fa-sign-out"></i></span>
							<span>Cerrar Sesion</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="title">
				Preview Usuario
			</div>
			
			<div class="main">
				
					<br><br>
					<div class="widget">
				  <div class="chart">
					  <h2>Preview Usuario <?php echo $nombre ?></h2>
					  <div class="table-responsive">
					  <table class="table table-hover">
					  <?php 

			if ($tipo==1){
				$tipoprodu = "Administrador";
			}
			else if($tipo==2){
				$tipoprodu = "Cajero";
			}
			?>
					  <tr>
					  	<td><strong>Nombre:</strong></td>
					  	<td><?php echo $nombre ?></td>
					  </tr>
					  <tr>
					  	<td><strong>Tipo: </strong> </td>
					  	<td> <?php echo $tipoprodu ?></td>
					  </tr>
					  <tr>
					  	<td><strong>Contraseña: </strong></td>
					  	<td><?php echo $password ?></td>
					  </tr>
					   
					  </table>
					  </div>
<a href="registros/usuario.php?nombre=<?php echo $nombre ?>&tipo=<?php echo $tipo ?>&password=<?php echo $password ?>" type="button" class="btn btn-success" >Guardar</a>
					<a href="usuarios.php" type="button" class="btn btn-danger">Cancelar</a>
					</div>
					<br>
					<br><br><br><br><br><br><br><br><br><br>
					
				</div>
			</div>
		</div>
	
	
	
	
</body>
</html>