<?php

namespace App\Http\Livewire;

use App\Models\People;
use Livewire\Component;

class PeopleCreateOrUpdate extends Component
{
    public $peopleId = null;
    public $name = '';
    public $active = false;

    protected $rules = [
        'name' => 'required|min:3'
    ];
    
    protected $messages = [
        'name.required' => 'O nome é requerido.',
        'name.min' => 'No minimo 3 caracteres',
    ];

    protected function clearForm()
    {
        $this->peopleId = null;
        $this->name = '';
        $this->active = false;    
    }
    
    public function mount($peopleId = null)
    {        
        if (empty($peopleId)) 
        {
            $this->clearForm();      
        } 
        else 
        {
            if (is_numeric($peopleId))
            {
                if ($data = People::find($peopleId)) 
                {
                    $this->peopleId = $data->id;
                    $this->name = $data->name;
                    $this->active = $data->active;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.people-create-or-update')
            ->layout('base')
            ->slot('slot');
    }

    public function goBack() 
    {
        return redirect()->to('/people');
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'active' => $this->active
        ];

        if ($this->peopleId) {
            $people = People::find($this->peopleId);
            $people->fill($data);
            $people->save();
            session()->flash('message', 'Pessoa alterada com sucesso.');
            return redirect()->to("/people/edit/{$people->id}");
        } else {
            $people = People::create($data);
            session()->flash('message', 'Pessoa criada com sucesso.');
            return redirect()->to("/people/edit/{$people->id}");
        }
    }
}
