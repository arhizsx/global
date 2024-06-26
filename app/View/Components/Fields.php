<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Fields extends Component
{
    /**
     * Create a new component instance.
     */
    public $json;
    public $formdata;

     public function __construct( $json,  $formdata = null)
    {
        //

        $this->formdata = $formdata;
        $this->json = $json;
    }

    /**
     * Get the view / contents that represent the component.
     */


    public function render(): View|Closure|string
    {
        return view('components.fields');
    }
}
