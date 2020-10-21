<?php
require_once "../vendor/autoload.php";

use image\SendTo;
use image\Session\SessionManager;
use image\Authorization_Registration\registration;
require_once ("../Session/SessionManager.php");
SessionManager::create();

$registration = registration::Check($_POST['user_name'], $_POST['password']);
if ($registration)
{
    SendTo::SendTo('../index.php');
}
else {
    SendTo::SendTo('../register_form.php');
}