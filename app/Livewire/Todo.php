<?php

namespace App\Livewire;

use App\Models\Todo as ModelsTodo;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    public $task;
    use WithPagination;
    protected $rules = ['task' => 'required|string',];
    public $search;
    public $EditTask;
    public $EditTodoID;
    // public
    public function create(){
        $validated=$this->validateOnly('task');
        ModelsTodo::create($validated);
        $this->reset('task');
        session()->flash('success','Created.');
    }
    public function toggle($todoID){
        $todo=ModelsTodo::find($todoID);
        $todo->status= !$todo->satus;
        $todo->save();
    }
    public function cancel(){
        $this->reset('EditTodoID','editTask') ;
    }
    public function delete($todoID){
        ModelsTodo::find($todoID)->delete();
    }
    public function update($todoID){
        $this->EditTodoID = $todoID;
        $this->EditTask= ModelsTodo::find($todoID)->task;
    }
    public function render()
    {
        return view('livewire.to-do',[
            'todos'=>ModelsTodo::latest()->paginate(3)
        ]);
    }
}
