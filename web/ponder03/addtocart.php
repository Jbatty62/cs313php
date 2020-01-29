<?php


if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity']))
{    
    if(empty($_SESSION['cart']))
    $_SESSION['id'] = $_POST['id'];
    $_SESSION{"name"} = $_POST['name'];
    $_SESSION["price"] = $_POST['price'];
    $_SESSION["quantity"] = $_POST['quantity'];
    

?>