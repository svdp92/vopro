<?php
require 'databaseconnect.php';

if(isset($_POST['logout'])) {
    session_destroy();
    header('location: login.php');
}
?>
<nav class="topnav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li>
            <?php
            if (session_status() == PHP_SESSION_ACTIVE){
                echo "<a href='header.php'>"."welkom ".$_SESSION['user_name']."</a>";
            }else if(session_status() == PHP_SESSION_NONE){
                echo "<a href='php/login.php'>"."login"."</a>";
            }
            ?>
        </li>
</ul>
<form method="post" action="index.php">
    <button type="submit" name="logout" value="logout">Log Out</button>
</form>
</nav>