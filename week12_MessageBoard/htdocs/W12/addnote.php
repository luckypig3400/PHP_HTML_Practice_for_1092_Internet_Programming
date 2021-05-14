<?php
include "configure.php";

if (isset($_POST['msgTitle']) && isset($_POST['msgContent'])) {
    $title = $_POST['msgTitle'];
    $content = $_POST['msgContent'];

    $link = new PDO('mysql:host=' . $hostname . ';dbname=' . $database . ';charset=utf8', $username, $password);

    $query = "INSERT INTO `note` (`ID`, `Title`, `Description`, `Time`) VALUES (NULL,'" .
        $title . "','" . $content . "', current_timestamp());";
    //echo $query;
    $count = $link->exec($query); //execute SQL query

    header("Location: displaynote.php");
} else {
    echo "<h3>Error:</h3> variables not set";
}

?>