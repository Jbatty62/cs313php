<?php
$WEB_ROOT = "https://floating-bastion-15566.herokuapp.com"
?>
<html>
    <head>
        <title>CS 313 - Ponder 03</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/jscript" src="functions.js"></script>
    </head>
    <body>
        <div id=container>
            <?php include $WEB_ROOT/nav.php ?>
            <main id="main">
                
                    <div id="item-1" class="item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(1)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-2" class="item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(2)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-3" class="item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(3)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-4" class="item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(4)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-5" class="item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(5)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-6" class="item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(6)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-7" class="item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(7)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-8" class="item">
                        <h2>Basic Rule Set</h2>
                        <img src="book.png" height="100px" style="float: right;">
                        <p><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3>Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(8)"><span>Add to Cart</span></button>


                    </div>
                
                
            </main>
            <aside id="cart">
                <div id="float">
                    <h1>Cart</h1>
                    <div id="cart-item-1" class="cart-item"> 
                        <div class="cart-item-text">
                            <span>Basic Rule Set</span>
                            <span id="button1" class="close" onclick="removeFromCart()"></span>
                            <p class="cart-item-price">$19.95</p>
                        </div>
                        <img class="cart-item-image" src="book.png">
                    </div>
                    <div id="cart-item-2" class="cart-item"></div>
                    <div id="cart-item-3" class="cart-item"></div>
                    <div id="cart-buttons">
                        <button class="button" style="margin-right: 8px"><span>View Cart</span></button>
                        <button><span>Checkout</span></button>
                    </div>
                    
                </div>
            </aside>
        </div>
    </body>
</html>

