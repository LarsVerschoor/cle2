<?php

session_start();

require_once ("includes/database.php");
/** @var mysqli $db */

$products = [];
$search = mysqli_escape_string($db, $_GET['search'] ?? '');
//if (isset($_GET["submit"])){
//    $search = $_GET["search"]?? "";
    $query = "SELECT products.id, products.name, products.description, products.unit, products.price, materials.name AS material_name FROM products LEFT JOIN materials ON products.material_id = materials.id WHERE products.name LIKE '%$search%'";
    $searchResult = mysqli_query($db, $query);

    while($row = mysqli_fetch_assoc($searchResult)) {
        $products[] = $row;
    }
//}



$categoriesQuery = "SELECT id, name FROM categories";
$categoriesResult = mysqli_query($db, $categoriesQuery);
$categories = [];
while($row = mysqli_fetch_assoc($categoriesResult)) {
    $categories[] = $row;
}




?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

<nav>
    <img class="kiryan-logo" src="images/Logosafbeeldingen.png" alt="logo">
        <form class="search-bar" action="">
    <input name="search" type="text" id="searchInput" placeholder="Zoek een product..." value="<?= htmlentities($_GET['search'] ?? '') ?>">
<!--            <button name="submit" value="submit" type="submit">Zoeken</button>-->
            <input type="hidden" name="submit" value="submit">
        </form>
    <a href="">
        <img class="cart-logo" src="images/Kiryan B.V. Iconen winkelmand.png" alt="winkelmand">
    </a>
    <a href="login-customer.php">
        <img class="account-logo" src="images/Kiryan B.V. Iconen account.png" alt="account">
    </a>
</nav>

<main>
    <header>
        <section class="homepage">
            <div>
                <section class="product-section">
                    <h2> Alle producten </h2>
                    <div class="products">
                        <?= count($products) === 0 ? 'Geen producten gevonden' : '' ?>
                        <?php foreach($products as $product): ?>

                        <form class="product-article" method="post" action="shoppingcart.php">
                            <div class="product-card">

                                <h3><?= $product['name'] ?></h3>
                                <p><?= $product['description'] ?></p>
                                <p>Prijs: €<?= $product['price'] ?> per <?= $product['unit'] ?></p>
                                <p> Materiaal: <?= $product['material_name'] ?></p>
                                <div class="button-container">
                                    <input type="hidden" name="product" value="<?= $product['id'] ?>">
                                    <button class="button-assignment" type="submit" name="submit" value="submit">Reserveren</button>
                                </div>
                            </div>

                        </form>

                        <?php endforeach; ?>

<!--                        <article class="product-article">-->
<!--                            <div class="product-card">-->
<!--                                <img src="https://www.hegobuiten.nl/lcms2/RESIZE/w1920-h1920-q80/bestanden/cache/store/hego/73989/travertin-economix-203x203x3-cm-soft-finish.jpg"-->
<!--                                     alt="Travertijn-tegels">-->
<!---->
<!--                                <h4>Travertijn natuur tegels</h4>-->
<!--                                <p>Soort: Tuin tegels</p>-->
<!--                                <p>Prijs: €50,- per vierkante meter</p>-->
<!--                                <p>Materiaal: Natuursteen</p>-->
<!--                                <div class="button-container">-->
<!--                                    <a href="" target="_blank" class="button-assignment">Meer details</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        </article>-->
<!---->
<!--                        <article class="product-article">-->
<!--                            <div class="product-card">-->
<!--                                <img src="https://cdn.webshopapp.com/shops/322791/files/404849059/image.jpg"-->
<!--                                     alt="Arabesque-tegels">-->
<!---->
<!--                                <h5>Arabesque tegels</h5>-->
<!--                                <p>Soort: Vloer tegels</p>-->
<!--                                <p>Prijs: €44,- per vierkante meter</p>-->
<!--                                <p>Materiaal: Porselein</p>-->
<!--                                <div class="button-container">-->
<!--                                    <a href="" target="_blank" class="button-assignment">Meer details</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        </article>-->
                    </div>
                </section>
            </div>
        </section>
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