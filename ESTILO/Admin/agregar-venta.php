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

		
		
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
					<li class="active">
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
		<!-- Contenido -->
			<div class="main-content">
			<div class="title">
				Ventas
			</div>
			
			<div class="main">
				
					<br><br>
					
				<div class="widget">
				
				
					<div class="chart">
						<h2>Nueva Venta</h2><br>
						<form style="margin-left: 8%; margin-right: 40%;">
							<div class="form-group"><label>Productos:  </label><select class="form-control" id="sel1">
								<option>Fedex</option>
								<option>DHL</option>
							  </select><br></div>
							 
							<div class="form-group"><label>Fecha: </label><input class="form-control" id="datepicker"/><br>
                              <div class="form-group"><label>Monto: </label><input class="form-control" type="text" ><br></div>
							  <div class="form-group"><label>Vendedor</label><select multiple class="form-control" id="sel1">
								<option>Cinthya</option>
								<option>Gustavo</option>
							  </select><br></div>
							<br>
                        </div>
							<div style="text-align: right;">
							<button  type="button" class="btn btn-success disabled">Guardar</button>
							<br><br>
						</div>
						</form>
						
					</div>	
						
					
		
					
						<?php 
	/*$sql = "SELECT * FROM productos LIMIT ".$inicio."," . $LIM_PAG;
	$result = mysqli_query($conn, $sql);*/
					
	/*while($row = mysqli_fetch_assoc($result)){
			if ($row['Tipo']==1){
				$tipoprodu = "Maquillaje";
			}
			else if($row['Tipo']==2){
				$tipoprodu = "Ropa";
			}
			else if($row['Tipo']==3){
				$tipoprodu = "Zapatos";
			}
			echo "<tr><td>" . $row['idProductos'] ."</td><td>" . $row['Nombre'] ."</td> <td>" .$tipoprodu ."</td><td>" . $row['Descripcion'] ."</td> <td>" .$row['Cantidad']."</td><td>" .$row['Precio']. "</td><td><a href='eliminar-inventario.php?registro=" .$row['idProductos'] ."'><img src='img/delete.png' class='icon-in'></a>   <a href='modificar-inventario.php?registro=" .$row['idProductos'] ."'><img src='img/edit.png' class='icon-in'></a></td></tr>";
			
		}						
							*/?>
							
						
					  <ul class="pagination">
					 <?php /*
						  if($total_paginas > 1){
							if($pagina !=1 )
								echo '<li class="page-item"><a  class="page-link" href=" inventario.php?pagina='.($pagina-1).'">PREVIEW</a> </li>';
						  for ($i=1;$i<=$total_paginas;$i++) {
							 if ($pagina == $i)
								//si muestro el índice de la página actual, no coloco enlace
								echo '<li class="page-item active"><a  class="page-link">'.$pagina .'</a> </li> ';
							 else
								//si el índice no corresponde con la página mostrada actualmente,
								//coloco el enlace para ir a esa página
								echo '<li class="page-item"><a  class="page-link" href=" inventario.php?pagina='.$i.'">'.$i.'</a> </li> ';
						  }
						  if ($pagina != $total_paginas)
							 echo '<li class="page-item"><a  class="page-link" href="inventario.php?pagina='.($pagina+1).'">NEXT</a> </li>';

						}
						 */ ?>
						  
						  
					  </ul>
					</div>
						
				</div>	
				</div>
			
		
		
		
		<script>
		$(document).ready(function(){
		  $("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
			  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		  });
		});
		</script>
</body>
</html>