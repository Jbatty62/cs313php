<?php
session_start();


if(isset($_POST['id']) && isset($_SESSION["cart"]))
{    

    
    unset($_SESSION['cart'][$_POST['id']]);

    return "Success!";
   
}


?>