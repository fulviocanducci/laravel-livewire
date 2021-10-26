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
    
    protected function updatingFilter()
    {
        $this->resetPage();
    }

    public $start = null;
    public $filter = '';
        
    public function render()
    {
        $peoples = People::when($this->filter, 
            function($query) {
                $query->where('name', 'like', "%{$this->filter}%");
            })
            ->paginate(10);
        return view('livewire.people-list', 
            [
                'peoples' => $this->start ? $peoples: null
            ])
            ->layout('base')
            ->slot('slot');
    }

    public function init()
    {
        $this->start = 1;
    }
}
