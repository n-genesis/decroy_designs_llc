<?php

namespace App\Cells;

use App\Models\PageModel;
use CodeIgniter\View\Cells\Cell;

class PageLinksCell extends Cell
{
    protected $pages;
    public function mount()
    {
        $model = model(PageModel::class);
        // Fetch the note and its author info
        $this->pages = $model->where('visibility', 'published')->limit(5)->orderBy('created_at', 'DESC')->findAll();
    }

    public function render(): string
    {
        $links = '';
        foreach ($this->pages as $page) {
            $links .= '<li>'.anchor($page->slug, $page->title).'</li>';
        }
        return $links;
    }
}
