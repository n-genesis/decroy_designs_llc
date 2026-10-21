<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{

    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Load here all helpers you want to be available in your controllers that extend BaseController.
        // Caution: Do not put the this below the parent::initController() call below.
        // $this->helpers = ['form', 'url'];

        // Caution: Do not edit this line.
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        // $this->session = service('session');
    }

    /**
     * Render a view with optional breadcrumb links.
     *
     * @param string $viewName The name of the view to render.
     * @param array $data Optional data to pass to the view.
     * @return string Rendered view content.
     */
    public function renderView(string $viewName, array $data = [])
    {
        $breadcrumbLinks = $data['breadcrumbLinks'] ?? $data['breadCrumbLinks'] ?? [];

        if (!isset($data['breadcrumbHtml']) && !empty($breadcrumbLinks)) {
            $data['breadcrumbHtml'] = $this->buildBreadcrumbHtml($breadcrumbLinks);
        }
        
        // Ensure success, errors, and error flashdata are always available in the view
        $data['success']  = session()->getFlashdata('success') ?? [];
        $data['errors']  = session()->getFlashdata('errors') ?? [];
        $data['error']  = session()->getFlashdata('error') ?? [];

        return view($viewName, $data);
    }

    /**
     * Helper to build breadcrumb HTML from an array of links
     * 
     * @param array $breadcrumbLinks Array of breadcrumb links, each containing 'label' and 'url'
     * @return string HTML string for the breadcrumb navigation
     */
    protected function buildBreadcrumbHtml(array $breadcrumbLinks = []): string
    {
        if (empty($breadcrumbLinks)) {
            return '';
        }

        $html = '<nav class="breadcrumbs" aria-label="breadcrumb"><ol>';
        $lastIndex = count($breadcrumbLinks) - 1;

        foreach ($breadcrumbLinks as $index => $link) {
            $label = $link['label'] ?? 'Item';
            $url = $link['url'] ?? '';
            $isLast = $index === $lastIndex;

            if ($isLast || empty($url)) {
                $html .= '<li class="current" aria-current="page">' . htmlspecialchars((string) $label, ENT_QUOTES, 'UTF-8') . '</li>';
                continue;
            }

            $html .= '<li><a href="' . htmlspecialchars((string) $url, ENT_QUOTES, 'UTF-8') . '">'
                . htmlspecialchars((string) $label, ENT_QUOTES, 'UTF-8') . '</a></li>';
        }

        $html .= '</ol></nav>';

        return $html;
    }
}
