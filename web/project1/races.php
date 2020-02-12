<?php

try
{
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
}

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