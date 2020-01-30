<?php 

session_start();

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
                <div id="cart-contents">
                <?php
                if(isset($_SESSION["cart"])){
                    foreach($_SESSION["cart"] as $item => $id){
                        echo '<div id="item-1" class="cart-page-item"> <h2>';
                        echo $item['name'];
                        echo '<img src="book.png" height="100px" style="float: right;"> <h3>Price:';
                        echo  $item['price'];
                        echo '</h3><button id="button';
                        echo $id;
                        echo '" onclick="removeFromCart()"><span>Remove From Cart</span></button>';
                        
                    }
                }
                else {
                    echo '<div id="item-1" class="cart-page-item">
                        <h2>Your Cart is Empty!</h2>
                        <p>You should go fill it up!</p>
                        <a href="./"><button><span>Return to Cart</span></button></a>
                        </div>';
                }
                ?>
                
                    <div id="item-1" class="cart-page-item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="removeFromCart()"><span>Remove From Cart</span></button>


                    </div>
                    <div id="item-2" class="cart-page-item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="removeFromCart()"><span>Remove From Cart</span></button>

                    </div>
                    <div id="item-3" class="cart-page-item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="removeFromCart()"><span>Remove From Cart</span></button>

                    </div>
                    <div id="item-4" class="cart-page-item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="removeFromCart()"><span>Remove From Cart</span></button>

                    </div>
                    <div id="item-5" class="cart-page-item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="removeFromCart()"><span>Remove From Cart</span></button>

                    </div>
                    <div id="item-6" class="cart-page-item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="removeFromCart()"><span>Remove From Cart</span></button>

                    </div>
                    <div id="item-7" class="cart-page-item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="removeFromCart()"><span>Remove From Cart</span></button>

                    </div>
                    <div id="item-8" class="cart-page-item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="removeFromCart()"><span>Remove From Cart</span></button>

                    </div>
                    <p id="subtotal">Subtotal: $99.99</p>
                    <p id="total">Total: $99.99</p>
                    <a href="."><button style="float:left;clear:both;"><span>Continue Shopping</span></button></a>
                    <a href="./checkout.php"; ?>"><button style="float:right;clear:right;"><span>Proceed to Checkout</span></button></a>
                    
                    
                </div>
                
            </main>
            
        </div>
    </body>
</html>