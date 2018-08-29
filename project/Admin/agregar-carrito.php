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

 
// product details
$id = isset($_GET['id']) ?  $_GET['id'] : die;
$name = isset($_GET['name']) ?  $_GET['name'] : die;
$quantity  = isset($_GET['quantity']) ?  $_GET['quantity'] : die;
$user_id=$_SESSION['iduser'];
$created=date('Y-m-d H:i:s');
 
// insert query
$query = "INSERT INTO cart_items (product_id, quantity, user_id, created) values ('$id','$quantity'.'$user_id'.'$created')";
 
// prepare query
mysqli_query($conn, $query);
// bind values

 
// if database insert succeeded

    header('Location: agregar-venta.php?action=added&id=' . $id . '&name=' . $name);
