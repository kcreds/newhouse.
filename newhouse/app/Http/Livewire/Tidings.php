<?php

namespace App\Http\Livewire;

use App\Models\ContactTidings;
use Livewire\Component;
use App\Models\Immovables;

class Tidings extends Component
{
    public $email;
    public $immovable;
    public $immovableSlug;
    public $message;

    private $formSubmitted = false;


    public function render()
    {
        if ($this->formSubmitted) {
            return view('livewire.tidings-submited');
        } else {
            return view('livewire.tidings');
        }
    }

    function saveData()
    {
        $tiding = new ContactTidings();
        $tiding->email = $this->email;
        $tiding->immovables = $this->immovable->name;
        $tiding->immovablesSlug = $this->immovable->slug;
        $tiding->message = $this->message;
        $tiding->isread = false;
        $tiding->save();

        $this->formSubmitted = true;
    }
}
