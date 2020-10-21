<?php


namespace image;
require_once "GetDB.php";
require_once "Session/SessionManager.php";
use image\GetDB;
use image\Session\SessionManager;
class load_image
{
    protected static string $dir = "upload";
    protected static string $query = 'SELECT `name` FROM `photo`';
    protected static string $sql = 'INSERT INTO `photo` (`name`, `userid`) VALUES (?,?)';

    public static function Check($name, $userid)
    {
        $pdo = new GetDB();
        $pdo->select(self::$query);
        $pdo->insert(self::$sql, [$name, $userid]);
        return true;
    }

    public static function upload($image_name, $tmp_name)
    {
        $name = date_create_from_format('U.u', microtime(true))->format('Y-m-d_H-i-s_u');
        $full_path = self::getFullPath($image_name,$name);
        $status = move_uploaded_file($tmp_name, $full_path);

        if ($status === false)
        {
            return false;
        }

        $DB = new GetDB();
        $DB->executeAll('INSERT INTO `photo` (`name`, `userid`) VALUES (?,?)', [self::getName($image_name, $name), SessionManager::create()->user('userid')]);
        return true;

    }

    public static function getFullPath($image_name, $name): string
    {
        $filename = explode('.', $image_name);
        $extension = end($filename);
        return self::$dir . DIRECTORY_SEPARATOR. $name . "." . $extension;
    }

    public static function getName($image_name, $name): string
    {
        $filename = explode('.', $image_name);
        $extension = end($filename);
        return $name . "." . $extension;
    }
}
$total_files = count($_FILES['image']['name']);
for($i = 0 ; $i < $total_files ; $i++) {
    $success = load_image::upload($_FILES['image']['name'][$i], $_FILES['image']['tmp_name'][$i]);
}
header("Location: load_form.php");

