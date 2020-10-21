<?php
require_once __DIR__ . "/vendor/autoload.php";
use image\Session\SessionManager;
require_once "Session/SessionManager.php";
SessionManager::create();
define('uploaded_path', $_SERVER['DOCUMENT_ROOT'].'/uploaded');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="Authorization_Registration/authorization.php" method="post">
    <h1>Авторизация</h1>
    <input type="text" placeholder="Введите логин" name="user_name" required>
    <input type="password" placeholder="Введите пароль" name="password" required>
    <button type="submit" class="registerbtn">Вход</button>
    <p>Нет аккаунта? <a href="register_form.php">Регистрация</a></p>
</form>
</body>
</html>

