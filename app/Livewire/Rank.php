<?php

namespace App\Livewire;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Livewire\Component;

class Rank extends Component
{
    
    public function render()
    {
        $users = User::orderBy('score', 'desc')->paginate(10, ['id', 'name', 'score', 'country']);

        Paginator::useBootstrap(); // Optional: Use Bootstrap styling for pagination

        return view('livewire.rank', ['users' => $users]);
    }
}
