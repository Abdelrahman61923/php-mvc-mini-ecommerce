<?php

namespace App\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Category;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $productModel  = new Product();
        $categoryModel = new Category();

        $categoriesCount = $categoryModel->count();
        $productsCount = $productModel->count();
        $this->view('dashboard/index', [
            'title' => 'Dashboard',
            'categoriesCount' => $categoriesCount,
            'productsCount' => $productsCount,
        ], 'app');
    }
}
