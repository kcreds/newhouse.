<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Immovables;

class SearchField extends Component
{
    public $search = "";
    public $message = "";
    public $searching = false;
    public $dataFound = false;

    public function updatedSearch($value)
    {
        if (strlen($value) < 2) {
            $this->message = 'Wprowadź co najmniej 2 znaki, aby rozpocząć wyszukiwanie.';
            $this->searching = false;
            $this->dataFound = false;
        } else {
            $this->message = '';
            $this->searching = true;

            $results = Immovables::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->get();

            $this->dataFound = $results->isNotEmpty();
            $this->searching = false;
        }
    }

    public function render()
    {
        $results = [];

        if ($this->dataFound) {
            $results = Immovables::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->get();
        }

        return view('livewire.search-field', [
            'results' => $results,
            'dataFound' => $this->dataFound,
            'searching' => $this->searching,
        ]);
    }
}
