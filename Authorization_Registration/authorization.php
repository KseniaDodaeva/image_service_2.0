<?php
namespace image;
require_once "../vendor/autoload.php";
use image\Session\SessionManager;
use image\SendTo;
use image\GetDB;
$pdo = new GetDB();

$sql = 'SELECT `ID`, `user_name`, `password` FROM `first_page` WHERE user_name = :ID';
$options = [':ID'=>$_POST['user_name']];
$user = $pdo->execute($sql, $options);
if ($_POST['password'] != $user['password'])
{
    $_SESSION['errors']['user_name'] = "Проверьте правильность введенного пароля";
    SendTo::SendTo('../index.php');
}else{
    SessionManager::create()->set('authorized', true);
    SessionManager::create()->set('user', $user);
    SendTo::SendTo('../news.php');
}