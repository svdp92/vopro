



<?php
$json = file_get_contents('http://ginootten.nl/vopro/data.txt');
$obj = json_decode($json);

foreach($obj->AttractionInfo AS $attraction )
{
    echo "<p><span> lelijk ";
    if($attraction->Type != 'Show') { continue; }
    echo $attraction->Id." " ;
    echo "</span></p>";
}
?>

