<?php

namespace App\Core;

class Flash
{
    private static function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public static function set($key, $message)
    {
        self::startSession();
        $_SESSION['flash_' . $key] = $message;
    }

    public static function get($key)
    {
        self::startSession();
        if (isset($_SESSION['flash_' . $key])) {
            $msg = $_SESSION['flash_' . $key];
            unset($_SESSION['flash_' . $key]);
            return $msg;
        }
        return null;
    }
}
