<div>

    <h2 class="font-bold text-green-700  ">Information</h2>
    <p class="mb-4">Invoice to: {{$invoice->user->name}}</p>

    <table class="table-auto w-full mb-4">
        <tr class="bg-gray-100">
            <th class="text-left p-4 m-4">Name</th>
            <th class="text-center p-4 m-4">Price</th>
            <th class="text-cente p-4 m-4">Quantity</th>
            <th class=" text-right p-4 m-4">Total</th>
        </tr>

        @foreach($invoice->items as $item)
            <tr>
                <td class="border p-4 m-4 font-bold">{{$item->name}}</td>
                <td class="border p-4 m-4 font-bold text-center">${{number_format($item->price, 2)}}</td>
                <td class="border p-4 m-4 font-bold text-center">{{$item->quantity}}</td>
                <td class="border p-4 m-4 font-bold text-right">${{number_format($item->price * $item->quantity, 2)}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="lms-cell-border text-right">Subtotal</td>
            <td class="lms-cell-border text-right">${{number_format($invoice->amounts()['total'], 2)}}</td>
        </tr>
        <tr>
            <td colspan="3" class="lms-cell-border text-right">Paid</td>
            <td class="lms-cell-border text-right">- ${{number_format($invoice->amounts()['paid'], 2)}}</td>
        </tr>
        <tr>
            <td colspan="3" class="lms-cell-border text-right">Due</td>
            <td class="lms-cell-border text-right">${{number_format($invoice->amounts()['due'], 2)}}</td>
        </tr>
    </table>




    @if($enableAddItem)
        <form class="mb-4" wire:submit.prevent="saveNewItem">
            <div class="flex mb-4">
                <div class="w-full">
                    @include('components.form-field', [
                        'name' => 'name',
                        'label' => 'Name',
                        'class' => 'lms-input',
                        'type' => 'text',
                        'placeholder' => 'Item name',
                        'required' => 'required',
                    ])
                </div>

                <div class="min-w-max ml-4">
                    @include('components.form-field', [
                        'name' => 'price',
                        'label' => 'Price',
                        'class' => 'lms-input',
                        'type' => 'number',
                        'placeholder' => 'Type price',
                        'required' => 'required',
                    ])
                </div>

                <div class="min-w-max ml-4">
                    @include('components.form-field', [
                        'name' => 'quantity',
                        'label' => 'Quantity',
                        'class' => 'lms-input',
                        'type' => 'number',
                        'placeholder' => 'Type quantity',
                        'required' => 'required',
                    ])
                </div>


            </div>
            <div class="flex mb-4">
                @include('components.icons.loading')
                <button class="btn-submit" type="submit">submit</button>
                <button class=" py-2 px-4 font-bold" wire:click="addNewItem" type="button">Cancel</button>
            </div>
        </form>
    @else
        <button class="p-2 m-2 font-bold  mt-2 mb-2" wire:click="addNewItem" class="underline">Add Items</button>
    @endif


{{--    <h3 class="font-bold text-4xl mb-2">Payments</h3>--}}
{{--    <ul class="mb-4">--}}
{{--        @foreach($invoice->payments as $payment)--}}
{{--            <li>{{date('F j, Y - g:i:a', strtotime($payment->created_at))}} - ${{number_format($payment->amount, 2)}} - transaction ID: {{$payment->transaction_id}} <button wire:click="refund({{$payment->id}})" class="bg-red-500 text-white px-4 py-2 text-xs">Refund</button></li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
</div>



