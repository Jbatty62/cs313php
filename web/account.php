<?php
session_start();


if(!isset($_SESSION["loggedin"]) || !($_SESSION["loggedin"] === true)){
    header("location: login.php");
    exit;
} else {
    include 'connect.php';

    if (isset($_SESSION['id'])) {
    $sql = 'SELECT * FROM user_accounts WHERE user_account_id =' . $_SESSION['id'];
    $row = $db->query($sql);
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
                
                <form class="form-horizontal">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Basic Information</legend>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="firstName">First Name</label>  
                    <div class="col-md-4">
                    <input id="firstName" name="firstName" type="text" placeholder="First Name" class="form-control input-md" value="<?php echo $row['first_name'];?>">
                    <span class="help-block"></span>  
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="lastName">Last Name</label>  
                    <div class="col-md-4">
                    <input id="lastName" name="lastName" type="text" placeholder="Last Name" class="form-control input-md" value="<?php echo 'Batty';?>">
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

                <form class="form-horizontal">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Login Information</legend>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="userName">Username</label>  
                    <div class="col-md-4">
                    <input id="userName" name="userName" type="text" placeholder="Username" class="form-control input-md" value="<?php echo $row['username'];?>">
                    <span class="help-block"></span>  
                    </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="currentPassword">Current Password</label>
                    <div class="col-md-4">
                        <input id="currentPassword" name="currentPassword" type="password" placeholder="Current Password" class="form-control input-md">
                        <span class="help-block"></span>
                    </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="newPassword">New Password</label>
                    <div class="col-md-4">
                        <input id="newPassword" name="newPassword" type="password" placeholder="New Password" class="form-control input-md">
                        <span class="help-block"></span>
                    </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="confirmNewPassword">Confirm New Password</label>
                    <div class="col-md-4">
                        <input id="confirmNewPassword" name="confirmNewPassword" type="password" placeholder="Confirm New Password" class="form-control input-md">
                        <span class="help-block"></span>
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

                
            </main>
            
        </div>
    </body>
</html>