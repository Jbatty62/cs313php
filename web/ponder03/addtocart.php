<?php
session_start();


if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']))
{    

    $item = array 
    (
    "id" => $_POST['id'],
    "name" => $_POST['name'],
    "price" => $_POST['price'],
    );

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"]=array();
    }
    
    $_SESSION["cart"][$_POST['id']] = $item;

    return "Success!";
   
}


?>