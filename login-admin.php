<?php

    session_start();

//    if (isset($_SESSION['admin'])) {
//        header('Location: index.php');
//        exit;
//    }

    require_once('includes/database.php');
    /** @var mysqli $db */

    if (isset($_POST['submit'])) {
        // validation
        $errors = [];
        $savedInput = [];

        $postUsername = mysqli_escape_string($db, $_POST['username'] ?? '');
        $postPassword = $_POST['password'] ?? '';

        if ($postUsername === '') {
            $errors['username'] = 'Dit veld is verplicht';
        }
        if (strlen($postUsername) > 30) {
            $errors['username'] = 'Dit veld kan niet langer zijn dan 30 tekens';
        }
        if ($postPassword === '') {
            $errors['password'] = 'Dit veld is verplicht';
        }

        // set saved input
        $savedInput['username'] = $_POST['username'] ?? '';

        // get db user
        if (count($errors) === 0) {


            $query = "SELECT * FROM admins WHERE username = '$postUsername'";
            $result = mysqli_query($db, $query) or die();
            if (mysqli_num_rows($result) !== 1) {
                header('Location: error.php');
                mysqli_close($db);
                exit;
            }

            $databaseUser = mysqli_fetch_assoc($result);

            // compare with database password
            $match = password_verify($postPassword, $databaseUser['password']);

            if ($match) {
                $_SESSION['admin'] = $databaseUser['id'];
                header('Location: index.php');
                exit;
            }

            $errors['general'] = 'Gebruikersnaam of wachtwoord is incorrect';
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inloggen | Kiryan B.V.</title>
</head>
<body>


<section class="login-container">
    <div class="login">
        <form class="form-container" action="" method="post">
            <h2>Log In</h2>

            <div class="error"><?= $errors['general'] ?? '' ?></div>
            <div class="login-table">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" value="<?= $savedInput['username'] ?? '' ?>" required>
                <div class="error"><?= $errors['username'] ?? '' ?></div>
            </div>

            <div class="login-table">
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" required>
                <div class="error"><?= $errors['password'] ?? '' ?></div>
            </div>

            <button class="submit-button" name="submit" value="submit" type="submit">Log in</button>
        </form>
        <img src="images/man-met-duimen-omhoog_1154-467.avif
" alt="">

    </div>


</section>


</body>
</html>