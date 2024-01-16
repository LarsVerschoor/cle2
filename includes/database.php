<?php

$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $envVariables = parse_ini_file($envFile);
    foreach ($envVariables as $key => $value) {
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

$host = $_ENV['DATABASE_HOST'];
$database = $_ENV['DATABASE_NAME'];
$user = $_ENV['DATABASE_USER'];
$password = $_ENV['DATABASE_PASSWORD'];

$db = mysqli_connect($host, $user, $password, $database)
    or die('Error: ' . mysqli_connect_error());

