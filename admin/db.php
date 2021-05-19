<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "hosteldekho";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Failed to Connect " . mysqli_connect_error());
} else {
    //  echo "Connection Established";
}
?>