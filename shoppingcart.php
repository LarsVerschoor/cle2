<?php

session_start();

if (!isset($_SESSION['customer'])) {
    header('Location: login-customer.php');
    exit;
}

require_once ("includes/database.php");
/** @var mysqli $db */

$customer = $_SESSION['customer'];

if (isset($_POST['submit'])) {
    $productId = mysqli_escape_string($db, $_POST['product'] ?? '');
    if ($productId !== '') {
        $query = "INSERT INTO shopping_cart_items (product_id, customer_id, quantity) VALUES ('$productId', '$customer', 1)";
        mysqli_query($db, $query);
    }
}

$products = [];

$query = "SELECT * FROM shopping_cart_items s INNER JOIN customers ON customers.id = s.customer_id LEFT JOIN products ON s.product_id = products.id WHERE s.customer_id = $customer";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/shoppingcartcss.css">
    <title>Products | Kiryan B.V.</title>
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
            <ul id="cart-items">
                <?php foreach($products as $product): ?>
                <div style="border: 2px solid #000">
                    <h3>naam: <?= $product['name'] ?></h3>
                    <div>prijs: S€<?= $product['price'] ?></div>
                </div>
                <?php endforeach; ?>
            </ul>
            <p>Totaal: €<span id="cart-total">0.00</span></p>
            <button onclick="checkout()">Reserveren</button>
        </div>
    </section>
</main>

<footer>
    <section class="contact-section">
        <h2>Contactgegevens</h2>
        <address>
            <p>Kiyran B.V.</p>
            <p>Bloklandweg 1A, 4171 KA Herwijnen</p>
            <p>Email: info@kiryanbv.nl</p>
        </address>
    </section>
</footer>
</body>
</html>
