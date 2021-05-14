<?php
include "configure.php";

if (isset($_POST["msgID"])) {
    $id = $_POST["msgID"];

    $link = new PDO('mysql:host=' . $hostname . ';dbname=' . $database . ';charset=utf8', $username, $password);

    $query = "DELETE FROM `note` WHERE `note`.`ID` = " . $id;

    $deleted = $link->exec($query);

    header("Location: displayNote.php");
}else{
    echo "<h3>Error: ID not specified</h3>";
}

?>