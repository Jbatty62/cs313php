<?php
session_start();
include 'connect.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>The Last Stand RPG</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <main id="main">

            <?php
                foreach ($db->query('SELECT * FROM games') as $row) {               
                    echo '<div class="accordion">'. '<h2 class="name">'. $row['name'] . '</div>';
                }
            ?>
        </main>
    
    
</body>
</html>