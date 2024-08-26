<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CourseCard extends Component
{
    public $title;
    public $description;
    public $image;
    public $category;

    public function __construct($title, $description, $image, $category)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->category = $category;
    }

    public function render()
    {
        return view('components.course-card');
    }
}
