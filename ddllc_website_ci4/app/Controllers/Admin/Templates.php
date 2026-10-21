<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Files\FileCollection;

class Templates extends BaseController
{
    private $viewPath = APPPATH . 'Views/web/templates/';


    public function index()
    {
        $collection = new FileCollection();
        // Add the directory and filter for specific files (e.g., .txt or .json)
        $collection->add($this->viewPath, false)->retainPattern('*.php')->removePattern('project*');

        $files = (object) $collection->get(); // Returns an array of File objects

        return $this->renderView('admin/templates/index', [
            'title'   => 'Manage Templates Files',
            'templates'   => $files,
            'pager' => null,
        ]);
    }

    public function edit($filename)
    {
        helper('filesystem');
        $filePath = $this->viewPath . basename($filename); // basename() prevents directory traversal attacks

        if (!file_exists($filePath)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("File not found.");
        }

        return $this->renderView('admin/templates/edit', [
            'title'   => 'Templates Files',
            'filename'   => $filename,
            'file_content' => file_get_contents($filePath), // Natively reads file contents
            'action' => site_url('admin/templates/update/' . $filename),
            'method' => 'POST',
        ]);

    }

    public function update($filename)
    {
        helper('filesystem');
        
        $content = $this->request->getPost('file_content');
        $filePath = $this->viewPath . basename($filename);

        // write_file returns true on success, false on failure
        if (write_file($filePath, $content)) {
            return redirect()->to('admin/templates')->with('success', 'File updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Unable to write to file.');
        }
    }
}
