<?php

echo "Hello World!";
  
echo "<BR>";
  
$ip = getenv('REMOTE_ADDR');

echo $ip;
echo "<BR>";

$son = getenv('LASTNAME');

echo $son;
echo "<BR>";

$name = getenv("DBNAME");

echo $name;
echo "<BR>";
?>
