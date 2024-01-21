<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

require_once('includes/database.php');
/** @var mysqli $db */

$errors = [];
$savedInput = [];
if (isset($_POST['submit'])) {
    $material_name = mysqli_escape_string($db, $_POST['material_name'] ?? '');
    $material_description = mysqli_escape_string($db, $_POST['material_description'] ?? '');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nieuw materiaal | Kiryan B.V.</title>
</head>
<body>
<form action="" method="post">
    <h2>Materiaal toevoegen [admin]</h2>
    <div class="form-row">
        <label for="material_name">Materiaal naam</label>
        <input type="text" id="material_name" name="material_name" value="<?= htmlentities($savedInput['material_name']) ?>">
        <div class="form-error"><?= $errors['material_name'] ?? '' ?></div>
    </div>
    <div class="form-row">
        <label for="material_description">Materiaal beschrijving</label>
        <textarea name="material_description" id="material_description" cols="30" rows="8"><?= htmlentities($savedInput['material_description']) ?></textarea>
        <div class="form-error"><?= $errors['material_description'] ?? '' ?></div>
    </div>
    <button>Materiaal toevoegen</button>
</form>
</body>
</html>
