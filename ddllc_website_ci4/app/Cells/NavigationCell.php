<?php

namespace App\Cells;

use App\Models\PageModel;
use CodeIgniter\View\Cells\Cell;

class NavigationCell extends Cell
{
    protected $pages;
    public function mount()
    {
        $model = model(PageModel::class);
        // Fetch the note and its author info
        $this->pages = $model->where('visibility', 'published')->orderBy('created_at', 'DESC')->findAll();
    }
    public function render(): string
    {
        return view('App\Views\web\templates\navigation', [
            'pages' => $this->pages,
        ]);
    }
}
