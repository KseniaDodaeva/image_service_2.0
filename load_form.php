<?php
require_once __DIR__ . "/vendor/autoload.php";
use image\GetDB;

$pdo = new GetDB();
$sql = 'SELECT * FROM `first_page` WHERE user_name = :ID';
$userData = $pdo->executeAll($sql, ['ID' => $_SESSION["ID"]])
?>
<!DOCTYPE html>

<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
foreach ($userData as $rowUserData) {
    ?>
    <h3><?= $rowUserData['user_name'] ?></h3>
<?php } ?>
<form action="load_image.php" method="post" enctype="multipart/form-data">
    <a href="news.php" class="green">Главная</a>
    <input type="file" name="image[]" multiple> <br>
    <input type="submit" value="Загрузить">
</form>
</body>
</html>