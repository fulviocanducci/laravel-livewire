<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class ShowTodos extends Component
{
    public $todos = [];   

    public function mount($todos) 
    {        
        $this->todos = $todos;
    }

    public function done($id) : void
    {
        if ($model = Todo::find($id)) {
            $model->done = !$model->done;
            if ($model->save()) {
                $this->todos = $model->all();
            }
        }        
    }

    public function render()
    {
        return view('livewire.show-todos');
    }
}
