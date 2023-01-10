<div>
    <table class="w-full table-auto">
        <tr class="bg-gray-100">
            <th class="text-left p-4 m-4">Name</th>
            <th class="text-left p-4 m-4">Permissions</th>
            <th class="text-left p-4 m-4">Actions</th>
        </tr>

        @foreach($roles as $role)
            <tr class="border odd:bg-slate-50">

                <td class="border p-4 m-4 font-bold">{{$role->name}}</td>

                <td class="border p-4 m-4 font-bold"> @foreach($role->permissions as $permission)
                       <span class="bg-purple-200 p-4 mx-2 text-sm rounded">{{$permission->name}}</span>
                    @endforeach</td>

                <td class="border p-4 m-4 font-bold">
                    <div class="flex justify-center item-center">
                        <a class="" href="{{route('role.edit', $role->id )}}">@include('components.icons.edit')</a>
                        <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="roleDelete({{$role->id}})">
                            <button type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
