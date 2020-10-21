<?php

namespace image\Session;
require_once "SessionHandler.php";
class SessionManager
{
    protected static ?SessionManager $instance = null;

    private function __construct()
    {
        session_set_save_handler(new SessionHandler(), true);
        session_save_path(__DIR__ . DIRECTORY_SEPARATOR);
        session_start();
        $_SESSION['authorized'] ??= false;
    }

    public static function create()
    {
        if (is_null(self::$instance))
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function user(?string $field = null)
    {
        if(is_null($field)){
            return $_SESSION['user'] ?? null;
        }
        return $_SESSION['user'][$field] ?? null;
    }

}