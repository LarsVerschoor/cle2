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

    // get saved input
    $savedInput['email'] = $_POST['email'] ?? '';

    if (count($errors) === 0) {
        // retrieve customer from database
        $query = "SELECT * FROM customers WHERE email = '$postEmail'";
        $result = mysqli_query($db, $query);
        $databaseUser = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) === 0) {
            $errors['email'] = 'Dit e-mail adres is niet bij ons bekend';
        } else if (mysqli_num_rows($result) > 1) {
            $errors['general'] = 'Er is een fout opgetreden tijdens het inloggen. Neem contact op of probeer het later opnieuw.';
        } else {
            // Check for match
            $databasePassword = $databaseUser['password'];
            if (password_verify($postPassword, $databasePassword)) {
                // login
                $_SESSION['customer'] = $databaseUser['id'];
                header('Location: index.php');
                mysqli_close($db);
                exit;
            } else {
                $errors['password'] = 'Onjuist wachtwoord';
            }
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/authentication-customer.css">
    <title>Klant login | Kiryan B.V.</title>
</head>
<body>
<main>


    <section>
        <a class="back" href="index.php">Terug naar producten</a>

        <form action="" method="post">
            <h2>Klant login | Kiryan B.V.</h2>
            <div class="form-error"><?= $errors['general'] ?? '' ?></div>
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

            <button type="submit" name="submit" value="submit">Log in</button>
            <div>Of <a href="register-customer.php">maak een account</a></div>
        </form>
    </section>


</main>

<footer>
    Kiyran B.V.
    Bloklandweg 1A
    4171 KA Herwijnen
    info@kiryanbv.nl
</footer>



</body>
</html>