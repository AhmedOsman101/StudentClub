<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Rank extends Component {
    use WithPagination;

    public $counter;

    public function render() {
        $users = User::with('team')
            ->orderBy('score', 'desc')
            ->orderBy('id')
            ->paginate(10);
        // $users = User::with('team')->paginate(10);
        return view('livewire.rank', ['users' => $users]);
    }
}
