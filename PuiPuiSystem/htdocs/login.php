<?php
//https://www.php.net/manual/en/function.password-hash.php
echo "ACC:adminPuiPui<br>PWD:";
echo password_hash("puipuiKawai", PASSWORD_DEFAULT);

echo "<br>algo2:";
echo password_hash("puipuiKawai", PASSWORD_BCRYPT);

echo "<br>algo3:";
echo password_hash("puipuiKawai", PASSWORD_ARGON2I);

echo "<br>algo4:";
echo password_hash("puipuiKawai", PASSWORD_ARGON2ID);

include "config.php";
$link = new PDO('mysql:host=' . $hostname . ";dbname=" . $database . ";charset=utf8", $username, $password);

$querySQL = 'SELECT * FROM User';
$result = $link->query($querySQL);

foreach ($result as $row) {
    
}
