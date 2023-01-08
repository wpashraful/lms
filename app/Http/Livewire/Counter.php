<?php

namespace App\Http\Livewire;

use Flasher\Prime\Flasher;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public function render()
    {
        return view('livewire.counter');
    }
    public function increase(Flasher $flasher){
        $this->count++;
        flash()->addSuccess('Your request has been received.');
    }
}
