<div>
    <form wire:submit.prevent="userCreate">
        <div class="flex -mx-4 mb-3">
            <div class="flex-1 px-4">
                <label class="lms-label">Name</label>
                <input wire:model="name" type="text" class="lms-input"/>

                @error('name')
                <div class="tex-red-500">{{$message}}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label class="lms-label">Email</label>
                <input wire:model="email" type="text" class="lms-input"/>

                @error('email')
                <div class="tex-red-500 error ">{{$message}}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label class="lms-label">password</label>
                <input wire:model="password" type="password" class="lms-input"/>

                @error('phone')
                <div class="tex-red-500">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="role" class="lms-label">Role</label>
            <select wire:model.lazy="role" id="role" class="lms-input">
                <option value="">Select role</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>

            @error('role')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>


        @include('components.icons.loading')

        <button wire:loading.remove class="btn-submit" type="submit">create</button>

    </form>
</div>
