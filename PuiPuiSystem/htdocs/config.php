<?php
// REF:https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'puipuiDBAdmin');
define('DB_PASSWORD', 'puipuiAdmin666');
define('DB_NAME', 'puipuisystemdb');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Couldn't connect. " . $e->getMessage());
}
?>