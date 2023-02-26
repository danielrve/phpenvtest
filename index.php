<?php

echo "Hello World!";
  
echo "<BR>";
  
$ip = getenv('REMOTE_ADDR');

echo $ip;
echo "<BR>";

$son = $_ENV['DBNAME'];

echo $son;
echo "<BR>";

$son = $_ENV['DANIEL'];

echo $son;
echo "<BR>";

$son = getenv('DANIEL');

echo $son;
echo "<BR>";
?>
