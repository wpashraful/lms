<?php

namespace App\Http\Livewire;
use Flasher\Prime\Flasher;
use Livewire\WithPagination;
use App\Models\Lead;
use Livewire\Component;

class LeadIndex extends Component
{
    public function render()
    {

        $leads = Lead::paginate(10);
        return view('livewire.lead-index',[
            'leads' => $leads
        ]);

    }

    public function loadDelete($id, Flasher $flasher){
        $lead = Lead::findOrFail($id);
        $lead->delete();

        $flasher->addSuccess('Post deleted');
    }
}
