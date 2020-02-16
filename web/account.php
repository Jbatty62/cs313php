<?php
session_start();
include 'connect.php'
?>

<html>
    <head>
        <title>The Last Stand RPG | My Account</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/jscript" src="functions.js"></script>
        <style> 
    
    
        </style>
    </head>
    <body>
    <?php include '../nav.php';  ?>
        <div id=container>
        
            <main id="main">
                <div style="margin: auto;">
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
                        <input id="submit" type="submit" value="Complete Purchase">
                    </form>
                    <p id="total">Total: $99.99</p>
                    
                    
                    
                </div>
                
            </main>
            
        </div>
    </body>
</html>