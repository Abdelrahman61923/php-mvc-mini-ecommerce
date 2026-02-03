<?php

namespace App\Core;

class Middleware
{
    private static function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public static function auth()
    {
        self::startSession();
        if (!isset($_SESSION['user_id'])) {
            Flash::set('error', "You must login first.");
            header("Location: /php/mini-ecommerce/public/login");
            exit;
        }
    }

    public static function guest()
    {
        self::startSession();
        if (isset($_SESSION['user_id'])) {
            header("Location: /php/mini-ecommerce/public/dashboard");
            exit;
        }
    }
}
