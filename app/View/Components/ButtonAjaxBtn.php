<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonAjaxBtn extends Component
{
    /**
     * Create a new component instance.
     */
    public $label;
    public $action;
    public $color;
    public $textcolor;
    public $margin;

     public function __construct( $label, $action, $color = "bg-dark", $textcolor = "text-white", $margin = "" )
    {
        //

        $this->label = $label;
        $this->action = $action;
        $this->color = $color;
        $this->textcolor = $textcolor;
        $this->margin = $margin;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-ajax-btn');
    }
}
