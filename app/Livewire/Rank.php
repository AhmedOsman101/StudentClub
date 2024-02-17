<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Rank extends Component
{
    use WithPagination;
    public function render()
    {
        $users = User::orderBy('score', 'desc')->paginate(10, ['id', 'name', 'score', 'country']);
        return view('livewire.rank', ['users' => $users]);
    }
}
