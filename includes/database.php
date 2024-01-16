<?php

$host = 'localhost';
$database = 'kiryan_bv';
$user = 'root';
$password = 'Faxrol01';

$db = mysqli_connect($host, $user, $password, $database)
    or die('Error: ' . mysqli_connect_error());

