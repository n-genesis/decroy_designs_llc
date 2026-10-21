<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UploadedImagesModel;
use CodeIgniter\HTTP\ResponseInterface;

class UploadedImages extends BaseController
{
    private $uploadedImagesModel;
    private $uploadPath = FCPATH . 'uploads/images/'; // Points to public/uploads/images/

    public function __construct(){
        $this->uploadedImagesModel = model(UploadedImagesModel::class);
    }

    public function index()
    {
        // $collection = new \CodeIgniter\Files\FileCollection();
        // helper('number');
        
        // // Ensure the directory exists to avoid errors
        // if (!is_dir($this->uploadPath)) {
        //     mkdir($this->uploadPath, 0755, true);
        // }

        // // Gather web-friendly extensions
        // $collection->add($this->uploadPath, true)->retainMultiplePatterns(['*.jpg','*.jpeg','*.png','*.webp','*.gif']);

        // $collection->get();
        
        
        // foreach ($collection as $file) {
        //     (object) $images[] = (object) [
        //         'filename' => $file->getFilename(),
        //         'url'      => base_url('uploads/images/' . $file->getFilename()), // Public web URL
        //         'type'      => $file->getExtension(),
        //         'size'     => number_to_size($file->getSizeByBinaryUnit()),
        //     ];
        // }

        // echo '<pre>';
        // print_r($this->uploadedImagesModel->getUploadedImages());
        // echo '</pre>';
        // exit;

        return $this->renderView('admin/uploaded_images/index', [
            'title'   => 'Uploaded Images',
            'images' => $this->uploadedImagesModel->getUploadedImages(),
        ]);

    }


    public function upload()
    {
        // 1. Validate the incoming file
        $validationRule = [
            'image_file' => [
                'label' => 'Image File',
                'rules' => 'uploaded[image_file]|is_image[image_file]|max_size[image_file,2048]|mime_in[image_file,image/jpg,image/jpeg,image/png,image/webp]',
            ],
        ];

        if (!$this->validate($validationRule)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        // 2. Process and move the file
        $img = $this->request->getFile('image_file');
        if ($img->isValid() && !$img->hasMoved()) {
            // Generate a secure random name to avoid collisions
            $newName = $img->getRandomName();
            $img->move($this->uploadPath, $newName);

            return redirect()->to('/images')->with('success', 'Image uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Invalid file.');
    }

    // Method not used
    public function edit()
    {
        $filename = $this->request->getPost('filename');
        $action   = $this->request->getPost('action'); // e.g., 'thumbnail', 'rotate'
        
        $filePath = $this->uploadPath . basename($filename);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'Image not found.');
        }

        // Initialize the Image Service
        $imageService = \Config\Services::image();

        if ($action === 'thumbnail') {
            // Fit into a 300x300 canvas and overwrite the original or save as copy
            $imageService->withFile($filePath)
                         ->fit(300, 300, 'center')
                         ->save($filePath); // Overwrites original. Pass a new path to save separately.
        } 
        elseif ($action === 'rotate') {
            // Rotate 90 degrees clockwise
            $imageService->withFile($filePath)
                         ->rotate(90)
                         ->save($filePath);
        }

        return redirect()->to('/images')->with('success', 'Image modified successfully!');
    }

    public function uploadImages()
    {

        if (!$this->validate('imagesRules')) {
            return redirect()->to('admin/uploaded_images')->with('errors', $this->validator->getErrors());
        }

        if ($imageFiles = $this->request->getFiles()) {
            foreach ($imageFiles['images'] as $img) {

                // Check if the file is valid and hasn't moved yet
                if ($img->isValid() && !$img->hasMoved()) {

                    $filename = $img->getName();
                    // Move uploaded image to directroy
                    $img->move($this->uploadPath, $filename, true);

                    // Update Image field
                    if (!$this->uploadedImagesModel->saveImage([
                        'image_path' => "uploads/images/$filename",
                        'file_name' => $filename,
                        'mime_type' =>  $img->getClientExtension(),
                        'file_size' => $img->getSize()
                    ])) {
                        return redirect()->to('admin/uploaded_images')->with('error', 'Failed to update image. Please try again.');
                    }
                }
            }
        }

        return redirect()->to('admin/uploaded_images')->with('success', 'Your images were uploaded successfully.');
    }

    public function deleteImage($id)
    {

        // Find image
        $image = $this->uploadedImagesModel->getImageById($id);

        // Build the absolute path using FCPATH
        $filePath = $this->uploadPath . '/' . $image->file_name;

        // Security Check: Ensure the file exists and is actually a file
        if (file_exists($filePath) && is_file($filePath)) {
            // Delete the file
            if (unlink($filePath)) {
                if(!$this->uploadedImagesModel->deleteImageById($id) && $image) {
                    return redirect()->to('admin/uploaded_images')->with('error', 'Failed to delete the image. Please try again.');
                }
                return redirect()->to('admin/uploaded_images')->with('success', 'Image successfully deleted.');
            }
            
            return redirect()->to('admin/uploaded_images')->with('error', 'Unable to delete the file from the server.');
        }

        return redirect()->to('admin/uploaded_images')->with('error', 'Image file not found.');
    }


}
