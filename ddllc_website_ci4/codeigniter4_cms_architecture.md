# CODEIGNITER 4 CUSTOM CMS COMPONENT ARCHITECTURE BLUEPRINT

This blueprint defines the structural design pattern for a clean, secure, and maintainable MVC custom CMS on CodeIgniter 4.

## 1. DATABASE MIGRATION SYSTEM
File: app/Database/Migrations/2026-09-26-000001_CreatePagesTable.php

```php
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['draft', 'published'],
                'default'    => 'draft',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('slug');
        $this->forge->createTable('pages');
    }

    public function down()
    {
        $this->forge->dropTable('pages');
    }
}
```

## 2. CENTRAL DATA MODEL (WITH AUTOMATIC TIMESTAMPS & VALIDATION)
File: app/Models/PageModel.php

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table            = 'pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true; // Prevents accidental structural deletions

    // Fields allowed to be manipulated via forms
    protected $allowedFields    = ['title', 'slug', 'content', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Strict Validation Rules integrated directly into the Data Layer
    protected $validationRules = [
        'title'   => 'required|min_length[3]|max_length[255]',
        'slug'    => 'required|alpha_dash|is_unique[pages.slug,id,{id}]',
        'content' => 'permit_empty',
        'status'  => 'required|in_list[draft,published]',
    ];

    protected $validationMessages = [
        'slug' => [
            'is_unique' => 'This URI slug is already in use by another page.',
        ],
    ];
    
    protected $skipValidation = false;
}
```

## 3. SECURE ADMIN CONTROLLER (RESTFUL RESOURCE)
File: app/Controllers/Admin/Pages.php

```php
<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PageModel;

class Pages extends BaseController
{
    protected $pageModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
    }

    // List all pages
    public function index()
    {
        $data = [
            'title' => 'Manage Pages',
            'pages' => $this->pageModel->findAll(),
        ];
        return view('admin/pages/index', $data);
    }

    // Render creation form
    public function new()
    {
        return view('admin/pages/create', ['title' => 'Create New Page']);
    }

    // Process new page insertion
    public function create()
    {
        $data = [
            'title'   => $this->request->getPost('title'),
            'slug'    => url_title($this->request->getPost('title'), '-', true), // Auto-generate slug cleanly
            'content' => $this->request->getPost('content'),
            'status'  => $this->request->getPost('status'),
        ];

        if (!$this->pageModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $this->pageModel->errors());
        }

        return redirect()->to('admin/pages')->with('success', 'Page created successfully.');
    }

    // Render edit form
    public function edit($id = null)
    {
        $page = $this->pageModel->find($id);
        if (!$page) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/pages/edit', [
            'title' => 'Edit Page: ' . $page['title'],
            'page'  => $page
        ]);
    }

    // Process page update
    public function update($id = null)
    {
        $data = [
            'title'   => $this->request->getPost('title'),
            'slug'    => url_title($this->request->getPost('title'), '-', true),
            'content' => $this->request->getPost('content'),
            'status'  => $this->request->getPost('status'),
        ];

        if (!$this->pageModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $this->pageModel->errors());
        }

        return redirect()->to('admin/pages')->with('success', 'Page updated successfully.');
    }

    // Delete a page (Soft Delete)
    public function delete($id = null)
    {
        $this->pageModel->delete($id);
        return redirect()->to('admin/pages')->with('success', 'Page moved to trash.');
    }
}
```

## 4. SECURE ADMINISTRATIVE VIEWS
File: app/Views/admin/pages/index.php

```html
<!-- Inherit a clean backend dashboard shell layout -->
<?= $this->extend('admin/layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><?= esc($title) ?></h2>
        <a href="<?= base_url('admin/pages/new') ?>" class="btn btn-primary">Add New Page</a>
    </div>

    <!-- Alert Notices -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pages) && is_array($pages)): ?>
                <?php foreach ($pages as $page): ?>
                    <tr>
                        <td><?= $page['id'] ?></td>
                        <td><strong><?= esc($page['title']) ?></strong></td>
                        <td><code>/<?= esc($page['slug']) ?></code></td>
                        <td>
                            <span class="badge bg-<?= $page['status'] === 'published' ? 'success' : 'warning' ?>">
                                <?= ucfirst($page['status']) ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/pages/' . $page['id'] . '/edit') ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="<?= base_url('admin/pages/' . $page['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Trash</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">No custom pages have been configured yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
```
