<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatusSmile extends Component
{
    public $status;

    public function render()
    {
        return view('livewire.status-smile');
    }
}
