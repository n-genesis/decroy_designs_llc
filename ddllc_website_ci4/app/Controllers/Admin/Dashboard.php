<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        return $this->renderView('admin/home', [
            'title'   => 'Manage Pages',
        ]);
    }
}
