<?php



if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity']))
{    

    $item = array 
    (
    "id" => $_POST['id'],
    "name" => $_POST['name'],
    "price" => $_POST['price'],
    "quantity" => $_POST['quantity'],
    );
   
}
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"]=array();
}

array_push($_SESSION["cart"], $item);

?>