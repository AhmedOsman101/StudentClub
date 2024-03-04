<?php

namespace App\Livewire;

use App\Models\Score;
use Livewire\Component;

class Productivity extends Component {
    public function render() {
        $days = Score::all();
        return view('livewire.productivity', [
            'days' => $days,
        ]);
    }
}
