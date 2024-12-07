<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public $admin;

    public function __construct($admin = null)
    {
        $this->admin = $admin;
    }

    public function render(): View
    {
        return view('layouts.app');
    }
}
