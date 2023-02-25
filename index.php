<?php

echo "Hello World!";
  
  
$ip = getenv('REMOTE_ADDR');

echo $ip;

$name = getenv("DBNAME");

echo $name;

?>
