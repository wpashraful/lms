<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class InvoiceSingle extends Component
{
    public $invoice_id;
    public function render()
    {
        $invoice = Invoice::findOrFail($this->invoice_id);
        return view('livewire.invoice-single',[
            'invoice' => $invoice,
        ]);
    }
}
