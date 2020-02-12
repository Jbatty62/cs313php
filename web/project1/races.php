<?php

include connect.php;

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
        <main id="main">
            <?php
                foreach ($db->query('SELECT * FROM character_races') as $row) {                
                    echo '<div class="card">'. $row['name'] . '</div>';
                }
            ?>
        </main>

    </div>
    
</body>
</html>