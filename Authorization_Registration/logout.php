<?php
require_once "../vendor/autoload.php";

use image\Session\SessionManager;
use image\SendTo;

SessionManager::create()->set('authorized', false);
SendTo::SendTo('../index.php');