<?php

namespace App\Livewire;

use App\Models\Todo as TodoModel;
use Throwable;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component {
    use WithPagination;

    public $task;
    protected $rules = ['task' => 'required|string',];
    public $search;
    public $EditTask = [];
    public $EditTodoID;
    public $todos;

    public function __construct() {
        $this->todos = TodoModel::all();
    }

    public function create() {
        try {
            $validated = $this->validateOnly('task');
            TodoModel::create($validated);
            $this->reset('task');
            session()->flash('success', 'Created.');
        } catch (Throwable $e) {
            session()->flash('error in create', $e->getMessage());
        }
    }

    public function toggle($todoID) {
        try {
            $todo = TodoModel::find($todoID);
            $todo->status = !$todo->status;
            $todo->save();
        } catch (Throwable $e) {
            session()->flash('error in check', $e->getMessage());
        }
    }

    public function update($todoID) {
        try {
            $this->EditTodoID = $todoID;
            $this->EditTask[$todoID] = TodoModel::find($todoID)->task;
        } catch (Throwable $e) {
            session()->flash('error in update', $e->getMessage());
        }
    }

    public function save($todoID) {
        try {
            $todo = TodoModel::find($todoID);
            if ($todo) {
                $todo->task = $this->EditTask[$todoID] ?? $todo->task;
                $todo->save();
                $this->EditTodoID = null;
            }
        } catch (Throwable $e) {
            session()->flash('error in save', $e->getMessage());
        }
    }
    public function delete($todoID) {
        try {
            TodoModel::find($todoID)->delete();
        } catch (Throwable $e) {
            session()->flash('error in delete', $e->getMessage());
        }
    }
    public function render() {
        return view('livewire.todo', [
            'todos' => TodoModel::latest()->paginate(3)
        ]);
    }
}
