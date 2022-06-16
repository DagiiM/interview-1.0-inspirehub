<?php

namespace App\View\Components;

use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\Null_;

class Search extends Component
{
      /**
    * The search placeholder.
    *
    * @var string
    */
   public $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($placeholder=Null)
    {
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search');
    }
}
