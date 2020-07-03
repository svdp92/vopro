<?php
$json = file_get_contents('http://ginootten.nl/vopro/data.txt');
$obj = json_decode($json);

require_once "includes/header.php";
$userid = $_SESSION['user_id'];

$stmt = $conn->prepare("select favorite_id from favorites where user_id = :user_id");
$stmt->bindValue(':user_id', $userid);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($result);





foreach($obj->AttractionInfo AS $attraction ) {
    if($attraction->Type != 'Attraction'){
        if($attraction->id == $result) {
            echo "$attraction->Id";
        }
    }

}