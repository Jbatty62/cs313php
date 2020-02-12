<?php
include 'connect.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Races</title>
</head>
<body>
    <div id="container">
        <?php include 'nav.php'; ?>
        <main id="main">

            <?php
                foreach ($db->query('SELECT * FROM items') as $row) {               
                    echo '<div class="accordion">'. '<h2 class="name">'.$row['name'] .'</h2> <p class="description"> '. $row['description'] .'</p>' . 
                    '<p><strong>XP Cost: </strong>' . $row['xp_cost'] . '</p>' .
                    '</div>';
                }
            ?>
        </main>

    </div>
    
</body>
</html>