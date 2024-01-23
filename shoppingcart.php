<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Kiryan B.V.</title>
    <link rel="stylesheet" href="css/shoppingcartcss.css">
    <!-- Voeg eventuele aanvullende stylesheets of meta tags hier toe -->
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
    <section class="hero-section">
        <h1>Welcome to Kiryan B.V.</h1>
        <p>Discover quality products to enhance your space.</p>
        <a href="#products" class="cta-button">Explore Products</a>
    </section>

    <section class="cart-section">
        <div id="cart">
            <h2>Shopping Cart</h2>
            <ul id="cart-items"></ul>
            <p>Total: €<span id="cart-total">0.00</span></p>
            <button onclick="checkout()">Checkout</button>
        </div>
    </section>

    <section id="products" class="products-section">
        <h1>Reserve Our Products</h1>

        <!-- Product 1 -->
        <article class="product" data-id="1" data-name="Acuarella Keramiek Tegels" data-price="16.25">
            <h3>Acuarella Keramiek Tegels</h3>
            <p><strong>Soort:</strong> Wand tegels</p>
            <p><strong>Prijs:</strong> €16.25 per vierkante meter</p>
            <p><strong>Materiaal:</strong> Keramiek</p>
            <div class="button-container">
                <a href="" target="_blank" class="button-assignment">Meer details</a>
            </div>
        </article>

        <!-- Product 2 -->
        <article class="product" data-id="2" data-name="Travertijn Natuur Tegels" data-price="50">
            <h4>Travertijn Natuur Tegels</h4>
            <p><strong>Soort:</strong> Tuin tegels</p>
            <p><strong>Prijs:</strong> €50,- per vierkante meter</p>
            <p><strong>Materiaal:</strong> Natuursteen</p>
            <div class="button-container">
                <a href="" target="_blank" class="button-assignment">Meer details</a>
            </div>
        </article>

        <!-- Product 3 -->
        <article class="product" data-id="3" data-name="Arabesque Tegels" data-price="44">
            <h5>Arabesque Tegels</h5>
            <p><strong>Soort:</strong> Vloer tegels</p>
            <p><strong>Prijs:</strong> €44,- per vierkante meter</p>
            <p><strong>Materiaal:</strong> Porselein</p>
            <div class="button-container">
                <a href="" target="_blank" class="button-assignment">Meer details</a>
            </div>
        </article>
    </section>
</main>

<footer>
    <div class="footer-content">
        <div class="contact-section">
            <h2>Contact Information</h2>
            <address>
                <p>Kiyran B.V.</p>
                <p>Bloklandweg 1A, 4171 KA Herwijnen</p>
                <p>Email: info@kiryanbv.nl</p>
            </address>
        </div>

        <div class="social-media-section">
            <h2>Connect With Us</h2>
            <ul>
                <li><a href="#" target="_blank">Facebook</a></li>
                <li><a href="#" target="_blank">Twitter</a></li>
                <li><a href="#" target="_blank">Instagram</a></li>
            </ul>
        </div>
    </div>

    <p>&copy; 2024 Kiryan B.V. All rights reserved.</p>
</footer>
</body>

</html>
