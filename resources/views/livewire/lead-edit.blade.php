<div>
<form wire:submit.prevent="submitForm">
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
            <label class="lms-label">phone</label>
            <input wire:model="phone" type="text" class="lms-input"/>

            @error('phone')
            <div class="tex-red-500">{{$message}}</div>
            @enderror
        </div>
    </div>


    @include('components.icons.loading')

    <button wire:loading.remove class="btn-submit" type="submit">Update</button>

</form>

<h3 class="font-bold mt-4 pt-2">Notes</h3>
<hr>
@foreach($notes as $note)
    <div>{{$note->description}}</div>
@endforeach

<h2>add new note</h2>
<form wire:submit.prevent="addNote">
    <textarea wire:model.lazy="note" class="lms-input mt-2" placeholder="add note"></textarea>
    <button class="btn-submit mt-2" type="submit">save</button>
</form>
</div>
