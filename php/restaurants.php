<?php
require_once "includes/header.php";

$json = file_get_contents('http://ginootten.nl/vopro/data.txt');
$obj = json_decode($json);

if (isset($_SESSION['user_name'])) {
    echo "<h1> Voeg uw favoriete horeca gelegenheid toe aan uw lijst.</h1>";
}else{
    echo "<h1>Registreer of Log in om horeca gelegenheden toe te voegen aan uw lijst</h1>";
}

foreach($obj->AttractionInfo AS $attraction ) {
    if($attraction->Type != 'Horeca'){
        continue;
    }
    echo "<p>"."$attraction->Id"."</p>";
    if (isset($_SESSION['user_name'])) {
        echo "<a class='add-button' href=\"./createFavorite.php?var=$attraction->Id\">Toevoegen</a>";
    }
    echo "</br>";
}