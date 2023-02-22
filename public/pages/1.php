<?php

$json = '{"foo":"bar"}';
$json = json_decode($json);
$json = get_object_vars($json);
// print_r($json);

echo "it is ".$json['foo'];

?>