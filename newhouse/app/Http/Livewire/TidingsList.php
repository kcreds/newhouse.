<?php

namespace App\Http\Livewire;

use App\Models\ContactTidings;
use Livewire\Component;
use Livewire\WithPagination;


class TidingsList extends Component
{
    use WithPagination;
    public $tiding;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $tiding = ContactTidings::paginate(10);
        return view('livewire.tidings-list', ['data' => $tiding]);
    }

    public function toggleReadStatus($tidingsId)
    {
        $tidings = ContactTidings::findOrFail($tidingsId);
        $tidings->isread = !$tidings->isread;
        $tidings->save();

        $this->render();
    }

    public function deleteTidings($tidingsId)
    {
        $tidings = ContactTidings::findOrFail($tidingsId);
        $tidings->delete();

        $this->render();
    }
}
