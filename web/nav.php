<nav>
    <ul>
    <li><a href="/">Home</a></li>
    <li><a href="/shop/">Shop</a></li>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Rules and Content</a>
        <div class="dropdown-content">
        <a href="/abilities.php">Abilities</a>
        <a href="/classes.php">Classes</a>
        <a href="/items.php">Items</a>
        <a href="/races.php">Races</a>
        <a href="/spells.php">Spells</a>
        </div>
    </li>
    <li><a href="account.php">Account</a></li>
    </ul>
    <?php 

    echo $_SERVER['DOCUMENT_ROOT'];

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo '<a href="logout.php"><button id="sign-out-button">Sign Out</button></a>';
    }
    else {
        echo '<a href="login.php"><button id="sign-in-button">Sign In</button></a> <a href="register.php"><button id="create-account-button">Create Account</button></a>';
    }
    ?>
</nav>