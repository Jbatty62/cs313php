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
        <?php include 'nav.php'; ?>
        <div id=container>
            <main id="main">
                <div id="cart-contents">
                <?php
                if(sizeof($_SESSION['cart']) > 0){
                    foreach($_SESSION["cart"] as $item){
                        echo '<div id="cart-item-' . $item['id'] .'" class="cart-page-item"> <h2>';
                        echo $item['name'];
                        echo '<img src="icon'. $item['id'] . '.png" height="115px" style="float: right;"> <h3>Price:';
                        echo  $item['price'] . '</h3> <button onclick="removeFromCart('. $item['id'] .
                        ',' . $item['price'] .',' . '0)"><span>Remove From Cart</span></button></div>';

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
                
                    
                    
                    <p id="total-wrapper"><span id="total">Total: $<?php echo number_format($total, 2);?></span></p>
                    <a href="."><button style="float:left;clear:both;"><span>Continue Shopping</span></button></a>
                    <a href="./checkout.php"; ?>"><button style="float:right;clear:right;"><span>Proceed to Checkout</span></button></a>
                    
                    
                </div>
                
            </main>
            
        </div>
    </body>
</html>