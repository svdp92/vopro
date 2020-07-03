<?php
$json = file_get_contents('http://ginootten.nl/vopro/data.txt');
$obj = json_decode($json);

require_once "includes/header.php";

$favAttraction = $_GET['var'];
$userid = $_SESSION['user_id'];

$stmt = $conn->prepare("select count(*) as num from favorites where favorite_id = :var");
$stmt->bindValue(':var', $favAttraction);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result['num'] > 0) {
    echo '<p>' . "Deze attractie is al toegevoegd aan favorieten. U kunt hem verwijderen vanaf uw Profiel" . '</p>';
}else{
    $stmt = $conn->prepare("insert into favorites values(:user_id, :favorite_id)");
    $stmt->execute([
        ':user_id' =>$userid,
        ':favorite_id'  =>$favAttraction,
    ]);

    echo $favAttraction." is toegevoegd aan je favorietenlijst.";}

