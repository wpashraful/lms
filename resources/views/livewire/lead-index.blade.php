<div>
    <table class="w-full table-auto">
        <tr class="bg-gray-100">
            <th class="text-left p-4 m-4">Name</th>
            <th class="text-left p-4 m-4">Phone number</th>
            <th class="text-left p-4 m-4">Email</th>
            <th class="text-left p-4 m-4">Date</th>
            <th class="text-left p-4 m-4">view/edit/delete</th>
        </tr>

        @foreach($leads as $lead)
        <tr class="border odd:bg-slate-50">
            <td class="border p-4 m-4 font-bold">{{$lead->name}}</td>
            <td class="border p-4 m-4 font-bold">{{$lead->phone}}</td>
            <td class="border p-4 m-4 font-bold">{{$lead->email}}</td>
            <td class="border p-4 m-4 font-bold">{{date('F-j-Y',strtotime($lead->created_at))}}</td>
            <td class="border p-4 m-4 font-bold">
                <div class="flex justify-center item-center">
                    <a class="" href="{{route('lead.edit', $lead->id )}}">@include('components.icons.edit')</a>
                    <a class="mx-4" href="{{route('lead.show', $lead->id )}}">@include('components.icons.eye')</a>
                    <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="loadDelete({{$lead->id}})">
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
        {{$leads->links()}}
    </div>
</div>
