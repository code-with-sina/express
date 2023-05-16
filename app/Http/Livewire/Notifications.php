<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SellAnnouncement;

class Notifications extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.notifications', ['announces' => SellAnnouncement::latest()->paginate(2)]);
    }
}
