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

    <h3 class="font-bold text-2xl mb-2 my-4">Payments</h3>
    <ul class="mb-4">
        @foreach($invoice->payments as $payment)
            <li class="py-2 mb-2">{{date('F j, Y - g:i:a', strtotime($payment->created_at))}} - ${{number_format($payment->price, 2)}} - transaction ID: {{$payment->transaction_id}}
{{--                <button wire:click="refund({{$payment->id}})" class="bg-red-500 text-white px-4 py-2 text-xs">Refund</button></li>--}}
        @endforeach
    </ul>

    <div>
        <h1 class="p-2 underline inline-block">Add payment</h1>
    </div>

    <form method="post" action="{{route('stripe-payment')}}"> @csrf
        <div class="flex mb-4">
            <div class="w-full">
                <label class="lms-label" for="card">Card no</label>
                <input id="card" value="4242424242424242" name="card_no" type="number" class="lms-input" placeholder="Card number">
            </div>
            <div class="min-w-max ml-4">
                <label class="lms-label" for="date">Month/Year</label>
                <input id="date" value="12/30" name="card_expiry_date" type="text" class="lms-input" placeholder="Expiry month/year">
            </div>
            <div class="min-w-max ml-4">
                <label class="lms-label" for="ccv">CCV</label>
                <input id="ccv" value="232" name="card_ccv" type="text" class="lms-input" placeholder="CCV">
            </div>
            <div class="min-w-max ml-4">
                <label class="lms-label" for="amount">Amount</label>
                <input id="amount" name="amount" type="number" class="lms-input" value="{{number_format($invoice->amounts()['due'], 2)}}" placeholder="Amount">
            </div>
            <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
        </div>
        <button type="submit" class="btn-submit">Pay Now</button>
    </form>



</div>



