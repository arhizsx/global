<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalSubmitConfirm extends Component
{
    /**
     * Create a new component instance.
     */
    public $action;
    public $title;

     public function __construct( $action,  $title )
    {
        //

        $this->action = $action;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-submit-confirm');
    }
}
