<?php
session_start();


if(!isset($_SESSION["loggedin"]) || !($_SESSION["loggedin"] === true)){
    header("location: login.php");
    exit;
} else {
    require_once 'connect.php';

    if (isset($_SESSION["id"])) {

        if (isset($_POST['firstName'])) {
            $stmt = $db->prepare('UPDATE user_accounts SET first_name = :first_name WHERE user_account_id = :id;');
            $stmt->bindParam(':first_name', $_POST['firstName']);
            $stmt->bindParam(':id', $_SESSION["id"]);
            $stmt->execute();
        }

        if (isset($_POST['lastName'])) {
            $stmt = $db->prepare('UPDATE user_accounts SET last_name = :last_name WHERE user_account_id = :id;');
            $stmt->bindParam(':last_name', $_POST['lastName']);
            $stmt->bindParam(':id', $_SESSION["id"]);
            $stmt->execute();
        }

        if (isset($_POST['username'])) {
            $stmt = $db->prepare('UPDATE user_accounts SET username = :username WHERE user_account_id = :id;');
            $stmt->bindParam(':username', $_POST['username']);
            $stmt->bindParam(':id', $_SESSION["id"]);
            $stmt->execute();
        }

        if (isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmNewPassword'])) {

                // Validate new password
                if(empty(trim($_POST["newPassword"]))){
                    $new_password_err = "Please enter the new password.";     
                } else if(strlen(trim($_POST["newPassword"])) < 6) {
                    $new_password_err = "Password must have atleast 6 characters.";
                } else {
                    $new_password = trim($_POST["newPassword"]);
                }
                
                // Validate confirm password
                if(empty(trim($_POST["confirmNewPassword"]))){
                    $confirm_password_err = "Please confirm the password.";
                } else{
                    $confirm_password = trim($_POST["confirmNewPassword"]);
                    if(empty($new_password_err) && ($new_password != $confirm_password)){
                        $confirm_password_err = "Password did not match.";
                    }
                 }
                
                 // Check input errors before updating the database
                if(empty($new_password_err) && empty($confirm_password_err)){
                    // Prepare an update statement
                    $sql = "UPDATE user_accounts SET password = :password WHERE user_account_id = :id";
                    
                    if($stmt = $db->prepare($sql)){
                        // Bind variables to the prepared statement as parameters
                        $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
                        $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
                        
                        // Set parameters
                        $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                        $param_id = $_SESSION["id"];
                        
                        $stmt->execute();

                        // Close statement
                        unset($stmt);
                    }
                }
        }

    


        $sql = 'SELECT * FROM user_accounts WHERE user_account_id =' . $_SESSION["id"];
        $row = $db->query($sql)->fetch();

        $firstName = $row["first_name"];
        $lastName = $row["last_name"];
        $userName = $row["username"];

    }

    else {
        echo 'Something has gone terribly wrong...';
    }
}

?>

<html>
    <head>
        <title>The Last Stand RPG | My Account</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/jscript" src="functions.js"></script>
        <style> 

        </style>
    </head>
    <body>
    <?php include 'nav.php';  ?>
        <div id="container">
        
            <main id="main" style="padding: 0 50px;">
                <h1>My Account</h1>
                
                <form class="form-horizontal" action="account.php" method="post">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Basic Information</legend>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="firstName">First Name</label>  
                    <div class="col-md-4">
                    <input id="firstName" name="firstName" type="text" placeholder="First Name" class="form-control input-md" value="<?php echo $firstName; ?>">
                    <span class="help-block"></span>  
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="lastName">Last Name</label>  
                    <div class="col-md-4">
                    <input id="lastName" name="lastName" type="text" placeholder="Last Name" class="form-control input-md" value="<?php echo $lastName;?>">
                    <span class="help-block"></span>  
                    </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="updateBasicInfo"></label>
                    <div class="col-md-4">
                        <button id="updateBasicInfo" name="updateBasicInfo" class="btn btn-primary">Update</button>
                    </div>
                    </div>

                    </fieldset>
                </form>

                <form class="form-horizontal" action="account.php" method="post">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Login Information</legend>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="userName">Username</label>  
                    <div class="col-md-4">
                    <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" value="<?php echo $userName;?>">
                    <span class="help-block"><?php echo $username_err; ?></span>  
                    </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="updatePassword"></label>
                    <div class="col-md-4">
                        <button id="updatePassword" name="updatePassword" class="btn btn-primary">Update</button>
                    </div>
                    </div>

                    </fieldset>
                </form>

                <form class="form-horizontal" action="account.php" method="post">>
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Change Password</legend>

                    <!-- Password input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="currentPassword">Current Password</label>
                    <div class="col-md-4">
                        <input id="currentPassword" name="currentPassword" type="password" placeholder="Current Password" class="form-control input-md">
                        <span class="help-block"><?php echo $current_password_err; ?></span>
                    </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="newPassword">New Password</label>
                    <div class="col-md-4">
                        <input id="newPassword" name="newPassword" type="password" placeholder="New Password" class="form-control input-md">
                        <span class="help-block"><?php echo $new_password_err; ?></span>
                    </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="confirmNewPassword">Confirm New Password</label>
                    <div class="col-md-4">
                        <input id="confirmNewPassword" name="confirmNewPassword" type="password" placeholder="Confirm New Password" class="form-control input-md">
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="updatePassword"></label>
                    <div class="col-md-4">
                        <button id="updatePassword" name="updatePassword" class="btn btn-primary">Update</button>
                    </div>
                    </div>

                    </fieldset>
                </form>
                <div id="modules-owned">
                    <table>
                        <tr>
                            <th>Order ID</th>
                            <th>Module Name</th>
                            <th>Date of Purchase</th>
                            <th>Cost</th>
                        </tr>
                        <?php
                            $sql = 'SELECT * FROM user_orders INNER JOIN modules ON user_orders.module_id = modules.module_id WHERE user_account_id = ' . $_SESSION["id"];
                            foreach ($db->query($sql) as $row) {

                            echo '<tr>' .
                                    '<td>' . $row["user_orders_id"] . '</td>' .
                                    '<td>' . $row["module_name"] . '</td>' .
                                    '<td>' . $row["time"] . '</td>' .
                                    '<td>'.$row["price"] . '</td>' .
                                 '</tr>';

                            }

                        ?>
                    </table>

                </div>
                
            </main>
            
        </div>
    </body>
</html>