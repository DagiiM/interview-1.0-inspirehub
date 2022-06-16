<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    /**
    * The icon icon.
    *
    * @var string
    */
   public $icon;

       /**
    * The icon type.
    *
    * @var string
    */
    public $type;

   /**
    * Create the component instance.
    *
    * @param  string  $icon
    * @return void
    */
    public function __construct($icon,$type=NULL)
    {
       $this->icon = $icon;

       $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icon');
    }
}
