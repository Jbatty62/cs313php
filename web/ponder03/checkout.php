<?php

session_start();

$total = 0;

?>
<html>
    <head>
        <title>CS 313 - Ponder 03 - Cart</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/jscript" src="functions.js"></script>
    </head>
    <body>
        <?php 
                include '../nav.php'
        ?>
        <div id=container>
        
            <main id="main">
                <div style="margin: auto">
                    <h1>Checkout</h1>
                    <form id="form" class="form-group" method="get" action="thankyou.php">
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
                        <input type="text" name="street" class="form-control" id="street"  placeholder="Street">

                        <input type="text" name="city" class="form-control" id="city" placeholder="City">

                        <input type="text" name="state" class="form-control" id="state" placeholder="State">

                        <input type="text" name="zip" class="form-control" id="zip" placeholder="Zip">

                        <input type="text" name="county" class="form-control" id="county" placeholder="County">
                        <input type="text" name="country" class="form-control" id="country" placeholder="Country">
                        <input id="submit"type="submit" value="Complete Purchase">
                    </form>
                    <p id="total">Total: $99.99</p>
                    
                    
                    
                </div>
                
            </main>
            <aside id="cart">
            <h1>Cart<span id="total"></span></h1>
                <div id="float">
                    <?php
                if(sizeof($_SESSION['cart']) > 0){
                    foreach($_SESSION["cart"] as $item){
                        echo '<div id="cart-item-' . $item['id'] . '" class="cart-item"> <div class="cart-item-text"> <span id="cart-item-name-' .
                         $item['id'] . '">' . $item['name'] . '</span> <span id="button'. $item['id'] . '" class="close" onclick="removeFromCart('. $item['id'] .
                          ',' . $item['price'] .',' . '0)"></span> <p class="cart-item-price"> Price: $' . 
                          $item['price'] . '</p> </div> <img id="cart-item-image-' . $item['id'] . '" class="cart-item-image" src="icon' . $item['id'] . '.png"></div>';
        

                        $total += $item['price'];
                        
                    }

                    echo '<script> setTotal(' . $total . ') </script>'; 

                }
                else {
                    echo '<div id="item-1" class="cart-page-item">
                        <h2>Your Cart is Empty!</h2>
                        <p>You should go fill it up!</p>
                        <a href="./"><button><span>Return to Shop</span></button></a>
                        </div>';
                }
                ?> 
                        
                    </div>
                    <a href="./"><button class="button" style="margin-right: 8px"><span>Return to Shop</span></button></a>
                    <a href="./cart.php"><button><span>View Cart</span></button></a>                   
                </div>
            </aside>
            
        </div>
    </body>
</html>