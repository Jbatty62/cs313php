<?php
    session_start();

 
    
    $WEB_ROOT = $_SERVER['HTTPS'] == '' ? 'http://' : 'https://';
    $PAGE_ROOT = $WEB_ROOT . $_SERVER['HTTP_HOST'];
    
   
?>
<html>
    <head>
        <title>CS 313 - Ponder 03</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="functions.js">
           
        </script>
    </head>
    <body>
         <?php 
                include '../nav.php'
            ?>
        <div id=container>
            <main id="main">
                
                    <div id="item-1" class="item">
                        <h2 id="item-name-1" class="item-name">Basic Rule Set</h2>
                        <img id="item-image-1" src="book.png" height="100px" style="float: right;">
                        <p id="item-description-1">Description: Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3 id="item-price-1" class="item-price">Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(1)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-2" class="item">
                        <h2 id="item-name-2">Basic Rule Set</h2>
                        <img id="item-image-2" src="book.png" height="100px" style="float: right;">
                        <p id="item-description-2"><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3 id="item-price-2">Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(2)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-3" class="item">
                        <h2 id="item-name-3">Basic Rule Set</h2>
                        <img id="item-image-3" src="book.png" height="100px" style="float: right;">
                        <p id="item-description-3"><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3 id="item-price-3">Price: $19.95</h3>
                        <button id="button1" onclick="addToCart('3')"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-4" class="item">
                        <h2 id="item-name-4">Basic Rule Set</h2>
                        <img  id="item-image-4"src="book.png" height="100px" style="float: right;">
                        <p id="item-description-4"><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3 id="item-price-4">Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(4)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-5" class="item">
                        <h2 id="item-name-5">Basic Rule Set</h2>
                        <img  id="item-image-5"src="book.png" height="100px" style="float: right;">
                        <p id="item-description-5"><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3 id="item-price-5">Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(5)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-6" class="item">
                        <h2 id="item-name-6">Basic Rule Set</h2>
                        <img  id="item-image-6"src="book.png" height="100px" style="float: right;">
                        <p id="item-description-6"><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3 id="item-price-6">Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(6)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-7" class="item">
                        <h2 id="item-name-7">Basic Rule Set</h2>
                        <img id="item-image-7" src="book.png" height="100px" style="float: right;">
                        <p id="item-description-7"><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3 id="item-price-7">Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(7)"><span>Add to Cart</span></button>


                    </div>
                    <div id="item-8" class="item">
                        <h2 id="item-name-8">Basic Rule Set</h2>
                        <img  id="item-image-8"src="book.png" height="100px" style="float: right;">
                        <p id="item-description-8"><strong>Description:</strong>Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor Lorem Ipsum Set Dolor</p>
                        <h3 id="item-price-8">Price: $19.95</h3>
                        <button id="button1" onclick="addToCart(8)"><span>Add to Cart</span></button>


                    </div>
                
                
            </main>
            <aside id="cart">
            <h1>Cart</h1>
                <div id="float">
                    
                    
                        <a href="<?php echo $PAGE_ROOT . "/cart.php"; ?>"><button class="button" style="margin-right: 8px"><span>View Cart</span></button></a>
                        <a href="<?php echo $PAGE_ROOT . "/checkout.php"; ?>"><button><span>Checkout</span></button></a>
                    </div>
                    
                </div>
            </aside>
        </div>
    </body>
</html>

