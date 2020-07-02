<html>
<body>
<?php
require_once "includes/header.php"
?>

</body>
</html>


<?php
$json = file_get_contents('http://ginootten.nl/vopro/data.txt');
$obj = json_decode($json);

foreach($obj->AttractionInfo AS $attraction )
{
    if($attraction->Type != 'Show') { continue; }
    echo $attraction->Id." " ;
}