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

        <h1>The Last Stand RPG - Modular Rulebook</h1>
        <p>This application is an alpha version of the rulebook for a new RPG title 'The Last Stand'. The ruleset is designed to be modular, so that you can have quick and easy access to all of the content from all of the books and rulesets that you have purchased.</p>
        <h2>How it works </h2>
        <p>Before you see anything, you'll need to create an account. You can do so by clicking <a href="register.php">here.</a> After you have created an account, you'll need to purchase some modules from the store before you see anything in your content sections. After you purchase a module, all of the content associated with that module will be visible on the various pages of this website.</p>
        <h2>This is just a test!</h2>
        <p>The information attached to each module is just an example of the system, not actual rules or pieces of content that will actually be in the game. The shop does not take any payment info, or charge users anything.</p>
        <p>Also note that there is no filtering or sorting the various content available, nor is there a section for the plain text rulebooks. These features will be coming very soon!</p>
        
            <?php
               
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    $sql = $db->prepare('SELECT * FROM games  WHERE owner_id = :id;');
                    $sql->bindParam(':id', $_SESSION["id"]);
                    $sql->execute();
                    $results = $sql->fetchAll();
                    foreach ($results as $row) {               
                        echo '<div class="accordion">'. '<h2 class="name">'. $row['name'] . '</div>';
                }
            }
            ?>
        </main>
    
    
</body>
</html>