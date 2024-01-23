<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Kiryan B.V.</title>
    <link rel="stylesheet" href="css/shoppingcartcss.css">
    <!-- Add your additional stylesheets or meta tags here -->
</head>

<body>
<header>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="contact.php">Contact</a>
        <a href="register-customer.php">Klant registreren</a>
        <a href="login-customer.php">Klant login</a>
        <a href="login-admin.php">Admin login</a>
    </nav>
</header>

<main>
    <section class="cart-section">
        <div id="cart">
            <h2>Winkelwagen</h2>
            <ul id="cart-items"></ul>
            <p>Totaal: €<span id="cart-total">0.00</span></p>
            <button onclick="checkout()">Uitchecken</button>
        </div>
    </section>

    <section class="products-section">
        <h1>Reserveer Onze Producten</h1>

        <article class="product" data-id="1" data-name="Product 1" data-price="16.25">
            <h2>Wandtegel Acuarella</h2>
            <p><strong>Omschrijving:</strong> Formaat 10 x 40 x 1 cm, 3 M² per pak, 15 kg per M², kleur beige, vorm rechthoek, oppervlak glanzend</p>
            <p><strong>Prijs:</strong> €16,25 per M²</p>
            <button onclick="addToCart(1)">Reserveer</button>
        </article>

        <article class="product" data-id="2" data-name="Product 2" data-price="29.99">
            <h2>Product 2</h2>
            <p><strong>Omschrijving:</strong> (Voeg hier de beschrijving toe)</p>
            <p><strong>Prijs:</strong> €29,99</p>
            <button onclick="addToCart(2)">Reserveer</button>
        </article>
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
