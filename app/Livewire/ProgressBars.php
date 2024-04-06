<?php

namespace App\Livewire;

use Livewire\Component;

class ProgressBars extends Component
{
    public $progress;
    public function render()
    {
        return view('livewire.progress-bars');
    }
}
