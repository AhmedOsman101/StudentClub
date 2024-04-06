<?php

namespace App\Livewire;

use App\Models\Score;
use Livewire\Component;

class State extends Component {
    public function render() {
        $days = Score::all();
        return view('livewire.state', [
            'days' => $days[0],
        ]);
    }
}
