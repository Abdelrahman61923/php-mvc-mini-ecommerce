<?php

namespace App\Controllers\Dashboard;

use App\Core\Flash;
use App\Core\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Controllers\BaseController;

class ProductsController extends BaseController
{
    public function index()
    {
        $productModel  = new Product();
        $categoryModel = new Category();

        $search = $_GET['search'] ?? null;
        $category = $_GET['category'] ?? null;

        $limit = 4;
        $page = max(1, (int) ($_GET['page'] ?? 1));
        $offset = ($page - 1) * $limit;

        $products = $productModel->filter($search, $category, $limit, $offset);
        $total = $productModel->countFiltered($search, $category);
        $pages = ceil($total / $limit);

        $categories = $categoryModel->all();

        $this->view('dashboard/products/index', [
            'title' => 'Products',
            'products' => $products,
            'categories' => $categories,
            'page' => $page,
            'pages' => $pages
        ], 'app');
    }

    public function create()
    {
        $categories = (new Category())->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new Validator();
            $validator->required('name', $_POST['name'] ?? '');
            $validator->required('category_id', $_POST['category_id'] ?? '');
            $validator->required('price', $_POST['price'] ?? '');

            if ($validator->fails()) {
                Flash::set('errors', $validator->getErrors());
                header("Location: /php/mini-ecommerce/public/dashboard/products/create");
                exit;
            }

            $imageName = null;
            if (!empty($_FILES['image']['name'])) {
                $imageName = $this->uploadImage($_FILES['image']);

                if (!$imageName) {
                    Flash::set('error', 'Invalid image file');
                    header("Location: /php/mini-ecommerce/public/dashboard/products/create");
                    exit;
                }
            }

            $productModel = new Product();
            $productModel->create([
                'name' => $_POST['name'],
                'category_id' => $_POST['category_id'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'image' => $imageName
            ]);

            Flash::set('success', 'Product created successfully.');
            header("Location: /php/mini-ecommerce/public/dashboard/products");
            exit;
        }

        $this->view('dashboard/products/create', [
            'title' => 'Create Product',
            'categories' => $categories,
            'errors' => Flash::get('errors'),
            'success' => Flash::get('success')
        ], 'app');
    }

    public function edit($id)
    {
        $productModel = new Product();
        $categories = (new Category())->all();
        $product = $productModel->find($id);

        if (!$product) {
            Flash::set('error', 'Product not found.');
            header("Location: /php/mini-ecommerce/public/dashboard/products");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new Validator();
            $validator->required('name', $_POST['name'] ?? '');
            $validator->required('category_id', $_POST['category_id'] ?? '');
            $validator->required('price', $_POST['price'] ?? '');

            if ($validator->fails()) {
                Flash::set('errors', $validator->getErrors());
                header("Location: /php/mini-ecommerce/public/dashboard/products/edit?id=$id");
                exit;
            }

            $imageName = $product['image'];
            if (!empty($_FILES['image']['name'])) {
                $newImage = $this->uploadImage($_FILES['image']);

                if ($newImage) {
                    // delete old image
                    if ($imageName && file_exists(__DIR__ . '/../../../public/uploads/products/' . $imageName)) {
                        unlink(__DIR__ . '/../../../public/uploads/products/' . $imageName);
                    }
                    $imageName = $newImage;
                }
            }

            $productModel->update($id, [
                'name' => $_POST['name'],
                'category_id' => $_POST['category_id'],
                'description' => $_POST['description'] ?? '',
                'price' => $_POST['price'],
                'image' => $imageName
            ]);

            Flash::set('success', 'Product updated successfully.');
            header("Location: /php/mini-ecommerce/public/dashboard/products");
            exit;
        }

        $this->view('dashboard/products/edit', [
            'title' => 'Edit Product',
            'product' => $product,
            'categories' => $categories,
            'errors' => Flash::get('errors'),
            'success' => Flash::get('success')
        ], 'app');
    }

    public function delete($id)
    {
        $productModel = new Product();
        $product = $productModel->find($id);

        if (!empty($product['image'])) {
            $imagePath = __DIR__ . '/../../../public/uploads/products/' . $product['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $productModel->delete($id);

        Flash::set('success', 'Product deleted successfully.');
        header("Location: /php/mini-ecommerce/public/dashboard/products");
        exit;
    }

    private function uploadImage($file)
    {
        if ($file['error'] !== 0) {
            return null;
        }

        $allowed = ['image/png', 'image/jpeg', 'image/jpg'];
        if (!in_array($file['type'], $allowed)) {
            return null;
        }

        if ($file['size'] > 2 * 1024 * 1024) { // 2MB
            return null;
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = uniqid() . '.' . $extension;

        $destination = __DIR__ . '/../../../public/uploads/products/' . $fileName;

        move_uploaded_file($file['tmp_name'], $destination);

        return $fileName;
    }

}
