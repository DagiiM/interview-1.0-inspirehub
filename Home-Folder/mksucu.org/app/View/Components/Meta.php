<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Meta extends Component
{
    /**
    * The title.
    *
    * @var string
    */
   public $title;

  /**
    * The url.
    *
    * @var string
    */
    public $url;


  /**
    * The image.
    *
    * @var string
    */
    public $image;

    /**
    * The description.
    *
    * @var string
    */
    public $description;

    /**
    * The keywords.
    *
    * @var string
    */
    public $keywords;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title=null,$url=null,$image=null,$description=null,$keywords=null)
    {
        $this->title = $title;
        $this->image = $image;
        $this->url = $url;
        $this->keywords = $keywords;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.meta');
    }
}
