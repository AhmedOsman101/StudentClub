<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class HomeRank extends Component {

    public $counter;

    public function render() {
        $users = User::orderBy('score', 'desc')
            ->orderBy('id')
            ->take(10)
            ->get(['name', 'score', 'country']);


        return view('livewire.home-rank', ['users' => $users]);
    }
}
