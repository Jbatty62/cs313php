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
        <?php include nav.php; ?>
        <main id="main">

            <?php
                foreach ($db->query('SELECT * FROM character_races') as $row) {               
                    echo '<div class="accordion">'. '<h2 class="name">'.$row['name'] .'</h2> <p class="description"> '. $row['description'] .'</p>' .
                    '<div class="stats-table">' . "<table>
                    <tr>
                      <th>Strength<br>Cost<br>Adjust</th>
                      <th>Dexterity<br>Cost<br>Adjust<br></th>
                      <th>Constitution<br>Cost<br>Adjust<br></th>
                      <th>Speed<br>Cost<br>Adjust<br></th>
                      <th>Wit<br>Cost<br>Adjust<br></th>
                      <th>Intelligence<br>Cost<br>Adjust<br></th>
                      <th>Wisdom<br>Cost<br>Adjust<br></th>
                      <th>Charisma<br>Cost<br>Adjust</th>
                    </tr>
                    <tr>
                    <td>" . $row['strength_cost_adjust'] ."</td>
                    <td>" . $row['dexterity_cost_adjust'] ."</td>
                    <td>" . $row['constitution_cost_adjust'] ."</td>
                    <td>" . $row['speed_cost_adjust'] ."</td>
                    <td>" . $row['wit_cost_adjust'] ."</td>
                    <td>" . $row['intelligence_cost_adjust'] ."</td>
                    <td>" . $row['wisdom_cost_adjust'] ."</td>
                    <td>" . $row['charisma_cost_adjust'] ."</td>
                    </tr>
                  </table>" .
                    
                    '</div></div>';
                }
            ?>
        </main>

    </div>
    
</body>
</html>