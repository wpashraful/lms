<div>
    <table class="w-full table-auto">
        <tr class="bg-gray-100">
            <th class="text-left p-4 m-4">Name</th>
            <th class="text-left p-4 m-4">Email</th>
        </tr>

        @foreach($users as $user)
        <tr class="border odd:bg-slate-50">

            <td class="border p-4 m-4 font-bold">{{$user->name}}</td>
            <td class="border p-4 m-4 font-bold">{{$user->email}}</td>

        </tr>
        @endforeach
    </table>
</div>
