<?php

namespace App\Controllers;

class BaseController
{
    protected function view(string $view, array $data = [], string $layout = 'auth')
    {
        extract($data);

        ob_start();
        require __DIR__ . '/../Views/' . $view . '.php';
        $content = ob_get_clean();

        require __DIR__ . '/../Views/layouts/' . $layout . '.php';
    }
}
