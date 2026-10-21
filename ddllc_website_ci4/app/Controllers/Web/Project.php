<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\ProjectImageModel;
use App\Models\ProjectModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Project extends BaseController
{
    protected $projectModel;
    protected $projectImagesModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
        $this->projectImagesModel = model(ProjectImageModel::class);
    }

    public function index()
    {
        return $this->renderView('web/templates/projects/index', [
            'pageTitle' => str_replace(array('<span>', '</span>'), '', service('settings')->get('App.appName'))." | Our Projects",
            'description' => service('settings')->get('App.appDesc'),
            'keywords' => '',
            'title'   => 'Our Projects',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('')],
                ['label' => 'Our Projects', 'url' => ''],
            ],
            'projects'  => $this->projectModel->getProjects(),
        ]);
    }

    public function show(string $slug)
    {
        $project = $this->projectModel
            ->select('projects.*, projects.id as project_id')
            ->where('slug', $slug)
            ->where('visibility', 'published')
            ->orderBy('created_at', 'DESC')
            ->first();

        if ($project === null) {
            throw PageNotFoundException::forPageNotFound('Project not found.');
        }

        $project_images = $this->projectImagesModel->select('projects_image.*, uploaded_images.image_path')->where('project_id', $project->project_id)
        ->join('uploaded_images', 'projects_image.image_id = uploaded_images.id')
        ->orderBy('sort_order', 'ASC')->findAll();

        return $this->renderView('web/templates/projects/show', [
            'pageTitle' => $project->name,
            'description' => $project->description,
            'keywords' => '',
            'title'   => "$project->name",
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('')],
                ['label' => 'Our Projects', 'url' => site_url('projects')],
                ['label' => $project->name, 'url' => ''],
            ],
            'project'   => $project,
            'project_images' => $project_images,
        ]);
    }
}
