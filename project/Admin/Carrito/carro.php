<?php
// connect to database
include 'config/database.php';
 
// page headers
$page_title="Carrito";
include 'head.php';
 
// parameters
$action = isset($_GET['action']) ? $_GET['action'] : "";
$Nombre = isset($_GET['name']) ? $_GET['name'] : "";
 
// display a message
if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$Nombre}</strong> fue eliminado del carrito!";
    echo "</div>";
}
 
else if($action=='quantity_updated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$Nombre}</strong> la cantidad ha sido actualizada!";
    echo "</div>";
}
 
else if($action=='failed'){
        echo "<div class='alert alert-info'>";
        echo "<strong>{$Nombre}</strong> no se pudo actualizar la cantidad!";
    echo "</div>";
}
 
else if($action=='invalid_value'){
        echo "<div class='alert alert-info'>";
        echo "<strong>{$Nombre}</strong> cantidad es inválida!";
    echo "</div>";
}
 
// select products in the cart
$query="SELECT p.idProductos, p.Nombre, p.Precio, ci.quantity, ci.quantity * p.Precio AS subtotal  
            FROM cart_items ci  
                LEFT JOIN productos p 
                    ON ci.product_id = p.idProductos"; 
 
$stmt=$con->prepare( $query );
$stmt->execute();
 
// count number of rows returned
$num=$stmt->rowCount();
 
if($num>0){
     
    //start table
    echo "<table class='table table-hover table-responsive table-bordered'>";
     
    // our table heading
    echo "<tr>";
        echo "<th class='textAlignLeft'>Nombre del producto</th>";
        echo "<th>Precio (USD)</th>";
            echo "<th style='width:15em;'>Cantidad</th>";
            echo "<th>Sub Total</th>";
            echo "<th>Acciones</th>";
    echo "</tr>";
         
    $total=0;
     
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
       
        echo "<tr>";
            echo "<td>";
                        echo "<div class='product-id' style='display:none;'>{$idProductos}</div>";
                        echo "<div class='product-name'>{$Nombre}</div>";
            echo "</td>";
            echo "<td>&#36;" . number_format($Precio, 2, '.', ',') . "</td>";
            echo "<td>";
                        echo "<div class='input-group'>";
                            echo "<input type='number' name='quantity' value='{$quantity}' class='form-control'>";
                             
                            echo "<span class='input-group-btn'>";
                                echo "<button class='btn btn-info update-quantity' type='button'><i class='glyphicon glyphicon-refresh'></i> Actualizar</button>";
                            echo "</span>";
                             
                        echo "</div>";
                echo "</td>";
                echo "<td>&#36;" . number_format($subtotal, 2, '.', ',') . "</td>";
                echo "<td>";
            echo "<a href='eliminar.php?id={$idProductos}&name={$Nombre}' class='btn btn-danger'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Quitar del carrito";
            echo "</a>";
            echo "</td>";
        echo "</tr>";
             
        $total += $subtotal;
    }
     
    echo "<tr>";
    echo "<td><b>Total</b></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td>&#36;" . number_format($total, 2, '.', ',') . "</td>";
    echo "<td>";
            echo "<a href='#' class='btn btn-success'>";
            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Pagar";
            echo "</a>";
    echo "</td>";
    echo "</tr>";
         
    echo "</table>";
}else{
    echo "<div class='alert alert-danger'>";
    echo "<strong>No se han encontrado productos</strong> en tu carrito!";
    echo "</div>";
}
 
 
include 'footer.php';
?>