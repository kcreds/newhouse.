<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Immovables;

class SearchField extends Component
{
    public $search="";
    
    public function render()
    {
        $results =[];
        if(strlen($this->search)>2)
        {
        $results = Immovables::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('address', 'like', '%'.$this->search.'%')
        ->get();
        }
        return view('livewire.search-field',[
            'results' => $results
            ]);
    }
}
