<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

class PomodoroTimer extends Component {
    public $timeRemaining;
    public $isWorkSession = true;
    public $isPaused = true;

    protected $listeners = ['tick' => 'decrementTime'];

    public function mount() {
        $this->resetTimer();
    }

    public function resetTimer() {
        $this->isWorkSession ? $this->timeRemaining = 25 * 60 : $this->timeRemaining = 5 * 60;
        $this->isPaused = true;
    }

    public function startOrPauseTimer() {
        $this->isPaused = !$this->isPaused;

        if (!$this->isPaused) {
            Artisan::queue('timer:tick');
        }
    }

    public function decrementTime() {
        if (!$this->isPaused && $this->timeRemaining > 0) {
            $this->timeRemaining--;

            if ($this->timeRemaining === 0) {
                $this->isWorkSession = !$this->isWorkSession;
                $this->resetTimer();

                if ($this->isWorkSession) {
                    echo "Work-Break cycle completed!";
                }
            }
        }
    }

    public function render() {
        return view('livewire.pomodoro-timer');
    }
}
