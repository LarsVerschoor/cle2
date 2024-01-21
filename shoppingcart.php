<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/shoppingcartcss.css">
    <title>Products | Kiryan B.V.</title>
</head>
<body>
<header>
<nav class="navbar">
    <a href="">link</a>
    <a href="">link</a>
    <a href="register-customer.php">Klant registreren</a>
    <a href="login-customer.php">klant login</a>
    <a href="login-admin.php">Admin login</a>
</nav>
</header>
<main>

    <div id="cart">
        <h2>Winkelwagen</h2>
        <ul id="cart-items"></ul>
        <p>Totaal: €<span id="cart-total">0.00</span></p>
        <button onclick="checkout()">Uitchecken</button>
    </div>

    <div id="products">
        <div class="product" data-id="1" data-name="Product 1" data-price="16.25">
            <h4><b>Naam:<b/> wand tegel Acuarella</h4>
            <p><b>Omschrijving:</b> formaat 10 x 40 x 1 cm, 3 M² per pak, 15 kg per M², kleur beige, vorm rechthoek, oppervlak glanzend</p>
            <p><b>Prijs:</b> €16,25 per M²</p>
            <button onclick="addToCart(1)"><b>Toevoegen aan winkelwagen<b/></button>
        </div>

        <div class="product" data-id="2" data-name="Product 2" data-price="29.99">
            <h2>Product 2</h2>
            <p><b>Omschrijving:</b></p>
            <p>€29.99</p>
            <button onclick="addToCart(1)"><b>Toevoegen aan winkelwagen<b/></button>
        </div>
    </div>

    <script>
        let cart = [];

        function addToCart(productId) {
            const product = document.querySelector(`[data-id="${productId}"]`);
            const id = product.dataset.id;
            const name = product.dataset.name;
            const price = parseFloat(product.dataset.price);

            const item = {
                id: id,
                name: name,
                price: price
            };

            cart.push(item);
            updateCart();
        }

        function updateCart() {
            const cartItemsElement = document.getElementById('cart-items');
            const cartTotalElement = document.getElementById('cart-total');

            cartItemsElement.innerHTML = '';
            let total = 0;

            cart.forEach(item => {
                const listItem = document.createElement('li');
                listItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;
                cartItemsElement.appendChild(listItem);
                total += item.price;
            });

            cartTotalElement.textContent = total.toFixed(2);

            const cartElement = document.getElementById('cart');
            cartElement.style.display = 'block';
        }

        function checkout() {
            alert('U bent uitgechekt');

            cart = [];
            updateCart();
        }
    </script>

</main>
<footer>
    Kiyran B.V.
    Bloklandweg 1A
    4171 KA Herwijnen
    info@kiryanbv.nl
</footer>
</body>
</html>