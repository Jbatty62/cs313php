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
                echo '<p>In php Block</p>';
                foreach ($db->query("SELECT * FROM character_races") as $row) {    
                    echo '<p>In Foreach Block</p>';            
                    echo '<div class="card">'. $row['name'] . '</div>';
                }
                echo '<p>Out of For Each</p>';
            ?>
        </main>

    </div>
    
</body>
</html>