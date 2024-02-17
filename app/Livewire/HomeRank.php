<?php

namespace App\Livewire;

use App\Models\Team;
use App\Models\User;
use Livewire\Component;

class HomeRank extends Component {

    public $counter;

    public function getTeam($id) {
        $userTeam = Team::find($id);
        return $userTeam->name;
    }

    public function render() {
        $users = User::orderBy('score', 'desc')
            ->orderBy('id')
            ->take(10)
            ->get(['name', 'score', 'country', 'current_team_id']);

        return view('livewire.home-rank', ['users' => $users]);
    }
}
