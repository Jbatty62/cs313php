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
    <title>Races</title>
</head>
<body>
    <div id="container">
        <?php include 'nav.php'; ?>
        <main id="main">

            <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                $sql = $db->prepare('SELECT * FROM character_races c INNER JOIN user_orders orders ON c.module_id = orders.module_id WHERE orders.user_account_id = :id;');
                $sql->bindParam(':id', $_SESSION["id"]);
                $sql->execute();
                $results = $sql->fetchAll();
                foreach ($results as $row) {               
                    echo '<div class="accordion">
                            <h2 class="name">'.$row['name'] .'</h2>
                            <p class="description"> '. $row['description'] .'</p>
                            <h2>Stat Experience Cost Adjustments</h2>
                            <div class="stats-table">
                                <table>
                                    <tr>
                                        <th>Strength</th>
                                        <th>Dexterity</th>
                                        <th>Constitution</th>
                                        <th>Speed</th>
                                        <th>Wit</th>
                                        <th>Intelligence</th>
                                        <th>Wisdom</th>
                                        <th>Charisma</th>
                                    </tr>
                                    <tr>
                                        <td>' . $row['strength_cost_adjust'] .'</td>
                                        <td>' . $row['dexterity_cost_adjust'] .'</td>
                                        <td>' . $row['constitution_cost_adjust'] .'</td>
                                        <td>' . $row['speed_cost_adjust'] .'</td>
                                        <td>' . $row['wit_cost_adjust'] .'</td>
                                        <td>' . $row['intelligence_cost_adjust'] .'</td>
                                        <td>' . $row['wisdom_cost_adjust'] .'</td>
                                        <td>' . $row['charisma_cost_adjust'] .'</td>
                                    </tr>
                                </table>
                            </div>
                        </div>';
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