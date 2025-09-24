<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryMenu extends Component
{

    // thuộc tính của component (Class property)
    public $categories;

    public function __construct()
    {
        // load all categories
       $this->categories  = Category::orderBy('catename')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-menu');
    }
}
