<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PageModel;

class Page extends BaseController
{
    protected $pageModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
    }

    // Handles the root homepage layout
    public function index()
    {
        return $this->renderView('web/templates/home', [
            'pageTitle' => str_replace(array('<span>', '</span>'), '', service('settings')->get('App.appName'))." | ".service('settings')->get('App.appTitle'),
            'description' => service('settings')->get('App.appDesc'),
            'keywords' => '',
        ]);
    }

    public function under_construction()
    {
        return $this->renderView('web/templates/under_construction', [
            'pageTitle' => str_replace(array('<span>', '</span>'), '', service('settings')->get('App.appName'))." | Under Construnstion",
            'description' => service('settings')->get('App.appDesc'),
            'keywords' => '',
        ]);
    }

    // Resolves and displays all dynamic pages
    public function render($slug)
    {
        // Fetch only published records that marked as pubblished
        $page = $this->pageModel->where('slug', $slug)
                                ->where('visibility', 'published')
                                ->first();
        
        // Check if template files exists
        $file = file_exists(APPPATH . "Views/web/templates/{$slug}.php");

        // Fallback to a 404 page if missing
        if (!$page && !$file) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Page matching '/{$slug}' does not exist.");
        }

        // Check if the requested page requires a custom template layout
        // For example: if the slug is 'home', match it to the homepage template file
        $template = 'default';
        if ($file) {
            $template = $slug;
        }

        return $this->renderView("web/templates/{$template}", [
                'pageTitle' => $page->page_title ?? str_replace(array('<span>', '</span>'), '', service('settings')->get('App.appName'))." | ".service('settings')->get('App.appTitle'),
                'description' => $page->page_description ?? service('settings')->get('App.appDesc'),
                'keywords' => $page->page_keywords ?? '',
                'title'   => $page->title ?? '',
                'breadcrumbLinks' => [
                    ['label' => 'Home', 'url' => site_url('')],
                    ['label' => $page->title ?? '', 'url' => ''],
                ],
                'content' => $page->content ?? '',
            ]
        );
        
    }

    /**
     * Custom 404 Page
     * @return string
     */
    public function show404()
    {
        // Explicitly set the 404 status code response header
        $this->response->setStatusCode(404);

        // Render your branded template (extend() will now work perfectly!)
        return $this->renderView('web/errors/html/error_404', [
            'pageTitle'   => '404 Page Note Found',
            'description' => 'Page Not Found',
            'keywords' => '404, Page Not Found',
            'message' => "The page you are looking for does not exist or has moved."
        ]);
    }
}