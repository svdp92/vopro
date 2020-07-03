<?php
$json = file_get_contents('http://ginootten.nl/vopro/data.txt');
$obj = json_decode($json);

require_once "includes/header.php";

$userid = $_SESSION['user_id'];

$stmt = $conn->prepare("select favorite_id from favorites where user_id = :user_id");
$stmt->bindValue(':user_id', $userid);
$stmt->execute();

foreach($stmt as $fav){
    $favid = $fav["favorite_id"];
    echo "<p>".$fav["favorite_id"]."</p>";
    echo "<a href=\"./deleteFavorite.php?var=$favid\">Verwijderen</a>";
}