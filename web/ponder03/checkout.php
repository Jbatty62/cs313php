<html>
    <head>
        <title>CS 313 - Ponder 03 - Cart</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/jscript" src="functions.js"></script>
    </head>
    <body>
        <?php
        include $WEB_ROOT . "/nav.php";
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
                    <button style="float:left;clear:both;"><span>Continue Shopping</span></button>
                    <button style="float:right;clear:right;"><span>Complete Purchase</span></button>
                    
                    
                </div>
                
            </main>
            
        </div>
    </body>
</html>