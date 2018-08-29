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
	<title>Moda y Estilo Cinthya Pineda</title>
	<link rel="stylesheet" href="menu.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		
		
		<link rel="stylesheet" href="../css/main.css">

		<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-dialog.min.css">

	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-dialog.min.js"></script>
	<script src="../js/generales.js"></script>
		
		
</head>
<body>
	
	<div class="header">
			<div class="logo">
				
				<span>Brand</span>
			</div>
			<a href="#" class="nav-trigger"><span>cdaa</span></a>
		</div>
		
		<!--Navbar-->
		<div class="side-nav">
			<div class="logo">
				
				<span>Moda y Estilo Cinthya Pineda</span>
			</div>
			<div class="user-Sidenav"><br><br>
				<center><img alt="User" src="img/majestic.png" ></center>
				<br>
				<br>
				<span id="user-name"><?php echo $_SESSION['username'] ?></span>
				<hr>
			</div>
			<nav>
				<ul>
					<li class="">
						<a href="index.php">
							<span><i class="fa fa-dashboard"></i></span>
							<span>Inicio</span>
						</a>
					</li>
					<li class="active">
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
		<!--Escritorio-->

		<div class="main-content">
			<div class="title">
				Inventario
			</div>
			
			<div class="main">
				
					<br><br>
					
				<div class="widget">
				
				
					<div class="chart">
						<h2>Agregar producto</h2><br>
						<form method="POST" action="preview-inventario.php" style="margin-left: 8%; margin-right: 40%;">
							<div class="form-group"><label>Nombre: </label>
								<input class="form-control" name="nombre"><br></div>
							<div class="form-group"><label>Tipo: </label><select name="tipo" class="form-control">
								<option value="1" >Maquillaje</option><option value="2" >Ropa</option><option value="3" >Zapatos</option>
							</select><br></div>
							<div class="form-group"><label>Descripcion: </label><input class="form-control" type="text" name="descripcion"><br></div>
							<div class="form-group"><label>Marca: </label><input class="form-control" type="text" name="marca"><br></div>
							
							<div class="form-group"><label>Cantidad: </label><input class="form-control" type="number" name="cantidad"  onkeyup="num(this);" onblur='num(this);'><br></div>
							<div class="form-group"><label>Precio: </label><input class="form-control" type="number" step="any" name="precio"><br></div>
							<div style="text-align: right;">
							<button type="submit" class="btn btn-success">Guardar</button>
							<a href=" inventario.php?pagina=1" type="button" class="btn btn-danger">Cancelar</a>
							<br><br>
						</div>
						</form>
						
					</div>	
				</div>
			</div>
		</div>
		
</body>
<script>
	function num(c){
	 c.value=/^\d+$/.test(c.value)?c.value:c.value.substr(0,c.value.length-1);
	}


	/*$('input').keypress(function(event){
	    return validCaracteres(event,this.id);
	});*/
</script>
</html>