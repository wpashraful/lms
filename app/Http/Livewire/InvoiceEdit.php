<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Livewire\Component;

class InvoiceEdit extends Component
{

    public $invoice_id;
    public $invoice;
    public $name;
    public $price;
    public $quantity;
    public $enableAddItem = false;

    public function mount() {
        $this->invoice = Invoice::findOrFail($this->invoice_id);
    }

    public function render()
    {
        return view('livewire.invoice-edit');
    }

    public function addNewItem(){
        $this->enableAddItem = !$this->enableAddItem;
    }

    protected $rules = [
        'name' => 'required',
        'price' => 'required',
        'quantity' => 'required',
    ];
    public function saveNewItem(){
         $this->validate();
        $invoiceitem = InvoiceItem::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'invoice_id' => $this->invoice_id,

        ]);

        $invoiceitem->save();

        flash()->addSuccess('new item added successfully');
        $this->name = '';
        $this->price = '';
        $this->quantity = '';

        return redirect(route('invoice-edit', $this->invoice_id));
    }
}
