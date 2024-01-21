<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

require_once('includes/database.php');
/** @var mysqli $db */

// get categories & materials
$categoriesQuery = "SELECT id, name FROM categories";
$categoriesResult = mysqli_query($db, $categoriesQuery);
$categories = [];
while($row = mysqli_fetch_assoc($categoriesResult)) {
    $categories[] = $row;
}

$materialsQuery = "SELECT id, name FROM materials";
$materialsResult = mysqli_query($db, $materialsQuery);
$materials = [];
while ($row = mysqli_fetch_assoc($materialsResult)) {
    $materials[] = $row;
}

// If post submitted
$savedInput = [];
$errors = [];
if (isset($_POST['submit'])) {
    // validation
    $product_name = mysqli_escape_string($db, $_POST['product_name'] ?? '');
    $product_description = mysqli_escape_string($db, $_POST['product_description'] ?? '');
    $product_unit = mysqli_escape_string($db, $_POST['product_unit'] ?? '');
    $product_price = mysqli_escape_string($db, $_POST['product_price'] ?? '');
    $product_image = mysqli_escape_string($db, $_POST['product_image'] ?? '');
    $product_material = mysqli_escape_string($db, $_POST['product_material'] ?? '');
    $product_category = mysqli_escape_string($db, $_POST['product_category'] ?? '');
    $product_stock = mysqli_escape_string($db, $_POST['product_stock'] ?? '');
    $product_available = isset($_POST['product_available']) ? 1 : 0;

    $savedInput['product_name'] = $product_name;
    $savedInput['product_description'] = $product_description;
    $savedInput['product_unit'] = $product_unit;
    $savedInput['product_price'] = $product_price;
    $savedInput['product_material'] = $product_material;
    $savedInput['product_category'] = $product_category;
    $savedInput['product_stock'] = $product_stock;
    $savedInput['product_available'] = $product_available;

    if ($product_name === '') {
        $errors['product_name'] = 'Dit veld kan niet leeg zijn.';
    }
    if (strlen($product_name) > 255) {
        $errors['product_name'] = 'Dit veld kan niet langer zijn dan 255 tekens (nu ' . strlen($product_name) . ' tekens)';
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

    $targetDir = "uploads/";
    $fileName = basename($product_name);

    $targetFile = $targetDir . $fileName;
    if (count($errors) === 0) {
        if ($_FILES["product_image"]["error"] == 0) {
            if (!move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
                $errors['product_image'] = 'Deze afbeelding werkt niet.';
            }
        } else {
            $errors['product_image'] = 'Deze afbeelding werkt niet.';
        }
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
                '$targetFile',
                '$product_price',
                '$product_unit',
                '$product_material',
                '$product_category',
                '$product_stock',
                '$product_available'
            )";
    }
}

mysqli_close($db);

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
<form action="" method="post" enctype="multipart/form-data">
    <h2>Product toevoegen [admin]</h2>
    <div class="form-row">
        <label for="product_name">Product naam</label>
        <input type="text" id="product_name" name="product_name" value="<?= htmlentities($savedInput['product_name'] ?? '') ?>">
        <div class="form-error"><?= $errors['product_name'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_description">Product beschrijving</label>
        <textarea name="product_description" id="product_description" rows="8" cols="30"><?= htmlentities($savedInput['product_description'] ?? '') ?></textarea>
        <div class="form-error"><?= $errors['product_description'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_unit">Product eenheid (bijv. m²)</label>
        <input type="text" id="product_unit" name="product_unit"  value="<?= htmlentities($savedInput['product_unit'] ?? '') ?>">
        <div class="form-error"><?= $errors['product_unit'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_price">Product prijs per eenheid €</label>
        <input type="number" step="0.01" id="product_price" name="product_price" value="<?= htmlentities($savedInput['product_price'] ?? '') ?>">
        <div class="form-error"><?= $errors['product_price'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_image">Product afbeelding</label>
        <input type="file" id="product_image" name="product_image" accept="image/*">
        <div class="form-error"><?= $errors['product_image'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_material">Product materiaal</label>
        <select name="product_material" id="product_material">
            <?php foreach($materials as $index => $material): ?>
            <option value="<?= htmlentities($material['id']) ?>" <?= ($savedInput['product_material'] ?? '') === $material['id'] ? 'selected' : '' ?>><?= htmlentities($material['name']) ?></option>
            <?php endforeach; ?>
        </select>
        <div class="form-error"><?= $errors['product_material'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_category">Product categorie</label>
        <select name="product_category" id="product_category">
            <?php foreach($categories as $index => $category): ?>
            <option value="<?= htmlentities($category['id']) ?>" <?= ($savedInput['product_category'] ?? '') === $category['id'] ? 'selected' : '' ?>><?= htmlentities($category['name']) ?></option>
            <?php endforeach; ?>
        </select>
        <div class="form-error"><?= $errors['product_category'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_stock">Product voorraad (Eenheden te reserveren)</label>
        <input type="number" step="1" id="product_stock" name="product_stock" value="<?= htmlentities($savedInput['product_stock'] ?? '') ?>">
        <div class="form-error"><?= $errors['product_stock'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="product_available">Product beschikbaar (Reserveren mogelijk)</label>
        <input type="checkbox" id="product_available" name="product_available" <?= ($savedInput['product_available'] ?? '') == 1 ? 'checked' : '' ?>>
        <div class="form-error"><?= $errors['product_available'] ?? '' ?></div>
    </div>
    <button type="submit" name="submit" value="submit">Product toevoegen</button>
</form>
</body>
</html>
