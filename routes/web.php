<?php

use App\Core\Middleware;
use App\Controllers\AuthController;
use App\Controllers\Dashboard\ProductsController;
use App\Controllers\Dashboard\DashboardController;
use App\Controllers\Dashboard\CategoriesController;

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch ($path) {
        case '/php/mini-ecommerce/public/':
            echo "Home Page";
            break;
        
        case '/php/mini-ecommerce/public/login':
            (new AuthController())->login();
            break;
        
        case '/php/mini-ecommerce/public/register':
            (new AuthController())->register();
            break;

        case '/php/mini-ecommerce/public/logout':
            (new AuthController())->logout();
            break;

        case '/php/mini-ecommerce/public/dashboard':
            Middleware::auth();
            (new DashboardController())->index();
            break;
        
        // Categories Route
        case '/php/mini-ecommerce/public/dashboard/categories':
            Middleware::auth();
            (new CategoriesController())->index();
            break;

        case '/php/mini-ecommerce/public/dashboard/categories/create':
            Middleware::auth();
            (new CategoriesController())->create();
            break;

        case '/php/mini-ecommerce/public/dashboard/categories/edit':
            Middleware::auth();
            $id = $_GET['id'] ?? null;
            if($id) (new CategoriesController())->edit($id);
            break;

        case '/php/mini-ecommerce/public/dashboard/categories/delete':
            Middleware::auth();
            $id = $_GET['id'] ?? null;
            if($id) (new CategoriesController())->delete($id);
            break;
        
        // products Route
        case '/php/mini-ecommerce/public/dashboard/products':
            Middleware::auth();
            (new ProductsController())->index();
            break;

        case '/php/mini-ecommerce/public/dashboard/products/create':
            Middleware::auth();
            (new ProductsController())->create();
            break;

        case '/php/mini-ecommerce/public/dashboard/products/edit':
            Middleware::auth();
            $id = $_GET['id'] ?? null;
            if($id) (new ProductsController())->edit($id);
            break;

        case '/php/mini-ecommerce/public/dashboard/products/delete':
            Middleware::auth();
            $id = $_GET['id'] ?? null;
            if($id) (new ProductsController())->delete($id);
            break;
        
        default:
            http_response_code(404);
            echo "404 Not Found";
    }

?>