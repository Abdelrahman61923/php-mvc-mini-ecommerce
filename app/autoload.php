<?php

    spl_autoload_register(function ($class) {

        // App\Controllers\AuthController => Controllers/AuthController.php
        if (str_starts_with($class, 'App\\')) {
            $class = substr($class, 4);
        }

        $class = str_replace('\\', '/', $class);

        $file = __DIR__ . '/' . $class . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    });
