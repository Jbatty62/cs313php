<?php
session_start();
require_once '../connect.php';

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
               //include '../nav.php'
        ?>
        <div id="container">
            <main id="main">
                <div style="margin: auto">
                <?php
                    echo '<p>Name: ' . $_GET['firstname'] . ' '. $_GET['lastname'] . '</p>';
                    echo '<p>Address: ' . $_GET['street'] . ',' . $_GET['city'] . ', ' . $_GET['state'] . ' ' . $_GET['zip'] . '</p>';
                    echo '<p>Country: ' . $_GET['country'] . '</p>';
                    echo '<ul style="padding:0;">Items Purchased: ';

                   
                    
                    foreach ($_SESSION['cart'] as $item) {
                        echo '<li style="list-style:none;padding-left:40px;"> ID: ' . $item['id'] . ' Name: ' . $item['name'] . ' Price: $' . $item['price'] . '</li>';
                        $total += $item['price'];

                        $sql = $db->prepare('INSERT INTO user_orders (user_account_id, module_id, time, created_by, created_date, last_updated_by, last_updated_date) VALUES (:userid, :itemid, CURRENT_DATE,  1, CURRENT_DATE, 1, CURRENT_DATE);');
                        $sql->bindParam(':userid', $_SESSION["id"]);
                        $sql->bindParam(':itemid', $item['id']);
                        $sql->execute();

                    }
                    echo '</ul>';
                    echo '<p>Total: $' . number_format($total, 2) . '</p>';


                    $_SESSION['cart'] = array();

                ?>
                    <h1>Thank you For Your Purchase!</h1>
                    <p>If this were a real transaction, we would email you a receipt now!</p>
                    
                    <a href="."><button style="float:left;clear:both;"><span>Do it Again!</span></button></a>                    
                    
                </div>
                
            </main>
            
        </div>
    </body>
</html>