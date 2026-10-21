<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\ProjectImageModel;
use App\Models\UploadedImagesModel;
use App\Models\ProjectModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Projects extends BaseController
{
    protected $projectModel;
    protected $projectImageModel;
    protected $uploadedImagesModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->projectModel = model(ProjectModel::class);
        $this->projectImageModel = model(ProjectImageModel::class);
        $this->uploadedImagesModel = model(UploadedImagesModel::class);
    }

    public function index()
    {
        return $this->renderView('admin/projects/index', [
            'title'   => 'Manage Projects',
            'projects' => $this->projectModel->orderBy('updated_at', 'DESC')->paginate(10),
            'pager'   => $this->projectModel->pager,
        ]);
    }

    public function show($id = null)
    {
        return $this->renderView('admin/projects/show', [
            'title'   => 'Project Details',
            'project' => $this->requireProject($id),
        ]);
    }

    public function new()
    {
        return $this->renderView('admin/projects/form', [
            'title'   => 'Create Project',
            'project' => (object) [
                'name' => '', 'slug' => '', 'type' => '', 'metadata' => '',
                'description' => '', 'project_content' => '', 'project_details' => '',
                'image_path' => 'uploads/images/building-800x600.png', 'visibility' => 'draft',
            ],
            'project_images' => [],
            'action' => site_url('admin/projects'),
            'method' => 'POST',
            'errors' => session()->getFlashdata('errors') ?? [],
        ]);
    }

    public function create()
    {
        if ($this->projectModel->insert($this->projectInput()) === false) {
            return redirect()->back()->withInput()->with('errors', $this->projectModel->errors());
        }

        return redirect()->to(site_url('admin/projects'))->with('success', 'Project created successfully.');
    }

    public function edit($id = null)
    {
        $project = $this->requireProject($id);

        return $this->renderView('admin/projects/form', [
            'title'   => "Edit: $project->name",
            'project' => $project,
            'action'  => site_url('admin/projects/update/' . $project->id),
            'method'  => 'POST',
        ]);
    }

    public function update($id = null)
    {

        $this->requireProject($id);

        if (!$this->projectModel->update($id, $this->projectInput($id))) {
            return redirect()->back()->withInput()->with('errors', $this->projectModel->errors());
        }

        return redirect()->to("admin/projects/edit/$id")->with('success', 'Project updated successfully.');
    }

    public function delete($id = null)
    {
        $this->requireProject($id);
        $this->projectModel->delete($id);

        return redirect()->to(site_url('admin/projects'))->with('success', 'Project moved to trash.');
    }

    private function projectInput($id = null): array
    {
        $name = trim((string) $this->request->getPost('name'));
        $slug = trim((string) $this->request->getPost('slug'));

        return [
            'id'              => $id,
            'name'            => $name,
            'slug'            => $slug !== '' ? url_title($slug, '-', true) : url_title($name, '-', true),
            'type'            => $this->request->getPost('type'),
            'metadata'        => $this->request->getPost('metadata'),
            'description'     => $this->request->getPost('description'),
            'project_content' => $this->request->getPost('project_content'),
            'project_details' => $this->request->getPost('project_details'),
            'image_path'      => $this->request->getPost('image_path'),
            'visibility'      => $this->request->getPost('visibility'),
        ];
    }

    protected function requireProject($id)
    {
        $project = $this->projectModel->find($id);
        if ($project === null) {
            throw PageNotFoundException::forPageNotFound('Project not found.');
        }

        return $project;
    }
}
