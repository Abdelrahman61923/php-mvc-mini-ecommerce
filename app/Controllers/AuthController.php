<?php

namespace App\Controllers;

use App\Models\User;
use App\Core\Middleware;
use App\Core\Flash;
use App\Core\Validator;

class AuthController extends BaseController
{
    public function login()
    {
        Middleware::guest();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new Validator();
            $validator->required('email', $_POST['email'] ?? '');
            $validator->required('password', $_POST['password'] ?? '');
            $validator->email('email', $_POST['email'] ?? '');

            if ($validator->fails()) {
                Flash::set('errors', $validator->getErrors());
                header("Location: /php/mini-ecommerce/public/login");
                exit;
            }

            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                header("Location: /php/mini-ecommerce/public/dashboard");
                exit;
            } else {
                Flash::set('error', 'Invalid email or password.');
                header("Location: /php/mini-ecommerce/public/login");
                exit;
            }
        }

        $this->view('auth/login', [
            'title' => 'Login',
            'errors' => Flash::get('errors'),
            'error'  => Flash::get('error')
        ], 'auth');
    }

    public function register()
    {
        Middleware::guest();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new Validator();
            $validator->required('name', $_POST['name'] ?? '');
            $validator->required('email', $_POST['email'] ?? '');
            $validator->email('email', $_POST['email'] ?? '');
            $validator->required('password', $_POST['password'] ?? '');
            $validator->min('password', $_POST['password'] ?? '', 4);

            if ($validator->fails()) {
                Flash::set('errors', $validator->getErrors());
                header("Location: /php/mini-ecommerce/public/register");
                exit;
            }

            $userModel = new User();
            $userModel->create([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ]);

            Flash::set('success', 'Account created successfully. Login now.');
            header("Location: /php/mini-ecommerce/public/login");
            exit;
        }

        $this->view('auth/register', [
            'title' => 'Register',
            'errors' => Flash::get('errors'),
            'success' => Flash::get('success')
        ], 'auth');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /php/mini-ecommerce/public/login");
        exit;
    }
}
