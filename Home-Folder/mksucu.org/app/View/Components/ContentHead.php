<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContentHead extends Component
{
   /**
    * The ContentHead link.
    *
    * @var string
    */
   public $link;

    /**
    * The ContentHead linkName.
    *
    * @var string
    */
    public $linkName;


   /**
    * The ContentHead contentTitle.
    *
    * @var string
    */
    public $contentTitle;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link=NULL,$linkName=NULL,$contentTitle=NULL)
    {
        $this->link = $link;
        $this->linkName=$linkName;
        $this->contentTitle = $contentTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content-head');
    }
}
