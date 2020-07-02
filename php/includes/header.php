<?php
require 'databaseconnect.php';

    session_start();

if(isset($_POST['logout'])) {
    session_destroy();
}
?>
<nav class="topnav">
    <ul>
        <li><a href="../php/index.php">Home</a></li>
        <li><a href="../php/attractions.php">Attracties</a></li>
        <li><a href="../php/restaurants.php">Restaurants</a></li>
        <li><a href="../php/shows.php">Shows</a></li>

            <?php
            if (isset($_SESSION['user_name'])){
                echo "<li>"."<a href='../php/profile.php'>"."welkom ".$_SESSION['user_name']."</a>"."</li>";
            }else{
                echo "<li>"."<a href='../php/login.php'>"."login"."</a>"."</li>";
                echo "<li>"."<a href='../php/register-form.php'>"."Registreren"."</a>"."</li>";
            }
            ?>

</ul>
<form method="post" action="../php/index.php">
    <button type="submit" name="logout" value="logout">Log Out</button>
</form>
</nav>