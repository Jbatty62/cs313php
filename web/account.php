<?php
session_start();
include 'connect.php';

if(!isset($_SESSION["loggedin"]) || !($_SESSION["loggedin"] === true)){
    header("location: login.php");
    exit;
}

?>

<html>
    <head>
        <title>The Last Stand RPG | My Account</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/jscript" src="functions.js"></script>
        <style> 
        
/***************************
* Form Styles --->
***************************/


.form-group {
  margin: 30px auto;
  width: 450px;
}

input {
    margin: 5px 5px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.5;
    color: #555;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.25);
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    float: left;
}

#submit {
  border-radius: 4px;
  background-color: var(--color-2);
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 8px;
  transition: all 0.5s;
  cursor: pointer;
  float:right;
}
    
        </style>
    </head>
    <body>
    <?php include '/nav.php';  ?>
        <div id=container>
        
            <main id="main">
                <div style="margin: auto;">
                    <h1>My Account</h1>
                    <form id="form" class="form-group" method="get" action="thankyou.php">
                        <p>Basic Information</p>
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
                        <input type="text" name="street" class="form-control" id="street"  placeholder="Street">

                        <input type="text" name="city" class="form-control" id="city" placeholder="City">

                        <input type="text" name="state" class="form-control" id="state" placeholder="State">

                        <input type="text" name="zip" class="form-control" id="zip" placeholder="Zip">

                        <input type="text" name="county" class="form-control" id="county" placeholder="County">
                        <input type="text" name="country" class="form-control" id="country" placeholder="Country">
                        <input id="submit" type="submit" value="Complete Purchase">
                    </form>
                    
                    
                    
                </div>
                
            </main>
            
        </div>
    </body>
</html>