<?php

namespace image\Authorization_Registration;

use image\Session\SessionManager;
use image\GetDB;

class registration
{
   protected static string $query = 'SELECT `user_name` FROM `first_page`';
   protected static string $sql = 'INSERT INTO `first_page`(`user_name`, `password`) VALUES (?,?)';

   public static function Check($user_name, $password)
   {
       $pdo = new GetDB();
       $pdo->select(self::$query);
       $pdo->insert(self::$sql, [$user_name, $password]);
       return true;
   }
}