<?php
require_once "includes/header.php";

$json = file_get_contents('http://ginootten.nl/vopro/data.txt');
$obj = json_decode($json);

foreach($obj->AttractionInfo AS $attraction ) {
    if($attraction->Type != 'Attraction'){
        continue;
    }
    echo "$attraction->Id";
    echo "<a href=\"./createFavorite.php?var=$attraction->Id\">Click me!</a>";
}