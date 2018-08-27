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
	if($now > $_SESSION['expire']) {
		session_destroy();
		header ('Location: ../login.php');
	}

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
	$sql = "SELECT * FROM productos";
	$result = mysqli_query($conn, $sql);
	$resultCheck =  mysqli_num_rows($result);
	
	//Paginacion
	$LIM_PAG=10;
	
	$pagina =$_GET["pagina"];
	if(!$pagina){
		$inicio = 0 ;
		$pagina = 1 ;
	}
	else{
		$inicio = ($pagina - 1)* $LIM_PAG;
	}
	
	$total_paginas = ceil($resultCheck / $LIM_PAG);
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
				<i class="fa fa-tadsf"></i>
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
		<div class="main-content">
			<div class="title">
				Inventario
			</div>
			
			<div class="main">
				
					<br><br>
					
				<div class="widget">
				
				
					<div class="chart">
					<h2>Inventario</h2>
					  <p>Buscar Productos:</p>  
					  <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
					  
					<div class="table-responsive">
					  <table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Producto</th>
								<th>Tipo</th><th>Descripcion</th><th>Existencias</th>
								<th>Precio</th>
								<th>   </th>
							</tr>
						</thead>
						<tbody id="myTable">
						<?php 
	$sql = "SELECT * FROM productos LIMIT ".$inicio."," . $LIM_PAG;
	$result = mysqli_query($conn, $sql);
					
	while($row = mysqli_fetch_assoc($result)){
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
							?>
							
						</tbody>
					  </table>
					  <ul class="pagination">
					  <?php 
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
						  ?>
						  
						  
					  </ul>
					  <div style="text-align: right;">
					  	<a href="agregar-inventario.php" type="button" class="btn btn-success" >Agregar</a><br><br>
					</div>
					</div>
						
				</div>	
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