<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Invoice;
use Livewire\Component;

class InvoiceIndex extends Component
{
    public function render()
    {
        $invoices = Invoice::paginate(50);
        return view('livewire.invoice-index',[
            'invoices' => $invoices
        ]);
    }
}
