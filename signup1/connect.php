<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'signupforms';

$connection = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


?>