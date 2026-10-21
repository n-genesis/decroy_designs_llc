<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PageModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    protected PageModel $pageModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->pageModel = model(PageModel::class);
    }

    public function index()
    {
        return $this->renderView('admin/pages/index', [
            'title'   => 'Manage Pages',
            'pages'   => $this->pageModel->orderBy('updated_at', 'DESC')->paginate(10),
            'pager' => $this->pageModel->pager,
        ]);
    }

    public function show($id = null)
    {
        return $this->renderView('admin/pages/show', [
            'title' => 'Page Details',
            'page'  => $this->requirePage($id),
        ]);
    }

    public function new()
    {
        return $this->renderView('admin/pages/form', [
            'title'  => 'Create Page',
            'page'   => ['title' => '', 'slug' => '', 'content' => '', 'visibility' => 'draft'],
            'action' => site_url('admin/pages'),
            'method' => 'POST',
        ]);
    }

    public function create()
    {
        if ($this->pageModel->insert($this->pageInput()) === false) {
            return redirect()->back()->withInput()->with('errors', $this->pageModel->errors());
        }

        return redirect()->to(site_url('admin/pages'))->with('success', 'Page created successfully.');
    }

    public function edit($id = null)
    {
        $page = $this->requirePage($id);

        return $this->renderView('admin/pages/form', [
            'title'  => 'Edit Page',
            'page'  => $page,
            'action' => site_url('admin/pages/update/' . $page->id),
            'method' => 'POST',
        ]);
    }

    public function update($id = null)
    {
        $this->requirePage($id);

        if (!$this->pageModel->update($id, $this->pageInput($id))) {
            return redirect()->back()->withInput()->with('errors', $this->pageModel->errors());
        }

        return redirect()->to(site_url('admin/pages'))->with('success', 'Page updated successfully.');
    }

    public function delete($id = null)
    {
        $this->requirePage($id);
        $this->pageModel->delete($id);

        return redirect()->to(site_url('admin/pages'))->with('success', 'Page moved to trash.');
    }

    private function pageInput($id = null): array
    {
        $title = trim((string) $this->request->getPost('title'));
        $slug = trim((string) $this->request->getPost('slug'));

        return [
            'id'         => $id,
            'title'      => $title,
            'slug'       => $slug !== '' ? $slug : url_title($title, '-', true),
            'content'    => $this->request->getPost('content'),
            'visibility' => $this->request->getPost('visibility'),
        ];
    }

    private function requirePage($id)
    {
        $page = $this->pageModel->find($id);
        if ($page === null) {
            throw PageNotFoundException::forPageNotFound('Page not found.');
        }

        return $page;
    }
}
