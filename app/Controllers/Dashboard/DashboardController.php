<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $this->view('dashboard/index', [
            'title' => 'Dashboard'
        ], 'app');
    }
}
