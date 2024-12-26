<?php
$connection = mysqli_connect('localhost', 'root', '', 'bank1');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
