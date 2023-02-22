<?php
// $myfile = fopen("1.jpg", "r");
header('Content-Type: image/jpg'); 
// echo fread($myfile,filesize("1.jpg"));
$im = imagecreate("1.jpg");
imagejpg($im);
?>