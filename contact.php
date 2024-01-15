<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contactpagina.css">
    <title>Contact | Kiryan B.V.</title>
</head>

<body>

  <header>
        <h1>Contacteer Ons</h1>
    </header>

    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </nav>


    <section>
        <div class="contact-form">
            <form class="format">
                <div class="form-group">
                    <label for="name">Naam:</label>
                    <input type="text" id="name" name="name" placeholder="Voer je naam in" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="Voer je e-mailadres in" required>
                </div>
                <div class="form-group">
                    <label for="message">Bericht:</label>
                    <textarea id="message" name="message" placeholder="Typ hier je bericht" rows="5" required></textarea>
                </div>
                <button class="submit-button" type="submit">Verstuur</button>
            </form>
        </div>
    </section>

    <footer>
Kiyran B.V.
Bloklandweg 1A
        4171 KA Herwijnen
        info@kiryanbv.nl
</footer>

</body>

</html>
