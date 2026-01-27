<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppealStatusBadge extends Component
{
    public $appeal;
    /**
     * Create a new component instance.
     */
    public function __construct($appeal)
    {
        $this->appeal = $appeal;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.appeal-status-badge');
    }
}
