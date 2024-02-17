<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class HomeRank extends Component
{
    public function render()
    {
        $users = User::orderBy('score', 'desc')->take(10)->get(['id', 'name', 'score', 'country']);
        return view('livewire.home-rank', ['users' => $users]);
    }
}
