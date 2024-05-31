<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalPendingRegistration extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $backlink;

     public function __construct( $title, $backlink )
    {
        //

        $this->title = $title;
        $this->backlink = $backlink;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-pending-registration');
    }
}
