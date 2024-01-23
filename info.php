<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/your/css/file.css">
    <title>About Us | Kiryan B.V.</title>
</head>
<body>
<header>
    <h1>About Kiryan B.V.</h1>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="contact.php">Contact</a>
        <a href="register-customer.php">Klant registreren</a>
        <a href="login-customer.php">Klant login</a>
        <a href="login-admin.php">Admin login</a>
    </nav>
</header>

<main>
    <section class="format">
        <p>Discover a world of high-quality products at Kiryan B.V. We specialize in providing unique and stylish solutions for your spaces.</p>
    </section>

    <section class="contact-form">
        <h2>Contact Us</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </section>
</main>

<footer>
    <section class="contact-section">
        <h2>Contact Information</h2>
        <address>
            <p>Kiyran B.V.</p>
            <p>Bloklandweg 1A, 4171 KA Herwijnen</p>
            <p>Email: info@kiryanbv.nl</p>
        </address>
    </section>
</footer>
</body>
</html>
