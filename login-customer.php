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
            <div class="form-row">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email">
                <div class="form-error"></div>
            </div>
            <div class="form-row">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password">
                <div class="form-error"></div>
            </div>

            <button type="submit" name="submit" value="submit">Log in</button>
            <div>Of <a href="register-customer.php">maak een account</a></div>
        </form>
    </section>


</main>
</body>
</html>