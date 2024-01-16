<?php

session_start();
require_once('includes/database.php');
/** @var mysqli $db */

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

// get categories & materials
$categoriesQuery = "
SELECT id, name FROM categories";


$savedInput = [];
$errors = [];

if (isset($_POST['submit'])) {
    // validation
    $product_name = $_POST['product_name'] ?? '';
    $product_description = $_POST['product_description'] ?? '';
    $product_unit = $_POST['product_unit'] ?? '';
    $product_price = $_POST['product_price'] ?? '';
    $product_image = $_POST['product_image'] ?? '';
    $product_material = $_POST['product_material'] ?? '';
    $product_category = $_POST['product_category'] ?? '';
    $product_stock = $_POST['product_stock'] ?? '';
    $product_available = $_POST['product_available'] ? 1 : 0;

    if ($product_name === '') {
        $errors['product_name'] = 'Dit veld kan niet leeg zijn.';
    }
    if (strlen($product_name) > 255) {
        $errors['product_name'] = 'Dit veld kan niet langer zijn dan 255 tekens (nu ' . strlen($productName) . ' tekens)';
    }
;
    if ($product_description === '') {
        $errors['product_description'] = 'Dit veld kan niet leeg zijn.';
    }
    if ($product_unit === '') {
        $errors['product_unit'] = 'Dit veld kan niet leeg zijn.';
    }
    if (strlen($product_unit) > 100) {
        $errors['product_unit'] = 'Dit veld kan niet langer zijn dan 100 tekens (nu ' . strlen($product_unit) . ' tekens';
    }
    if ($product_price === '') {
        $errors['product_price'] = 'Dit veld kan niet leeg zijn.';
    }
    if ($product_image === '') {
        $errors['product_image'] = 'Dit veld kan niet leeg zijn.';
    }
    if ($product_material === '') {
        $errors['product_material'] = 'Dit veld kan niet leeg zijn';
    }
    if ($product_category === '') {
        $errors['product_category'] = 'Dit veld kan niet leeg zijn';
    }
    if ($product_stock === '') {
        $errors['product_stock'] = 'Dit veld kan niet leeg zijn';
    }

    if (count($errors) === 0) {
        $query =
            "INSERT INTO products (
                name,
                description,
                image,
                price,
                unit,
                material_id,
                category_id,
                stock,
                available
            ) VALUES (
                '$product_name',
                '$product_description',
                '$product_image',
                '$product_price',
                '$product_unit',
                '$product_material',
                '$product_category',
                '$product_stock',
                '$product_available'
            )";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product toevoegen | Kiryan B.V.</title>
    <style>
        .form-error:not(:empty) {
            background-color: #ff8a8a;
            color: #8a0000;
            border: 2px solid #8a0000;
            padding: .2rem .4rem;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <h2>Product toevoegen [admin]</h2>
    <div class="form-row">
        <label for="product_name">Product naam</label>
        <input type="text" id="product_name" name="product_name">
        <div class="form-error"><?= $errors['product_name'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_description">Product beschrijving</label>
        <textarea name="product_description" id="product_description" rows="8" cols="30"></textarea>
        <div class="form-error"><?= $errors['product_description'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_unit">Product eenheid (bijv. m²)</label>
        <input type="text" id="product_unit" name="product_unit">
        <div class="form-error"><?= $errors['product_unit'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_price">Product prijs per eenheid €</label>
        <input type="number" step="0.01" id="product_price" name="product_price">
        <div class="form-error"><?= $errors['product_price'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_image">Product afbeelding</label>
        <input type="file" id="product_image" name="product_image">
        <div class="form-error"><?= $errors['product_image'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_material">Product materiaal</label>
        <select name="product_material" id="product_material">
            <option value="steen">Steen</option>
        </select>
        <div class="form-error"><?= $errors['product_material'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_category">Product categorie</label>
        <select name="product_category" id="product_category">
            <option value="tuintegels">tuintegels</option>
        </select>
        <div class="form-error"><?= $errors['product_category'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_stock">Product voorraad (Eenheden te reserveren)</label>
        <input type="number" step="1" id="product_stock" name="product_stock">
        <div class="form-error"><?= $errors['product_stock'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_available">Product beschikbaar (Reserveren mogelijk)</label>
        <input type="checkbox" id="product_available" name="product_available">
        <div class="form-error"><?= $errors['product_available'] ?? '' ?></div>
    </div>
    <button type="submit" name="submit" value="submit">Voeg product toe</button>
</form>
</body>
</html>
