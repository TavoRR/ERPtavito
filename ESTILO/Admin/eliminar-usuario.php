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
					<li class="active">
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
				
			</div>
			
			<div class="main">
				
					<br><br>
					<div class="container">
						  <!--MODAL-->
		<div class="modal fade" id="mostrarmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar</h4>
        </div>
        <div class="modal-body">
         <?php
			$eliminar = $_GET['registro'];
			$eli = "SELECT * FROM usuarios WHERE idUsuarios=" .$eliminar;
	$result=mysqli_query($conn, $eli);
	$resultCheck = mysqli_num_rows($result);
	
	if($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)){
			$id=$row['idUsuarios'];
			$nombre= $row['Nombre'];	
			$Tipo= $row['Tipo'];
		}
	}
		?>
         <h3>¿Seguro que desea eliminar el usuario?</h3> <br>
          <p><strong>Nombre: </strong><?php echo $nombre?></p>
          <p><strong>Tipo: </strong><?php if($Tipo==1){echo "Administrador";} else if($Tipo==2){echo "Cajero";}?></p>
        </div>
        <div class="modal-footer">
          <div style="text-align: right;">
							<a  href="registros/elimi-usuario.php?reg=<?php echo $id; ?>" type="button" class="btn btn-default">Eliminar</a>
							<a href="usuarios.php" type="button" class="btn btn-danger">Cancelar</a>
							<br><br>
						</div>
        </div>
      </div>
      
    </div>
  </div>
  <!--MODAL-->

					</div>
					<br>
					<br><br><br><br><br><br><br><br><br><br>
			</div>
		</div>
</body>
<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>
</html>