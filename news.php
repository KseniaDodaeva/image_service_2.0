<?php
namespace image;
use image\Session\SessionManager;
use PDO;
require_once "GetDB.php";
require_once "Session/SessionManager.php";
SessionManager::create();
class News extends GetDB
{

    public function viewS($access)
    {
        $selectAutUserDB = self::select()->prepare($access);
        $selectAutUserDB->execute(['id' => $_SESSION["id"]]);
    }

    public function view($query)
    {
        $sel = self::select()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <? foreach ($sel as $values) { ?>
        <div class="caption-bottom">
            <h2><? echo $values['user_name'] ?></h2>
            <a href="inst_photo/<?= $values['name'] ?>" target="_blank">
                <img src="inst_photo/<?= $values['name'] ?>"/>
            </a>
        </div>
        <?
        }
    }
}


$result = new News();
$result->viewS('SELECT * FROM `first_page` WHERE ID = :id');
$result->view('SELECT name, view, userid, user_name FROM `photo` JOIN `first_page` ON first_page.ID = photo.userid');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>Профиль</h2>
<form>
    <a href="load_form.php">Загрузить фото</a>
    <a href="Authorization_Registration/logout.php">Выход</a>
</form>

