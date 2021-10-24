<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoList extends Component
{
    public $description = '';
        
    protected $rules = [
        'description' => 'required|string|min:3'
    ];
    
    protected $messages = [
        'description.required' => 'Digite a descrição da tarefa',
        'description.string' => 'Digite a descrição da tarefa',
        'description.min' => 'Digite no minimo 3 caracteres',
    ];

    public $readyToLoad = false;
 
    public function loadTodos()
    {
        //sleep(1);
        $this->readyToLoad = true;
    }

    public function render()
    {        
        $todos = Todo::all();
        return view('livewire.todo-list', [
            'todos' => $this->readyToLoad 
                ? $todos
                : null
        ]);
    }

    public function create()
    {
        $this->validate();
        
        Todo::create([
            'description' => $this->description,
            'done' => true
        ]);
        $this->description = '';   
    }
}
