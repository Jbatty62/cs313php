<?php
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Classes</title>
</head>
<body>
    <div id="container">
        <?php include 'nav.php'; ?>
        <main id="main">

            <?php
            /*
                foreach ($db->query('SELECT * FROM character_classes') as $row) {               
                    echo '<div class="accordion">'. '<h2 class="name">'.$row['name'] .'</h2> <p class="description"> '. $row['description'] .'</p>' . 
                    '<p><strong>XP Cost: </strong>' . $row['xp_cost'] . '</p>' .
                    '</div>';
                }
            */
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                    $sql = $db->prepare('SELECT * FROM character_abilities c INNER JOIN user_orders orders ON c.module_id = orders.module_id WHERE orders.user_account_id = :id;');
                    $sql->bindParam(':id', $_SESSION["id"]);
                    $sql->execute();
                    $results = $sql->fetchAll();
                    foreach ($results as $row) {               
                        echo '<div class="accordion">'. '<h2 class="name">'.$row['name'] .'</h2> <p class="description"> '. $row['description'] .'</p>' . 
                        '<p><strong>XP Cost: </strong>' . $row['xp_cost'] . '</p>' .
                        '</div>';
                    }
    
                    echo '<h1>Want to see more Races? Purchase more Modules from <a href="/shop">The Shop</a></h1>';
                }
                else {
                    echo '<h1>You must <a href="login.php">log in</a> to browse rules and content.</h1>';
                }
            ?>
        </main>

    </div>
    
</body>
</html>