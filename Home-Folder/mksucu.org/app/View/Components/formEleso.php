<?php

namespace App\View\Components;

use Illuminate\View\Component;

class formEleso extends Component
{
     /**
    * The form method.
    *
    * @var string
    */
   public $method;

   /**
   * The form requestUrl.
   *
   * @var string
   */
   public $requestUrl;


  /**
   * The form redirectUrl.
   *
   * @var string
   */
   public $redirectUrl;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($method,$requestUrl,$redirectUrl=NULL)
    {
        $this->method = $method;
        $this->requestUrl=$requestUrl;
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-eleso');
    }
}
