<?php

namespace App\Controllers\Dashboard;

use App\Core\Flash;
use App\Core\Validator;
use App\Models\Category;
use App\Controllers\BaseController;

class CategoriesController extends BaseController
{
    public function index()
    {
        $categoryModel = new Category();

        $search = $_GET['search'] ?? null;

        $limit = 4;
        $page = max(1, (int) ($_GET['page'] ?? 1));
        $offset = ($page - 1) * $limit;

        $categories = $categoryModel->filter($search, $limit, $offset);
        $total = $categoryModel->countFiltered($search);
        $pages = ceil($total / $limit);

        $this->view('dashboard/categories/index', [
            'title' => 'Categories',
            'categories' => $categories,
            'page' => $page,
            'pages' => $pages
        ], 'app');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new Validator();
            $validator->required('name', $_POST['name'] ?? '');

            if ($validator->fails()) {
                Flash::set('errors', $validator->getErrors());
                header("Location: /php/mini-ecommerce/public/dashboard/categories/create");
                exit;
            }

            $categoryModel = new Category();
            $categoryModel->create([
                'name' => $_POST['name'],
            ]);

            Flash::set('success', 'Category created successfully.');
            header("Location: /php/mini-ecommerce/public/dashboard/categories");
            exit;
        }

        $this->view('dashboard/categories/create', [
            'title' => 'Create Category',
            'errors' => Flash::get('errors'),
            'success' => Flash::get('success')
        ], 'app');
    }

    public function edit($id)
    {
        $categoryModel = new Category();
        $category = $categoryModel->find($id);

        if (!$category) {
            Flash::set('error', 'Category not found.');
            header("Location: /php/mini-ecommerce/public/dashboard/categories");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new Validator();
            $validator->required('name', $_POST['name'] ?? '');

            if ($validator->fails()) {
                Flash::set('errors', $validator->getErrors());
                header("Location: /php/mini-ecommerce/public/dashboard/categories/edit?id=$id");
                exit;
            }

            $categoryModel->update($id, [
                'name' => $_POST['name'],
            ]);

            Flash::set('success', 'Category updated successfully.');
            header("Location: /php/mini-ecommerce/public/dashboard/categories");
            exit;
        }

        $this->view('dashboard/categories/edit', [
            'title' => 'Edit Category',
            'category' => $category,
            'errors' => Flash::get('errors'),
            'success' => Flash::get('success')
        ], 'app');
    }

    public function delete($id)
    {
        $categoryModel = new Category();
        $categoryModel->delete($id);

        Flash::set('success', 'Category deleted successfully.');
        header("Location: /php/mini-ecommerce/public/dashboard/categories");
        exit;
    }
}
