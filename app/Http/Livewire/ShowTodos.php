<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowTodos extends Component
{
    public $todos = [];   

    public function mount($todos) 
    {        
        $this->todos = $todos;
    }

    public function render()
    {
        return view('livewire.show-todos');
    }
}
