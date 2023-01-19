<div>
    <table class="w-full table-auto">
        <tr class="bg-gray-100">
            <th class="text-left p-4 m-4">Id</th>
            <th class="text-left p-4 m-4">User</th>
            <th class="text-left p-4 m-4">Due Date</th>
            <th class="text-left p-4 m-4">Total Amount</th>
            <th class="text-left p-4 m-4">Paid amount</th>
            <th class="text-left p-4 m-4">Due amount</th>
            <th class="text-left p-4 m-4">Actions</th>
        </tr>

        @foreach($invoices as $invoice)
            <tr class="border odd:bg-slate-50">
                <td class="border p-4 m-4 font-bold">{{$invoice->id}}</td>
                <td class="border p-4 m-4 font-bold">{{$invoice->user->name}}</td>
                <td class="border p-4 m-4 font-bold">{{$invoice->due_date}}</td>
                <td class="border p-4 m-4 font-bold">${{$invoice->amounts()['total']}}</td>
                <td class="border p-4 m-4 font-bold">${{$invoice->amounts()['paid']}}</td>
                <td class="border p-4 m-4 font-bold">${{$invoice->amounts()['due']}}</td>
                <td class="border p-4 m-4 font-bold">
                    <div class="flex justify-center item-center">
                        <a class="" href="{{route('invoice-edit', $invoice->id)}}">@include('components.icons.edit')</a>
                        <a class="mx-4" href="{{route('invoice-show', $invoice->id)}}">@include('components.icons.eye')</a>
                        <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="">
                            <button type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-5">
{{--        {{$invoice->links()}}--}}
    </div>
</div>
