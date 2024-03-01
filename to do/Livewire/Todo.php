<?php

namespace App\Livewire;

use App\Models\Todo as ModelsTodo;
use Exception;
use GuzzleHttp\Psr7\Message;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    public $task;
    use WithPagination;
    protected $rules = ['task' => 'required|string',];
    public $search;
    public $EditTask = [];
    public $EditTodoID;

    public function create(){
        try{
            $validated = $this->validateOnly('task');
        ModelsTodo::create($validated);
        $this->reset('task');
        session()->flash('success','Created.');
        }
        catch(Exception $e){
            session()->flash('error in create',$e->getMessage());
        }
    }

    public function toggle($todoID){
        try{
            $todo = ModelsTodo::find($todoID);
            $todo->status = !$todo->status;
            $todo->save();
        }

        catch(Exception $e){
            session()->flash('error in check',$e->getMessage());
        }
    }

    public function update($todoID){
        try{
            $this->EditTodoID = $todoID;
            $this->EditTask[$todoID] = ModelsTodo::find($todoID)->task;
        }
        catch(Exception $e){
            session()->flash('error in update',$e->getMessage());
        }

    }

    public function save($todoID)

    {
        try{
            $todo = ModelsTodo::find($todoID);
            if ($todo) {
                $todo->task = $this->EditTask[$todoID] ?? $todo->task;
                $todo->save();
                $this->EditTodoID = null;
            }
        }
        catch(Exception $e){
            session()->flash('error in save',$e->getMessage());
        }
    }
    public function delete($todoID)
    {
        try{
            ModelsTodo::find($todoID)->delete();
        }
        catch(Exception $e){
            session()->flash('error in delete',$e->getMessage());
        }
    }
    public function render()
    {
        return view('to-do',[
            'todos' => ModelsTodo::latest()->paginate(3)
        ]);
    }
}
