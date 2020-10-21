<?php
require_once "vendor/autoload.php";
use image\GetDB;
use image\SendTo;
use image\load_image;

$pdo = new GetDB();
$sql = 'INSERT INTO `photo` (`name`, `userid`) VALUES (?,?)';
$userData = $pdo->executeAll($sql, ['ID' => $_SESSION["ID"]]);
$load = load_image::Check($_POST['name'], $_POST['userid']);
if($load){
    SendTo::SendTo('news.php');
} else
{
    SendTo::SendTo('load_form.php');
}