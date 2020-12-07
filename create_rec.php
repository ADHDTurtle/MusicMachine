<?php
$name = $_POST['name'];
$tags = $_POST['tags'];
$rec = $_POST['rec'];

$file = fopen('recommendations.txt','a');
fwrite($file,"\n".$name."\n".$tags."\n".$rec."\n");
fclose($file);

header("Refresh:0 url=recommendations.php");
?>
