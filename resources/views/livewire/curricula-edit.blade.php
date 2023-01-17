<div>
    <form wire:submit.prevent="CurriculaEditForm">
        <div class="flex -mx-4 mb-3">
            <div class="flex-1 px-4">
                <label class="lms-label">Name</label>
                <input wire:model="curriculaName" type="text" class="lms-input"/>

                @error('curricula name')
                <div class="tex-red-500">{{$message}}</div>
                @enderror
            </div>


        </div>

        @include('components.icons.loading');
        <button wire:loading.remove class="btn-submit" type="submit">Update class</button>
    </form>
</div>
