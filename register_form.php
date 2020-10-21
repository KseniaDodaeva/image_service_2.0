<?php
require_once __DIR__ . "/vendor/autoload.php";

use image\Session\SessionManager;
require_once "Session/SessionManager.php";
SessionManager::create();

?>
<!DOCTYPE html>
<html lang = "ru">
<head>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Регистрация</title>
</head>
<body>
<h3>Регистрация</h3>
<div>
    <form action="Authorization_Registration/register.php" method="post" enctype="multipart/form-data">
        <p>Логин</p>
        <input name="user_name" type="text" required><br>
        <p>Пароль</p>
        <input name="password" type="password" required><br>
        <input name="submit" type="submit" value="Зарегистрироваться"><br>
    </form>
    <form action="Authorization_Registration/authorization.php" target="_blank">
        <button>Авторизироваться</button>
    </form>
</div>
</body>

</html>