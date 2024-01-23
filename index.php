<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

<nav>
    <img class="kiryan-logo" src="images/Logosafbeeldingen.png" alt="logo">
    <form class="search-bar" action="products-list.php">
        <input type="text" id="searchInput" name="search" placeholder="Zoek een product...">
        <input type="hidden" name="submit" value="submit">
    </form>
    <a href="shoppingcart.php">
        <img class="cart-logo" src="images/Kiryan B.V. Iconen winkelmand.png" alt="winkelmand">
    </a>
    <a href="login-customer.php">
        <img class="account-logo" src="images/Kiryan B.V. Iconen account.png" alt="account">
    </a>
</nav>

<main>
    <header>
    <h1>Stap in stijl met Kiryan BV</h1>
    </header>
</main>
<footer>
    <div class="footer-content">
        <img class="footer-logo" src="images/Logosafbeeldingen.png" alt="logo">

        <div class="kiryan-info">
            <p> Bloklandweg 1A
                4171 KA Herwijnen
                info@kiryanbv.nl</p>
        </div>
        <div class="footer-links">
            <a class="login-admin-link" href="login-admin.php" >
                Admin
            </a>
            <a href="contact.php">
                <img class="menu-logo" src="images/Kiryan B.V. Iconen contact.png" alt="menu">
            </a>
        </div>
    </div>
</footer>
</body>