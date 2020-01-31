<?php

$_SESSION = array();
foreach (array_keys($_SESSION['cart']) as $key ){

    unset($_SESSION['cart']);

}

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
                    <h1>Thank you For Your Purchase!</h1>
                    <p>If this were a real transaction, we would email you a receipt now!</p>
                    
                    <a href="."><button style="float:left;clear:both;"><span>Do it Again!</span></button></a>                    
                    
                </div>
                
            </main>
            
        </div>
    </body>
</html>