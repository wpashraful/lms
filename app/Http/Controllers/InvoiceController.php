<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceController extends Controller
{
        public function index(){

            $invoices = Invoice::paginate(50);

            return view('invoice.index',[
                'invoices' => $invoices
            ]);
        }

        public function edit($id){
            return view('invoice.edit',[
                'invoice' => Invoice::findOrFail($id),
            ]);
        }

    public function show($id){
//
//        $DBinvoice = Invoice::findOrFail($id);
//
//        $customer = new Buyer([
//            'name'          => $DBinvoice->user->name,
//            'custom_fields' => [
//                'email' => $DBinvoice->user->email,
//            ],
//        ]);
//
//        $items = [];
//        foreach ($DBinvoice->items as $item) {
//            $items[] = (new InvoiceItem())->title($item->name)->pricePerUnit($item->price)->quantity($item->quantity);
//        }
//
//        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);
//
//        $invoice = \LaravelDaily\Invoices\Invoice::make()
//            ->buyer($customer)
//            ->addItems($items)
//            ->currencySymbol('$');
//
//        return $invoice->stream();
        return view('invoice.single',[
            'invoice' => Invoice::findOrFail($id)
        ]);
    }
}
