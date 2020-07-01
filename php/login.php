<?php
session_start();

require 'databaseconnect.php';

if(isset($_POST['login'])){
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT user_id, password, username FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user === false){
        echo "gebruikersnaam is niet bekend";
    } else{
        $validPassword = password_verify($passwordAttempt, $user['password']);

        if($validPassword){
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['username'];
            $_SESSION['logged_in'] = time();
            header('Location: index.php');
            exit;

        } else{
            echo "incorrect wachtwoord";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="../CSS/style.css" rel="stylesheet">
</head>
<body>
<nav class="topnav">
    <form method="post" action="login.php">
        <label for="username">Gebruikersnaam</label>
        <input type="text" id="gebruikersnaam" name="username" placeholder="gebruikersnaam">
        <label for="password">Wachtwoord</label>
        <input type="text" id="password" name="password" placeholder="wachtwoord">
        <button type="submit" name="login" value="login">Log in</button>
        <a href="register.php">Registreren</a>
    </form>
</nav>

</body>
</html>
