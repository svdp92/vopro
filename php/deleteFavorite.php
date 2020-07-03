<?php
require 'includes/header.php';

$favAttraction = $_GET['var'];
$userid = $_SESSION['user_id'];

echo $favAttraction;

$stmt = $conn->prepare("delete from favorites where favorite_id = :var and user_id = :user_id");
$stmt->bindValue(':var', $favAttraction);
$stmt->bindValue(':user_id', $userid);
$stmt->execute();

echo "verwijderd";