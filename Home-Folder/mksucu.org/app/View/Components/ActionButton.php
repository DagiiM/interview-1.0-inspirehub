<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActionButton extends Component
{
    /**
    * The action viewLink.
    *
    * @var string
    */
    public $viewLink;

      /**
    * The action editLink.
    *
    * @var string
    */
    public $editLink;

    /**
    * The action deleteLink.
    *
    * @var string
    */
   public $deleteLink;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($viewLink,$editLink=NULL,$deleteLink=NULL)
    {
        $this->viewLink = $viewLink;
        $this->editLink = $editLink;
        $this->deleteLink = $deleteLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action-button');
    }
}
