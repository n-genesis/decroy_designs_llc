<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Settings extends BaseController
{
    public function index()
    {
        $siteSettings  = [
            "appName"=> service('settings')->get('App.appName'),
            "appEmail"=> service('settings')->get('App.appEmail'),
            "appPhone"=> service('settings')->get('App.appPhone'),
            "appTitle"=> service('settings')->get('App.appTitle'),
            "appDesc"=> service('settings')->get('App.appDesc'),
            "appOwner"=> service('settings')->get('App.appOwner'),
            "appAddress"=> service('settings')->get('App.appAddress'),
            "appBusHours"=> service('settings')->get('App.appBusHours'),
            "appUnderConstruction"=> service('settings')->get('App.appUnderConstruction'),

        ];

        return $this->renderView('admin/settings/index', [
            'title'   => 'Website & Business Settings',
            'action' => site_url('admin/settings/save'),
            'method' => 'PUT',
            'info'=> (object) $siteSettings,
        ]);
    }

    public function update()
    {
        
        if (!$this->validate('siteInfoRules')) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update general settings
        if($this->request->getPost()){
            // Update settings
             service('settings')->setMany([
                'App.appName' => $this->request->getPost('appName'),
                'App.appEmail' => $this->request->getPost('appEmail'),
                'App.appTitle' => $this->request->getPost('appTitle'),
                'App.appDesc' => $this->request->getPost('appDesc'),
                'App.appPhone' => $this->request->getPost('appPhone'),
                'App.appOwner' => $this->request->getPost('appOwner'),
                'App.appAddress' => $this->request->getPost('appAddress'),
                'App.appBusHours' => $this->request->getPost('appBusHours'),
                'App.appUnderConstruction' => $this->request->getPost('appUnderConstruction') ? true : false,

             ]);
            
        }
        
        return redirect()->to('admin/settings')->with('success', 'Website information updated successfully!');
    }
}
