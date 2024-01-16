<?php

session_start();

require_once('includes/database.php');
/** @var mysqli $db */

$errors = [];
$savedInput = [];

if (isset($_POST['submit'])) {
    // validation

    $postEmail = mysqli_escape_string($db, $_POST['email'] ?? '');
    $postPassword = $_POST['password'] ?? '';

    if ($postEmail === '') {
        $errors['email'] = 'Dit veld is verplicht';
    }
    if (strlen($postEmail) > 255) {
        $errors['email'] = 'Dit veld kan niet langer zijn dan 255 tekens (' . strlen($postEmail) . ')';
    }
    if ($postPassword === '') {
        $errors['password'] = 'Dit veld is verplicht';
    }

    // set saved input
    $savedInput['email'] = $_POST['email'] ?? '';

    // check duplicate emails
    if (!isset($errors['email'])) {
        $query = "SELECT * FROM customers WHERE email = '$postEmail'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) !== 0) {
            $errors['email'] = 'Deze e-mail is al in gebruik op onze website';
        }
    }


    // HASH password
    if (count($errors) === 0) {
        $hashedPassword = password_hash($postPassword, PASSWORD_DEFAULT);

        // INSERT INTO DATABASE
        $query = "INSERT INTO customers (email, password) VALUES ('$postEmail', '$hashedPassword')";
        mysqli_query($db, $query);

        // Redirect to index
        header('Location: login-customer.php');
        mysqli_close($db);
        exit;
    }

}

mysqli_close($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/authentication-customer.css">
    <title>klant registreren | Kiryan B.V.</title>
</head>
<body>
<main>


    <section>
        <a class="back" href="index.php">Terug naar producten</a>

        <form action="" method="post">
            <h2>Klant registratie | Kiryan B.V.</h2>
            <div class="form-row">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" value="<?= $savedInput['email'] ?? '' ?>">
                <div class="form-error"><?= $errors['email'] ?? '' ?></div>
            </div>
            <div class="form-row">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password">
                <div class="form-error"><?= $errors['password'] ?? '' ?></div>
            </div>

            <button type="submit" name="submit" value="submit">Maak account</button>
            <div>Of <a href="login-customer.php">login</a></div>
        </form>
    </section>


</main>
</body>
</html>