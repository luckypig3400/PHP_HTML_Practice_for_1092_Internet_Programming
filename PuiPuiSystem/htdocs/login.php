<?php
//https://www.php.net/manual/en/function.hash.php

echo "<br>hash SHA512:";
echo hash("sha512", "puipuiKawai");

echo "<br>hash 'test' with SHA512:";
echo hash("sha512", "test");

include "config.php";
$link = new PDO('mysql:host=' . $hostname . ";dbname=" . $database . ";charset=utf8", $username, $password);

$querySQL = 'SELECT * FROM User';
$result = $link->query($querySQL);

foreach ($result as $row) {
}
