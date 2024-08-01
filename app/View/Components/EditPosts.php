<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditPosts extends Component
{
    /**
     * Create a new component instance.
     */
    public $post;
    public $categorias;

    public function __construct($post,$categorias)
    {
        $this->post = $post;
        $this->categorias=$categorias;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-posts');
    }
}
