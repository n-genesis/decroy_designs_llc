<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\Projects;

class ProjectImages extends Projects
{
    public function index()
    {
       //
    }

    public function edit($id = null)
    {
        $project = $this->requireProject($id);

        return $this->renderView('admin/projects/image_form', [
            'title'   => "Edit: $project->name",
            'project' => $project,
            'project_images' => $this->projectImageModel->getImagesByProjectId($project->id),
            'action'  => site_url('admin/project_images/update/' . $project->id),
            'method'  => 'POST',
            'success'  => session()->getFlashdata('success') ?? [],
            'errors'  => session()->getFlashdata('errors') ?? [],
            'error'  => session()->getFlashdata('error') ?? [],
        ]);
    }

    public function update($id = null)
    {
        // Retrieve the multi-dimensional form array
        $formImages = $this->request->getPost('images');

        if (empty($formImages)) {
            return redirect()->back()->with('error', 'No data submitted.');
        }

        $this->requireProject($id);

        if (!$this->projectImageModel->updateProjectImages($id, $formImages)) {
            return redirect()->to("admin/project_images/edit/$id")->withInput()->with('error', $this->projectImageModel->errors());
        }
    
        return redirect()->to("admin/project_images/edit/$id")->with('success', 'All images updated successfully!');
    }

    public function delete($id = null)
    {
        $project = $this->projectImageModel->find($id);
        $project_id = $project->project_id;
        
        if ($this->projectImageModel->delete($id)) {
            return redirect()->to("admin/project_images/edit/$project_id")->with('success', 'Asset successfully deleted.');
        }

        return redirect()->to("admin/project_images/edit/$project_id")->with('error', 'Failed to delete the asset.');

    }
    

    public function getImagesHtml()
    {
        // Ensure AJAX fetch context
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setBody('Direct script access forbidden');
        }

        $images = $this->uploadedImagesModel->getUploadedImages();

        $htmlOutput =  $this->renderView('admin/partials/images',[
            'images' => $images,
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'count'  => count($images),
            'html'   => $htmlOutput
        ]);
    }

}
