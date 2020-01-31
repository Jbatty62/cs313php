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
                    <form class="form-group">
                        <input type="street" class="form-control" id="inputStreet" placeholder="Street">

                        <input type="city" class="form-control" id="inputCity" placeholder="City">

                        <input type="state" class="form-control" id="inputState" placeholder="State">

                        <input type="zip" class="form-control" id="inputZip" placeholder="Zip">

                        <input type="county" class="form-control" id="inputCounty" placeholder="County">
                        <input type="country" class="form-control" id="inputCountry" placeholder="Country">
                    </form>
                    <p id="total">Total: $99.99</p>
                    <a href="."><button style="float:left;clear:both;"><span>Continue Shopping</span></button></a>
                    <button style="float:right;clear:right;"><span>Complete Purchase</span></button>
                    
                    
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
                    <a href="./cart.php"><button class="button" style="margin-right: 8px"><span>View Cart</span></button></a>
                    <a href="./checkout.php"><button><span>Checkout</span></button></a>                   
                </div>
            </aside>
            
        </div>
    </body>
</html>