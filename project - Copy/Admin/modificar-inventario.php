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
	$idmodi = $_GET['registro'];
	
	$modi = "SELECT * FROM productos WHERE idProductos=" .$idmodi;
	$result=mysqli_query($conn, $modi);
	$resultCheck = mysqli_num_rows($result);
	
	if($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)){
			$id=$row['idProductos'];
			$nombre= $row['Nombre'];
			$tipo= $row['Tipo'];
			$precio= $row['Precio'];
			$cantidad= $row['Cantidad'];
			$marca= $row['Marca'];
			$descripcion= $row['Descripcion'];
		}
	}
	
?>
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
						<h2>Modificar producto</h2><br>
						<form method="POST" action="preview-inventario-modi.php" style="margin-left: 8%; margin-right: 40%;">
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<div class="form-group"><label>Nombre: </label><input class="form-control" type="text" name="nombre" value="<?php echo $nombre ?>"><br></div>
							<div class="form-group"><label>Tipo: </label><select name="tipo" class="form-control">
								<?php 
								if($tipo==1){
									echo "<option value='1' selected='selected'>Maquillaje</option><option value='2' >Ropa</option><option value='3' >Zapatos</option>";
								}
								else if($tipo==2){
									echo "<option value='1' >Maquillaje</option><option value='2' selected='selected'>Ropa</option><option value='3' >Zapatos</option>";
								}
								else if($tipo==3){
									echo "<option value='1' >Maquillaje</option><option value='2' >Ropa</option><option value='3' selected='selected' >Zapatos</option>";
								}
								else {
									echo "<option value='1' >Maquillaje</option><option value='2' >Ropa</option><option value='3' >Zapatos</option>";
								}
								?>
								
							</select><br></div>
							<div class="form-group"><label>Descripcion: </label><input class="form-control" type="text" name="descripcion" value="<?php echo $descripcion ?>"><br></div>
							<div class="form-group"><label>Marca: </label><input class="form-control" type="text" name="marca" value="<?php echo $marca ?>"><br></div>
							
							<div class="form-group"><label>Cantidad: </label><input class="form-control" type="number" name="cantidad" value="<?php echo $cantidad ?>"><br></div>
							<div class="form-group"><label>Precio: </label><input class="form-control" type="number" step="any" name="precio" value="<?php echo $precio ?>"><br></div>
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
</html>