<?php

session_start();

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
    <input type="text" id="searchInput" placeholder="Zoek een product...">
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
                <form action="" class="filter-form">
                    <div class="custom-select" style="width:200px;">
                        <label for="tegelsoorten">Filter op tegels:</label>
                        <select name="tiles" id="tiles">
                            <option value="floor-tiles">Vloer tegels</option>
                            <option value="garden-tiles">Tuin tegels</option>
                            <option value="wall-tiles">Wand tegels</option>
                            <option value="mosaic">Mozaiek tegels</option>
                        </select>
                    </div>
                    <br><br>
                    <input type="submit" value="Submit">
                </form>
                <button class="toggleFormBtn" id="toggleFormBtn">Filter</button>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var form = document.querySelector('.filter-form');
                        var toggleFormBtn = document.getElementById('toggleFormBtn');

                        toggleFormBtn.addEventListener('click', function () {
                            form.style.display = (form.style.display === 'none') ? 'block' : 'none';
                        });
                    });
                </script>
                <section class="product-section">
                    <h2> Alle producten </h2>
                    <div class="products">


                        <article class="product-article">
                            <div class="product-card">
                                <img src="https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/384099332_6386599158118438_6969631507200926178_n.jpg?stp=dst-jpg_p843x403&_nc_cat=105&ccb=1-7&_nc_sid=dd5e9f&_nc_ohc=6RraxetEVwYAX_QXdKN&_nc_ht=scontent-ams2-1.xx&oh=00_AfDtXm_sefinvAfUKNP53Dl_KDvjuCwiUmkJKYu8UXEwGA&oe=65AA49C8"
                                     alt="Acuarella-tegels">

                                <h3>Acuarella keramiek tegels</h3>
                                <p>Soort: Wand tegels</p>
                                <p>Prijs: €16,25 per vierkante meter</p>
                                <p> Materiaal: Keramiek </p>
                                <div class="button-container">
                                    <a href="" target="_blank" class="button-assignment">Meer details</a>
                                </div>
                            </div>

                        </article>

                        <article class="product-article">
                            <div class="product-card">
                                <img src="https://www.hegobuiten.nl/lcms2/RESIZE/w1920-h1920-q80/bestanden/cache/store/hego/73989/travertin-economix-203x203x3-cm-soft-finish.jpg"
                                     alt="Travertijn-tegels">

                                <h4>Travertijn natuur tegels</h4>
                                <p>Soort: Tuin tegels</p>
                                <p>Prijs: €50,- per vierkante meter</p>
                                <p>Materiaal: Natuursteen</p>
                                <div class="button-container">
                                    <a href="" target="_blank" class="button-assignment">Meer details</a>
                                </div>
                            </div>

                        </article>

                        <article class="product-article">
                            <div class="product-card">
                                <img src="https://cdn.webshopapp.com/shops/322791/files/404849059/image.jpg"
                                     alt="Arabesque-tegels">

                                <h5>Arabesque tegels</h5>
                                <p>Soort: Vloer tegels</p>
                                <p>Prijs: €44,- per vierkante meter</p>
                                <p>Materiaal: Porselein</p>
                                <div class="button-container">
                                    <a href="" target="_blank" class="button-assignment">Meer details</a>
                                </div>
                            </div>

                        </article>
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