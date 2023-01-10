<div>
    <form wire:submit.prevent="roleFormsubmit">
        <div class="flex">
            <div class="flex-1 px-4">
                <label for="name" class="lms-label">Name</label>
                <input wire:model="name" id="name" type="text" class="lms-input"/>

                @error('name')
                <div class="tex-red-500">{{$message}}</div>
                @enderror
            </div>
        </div>

        <h3 class="mt-3 mx-4">permissions</h3>
        <div class="flex flex-wrap mx-4 justify-between p-1 mt-2">
            @foreach($permissions as $permission)
                <label class="inline-flex items-center text-purple-600">
                    <input wire:model="selectedPermissions" type="checkbox" class="form-checkbox" value="{{$permission->name}}">
                    <span class="ml-2">{{$permission->name}}</span>
                </label>

            @endforeach

            @error('selectedPermissions')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        @include('components.icons.loading')
        <button type="submit" class="btn-submit">save</button>

    </form>
</div>
