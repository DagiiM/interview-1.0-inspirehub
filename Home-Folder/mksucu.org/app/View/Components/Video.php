<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Video extends Component
{
     /**
    * The video poster.
    *
    * @var string
    */
   public $poster;

   /**
    * The video source.
    *
    * @var string
    */
   public $source;

     /**
    * Create the component instance.
    *
    * @param  string  $poster
    * @param  string  $source
    * @return void
    */
    public function __construct($poster, $source)
    {
       $this->poster = $poster;
       $this->source = $source;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.video');
    }
}
