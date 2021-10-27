<?php

namespace App\Http\Livewire;

use App\Models\People;
use Livewire\Component;
use Livewire\WithPagination;

class PeopleList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';      
    protected $queryString = ['filter' => ['except' => '']];    

    protected $rules = [
        'name' => 'required|min:3'
    ];
    
    protected $messages = [
        'name.required' => 'O nome é requerido.',
        'name.min' => 'No minimo 3 caracteres',
    ];

    protected function updatingFilter()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    // List
    public $start = null;
    public $filter = '';
    public $typeForm = 'list';
    // Form
    public $peopleId = null;
    public $name = '';
    public $active = false;
        
    public function init()
    {
        $this->start = 1;
    }

    public function render()
    {
        if ($this->typeForm === 'crud') {
            return view('livewire.people-list');    
        }

        $peoples = People::when($this->filter, 
            function($query) {
                $query->where('name', 'like', "%{$this->filter}%");
            })
            ->orderBy('name')
            ->paginate(10);
        return view('livewire.people-list', 
            [
                'peoples' => $this->start ? $peoples: null
            ])
            ->layout('base')
            ->slot('slot');
    }    

    public function create()
    {
        $this->typeForm = 'crud';
        $this->clear();
    }

    public function edit($id) 
    {
        $this->clear();        
        $model = People::find($id);
        $this->peopleId = $model->id;
        $this->name = $model->name;
        $this->active = $model->active;
        $this->typeForm = 'crud';
    }
    
    public function clear()
    {
        $this->peopleId = null;
        $this->name = '';
        $this->active = false;    
    }

    public function cancel()
    {
        $this->clear();
        $this->typeForm = "list";
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
        } else {
            $people = People::create($data);
            session()->flash('message', 'Pessoa criada com sucesso.');
            $this->edit($people->id);
        }
    }

    public function changeActive($id) 
    {        
        if ($model = People::find($id)) {            
            $model->active = !$model->active;
            $model->save();            
        }        
    }
}
