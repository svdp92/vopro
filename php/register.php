<?php
$servername = "localhost";
$dbname = "phpop";
$username = "root";
$password = "";
$newuser = $_POST["newuser"];
$hashed_password = password_hash($_POST["newpassword"], PASSWORD_DEFAULT);

require_once "includes/databaseconnect.php";

$stmt = $conn->prepare("select count(*) as num from users where username = :newuser");
$stmt->bindValue(':newuser', $newuser);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);


if ($result['num'] > 0){
    echo '<p>'."Deze gebruikersnaam is bezet".'</p>';

}else{
    $sql = $conn->prepare("insert into users set username='".$newuser."', password='".$hashed_password."'");
    $sql->execute();
    echo '<p>'."Nieuwe gebruiker toegevoegd".'</p>';
}
