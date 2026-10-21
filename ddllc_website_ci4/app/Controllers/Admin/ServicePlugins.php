<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ServicePlugins extends BaseController
{
    public function index()
    {
        return $this->renderView('admin/services/index', [
            'title'   => 'Social & Services Settings',
        ]);
    }
}
