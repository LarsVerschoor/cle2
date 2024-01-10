<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<?php
// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of de gebruikersnaam en het wachtwoord overeenkomen
    $gebruikersnaam = "gebruiker";
    $wachtwoord = "wachtwoord";

    if ($_POST["gebruikersnaam"] == $gebruikersnaam && $_POST["wachtwoord"] == $wachtwoord) {
        echo "<p>Welkom, $gebruikersnaam!</p>";
    } else {
        echo "<p>Ongeldige gebruikersnaam of wachtwoord.</p>";
    }
}
?>

<h2>Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="gebruikersnaam">Gebruikersnaam:</label>
    <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>

    <br>

    <label for="wachtwoord">Wachtwoord:</label>
    <input type="password" id="wachtwoord" name="wachtwoord" required>

    <br>

    <input type="submit" value="Login">
</form>

</body>
</html>