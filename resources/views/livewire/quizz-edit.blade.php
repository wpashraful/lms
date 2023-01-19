<div>
    <h1 class="">Questions</h1>
    <form action="" wire:submit.prevent="addQuestion">
        <label for="question_id" class="lms-label"></label>
        <select class="lms-input" wire:model.lazy="question_id" id="question_id">
            @foreach($questions as $question)
            <option value="{{$question->id}}">{{$question->name}}</option>
            @endforeach
        </select>
        <div class="mt-4">
            @include('components.icons.loading')
            <button type="submit" class="btn-submit">add questions</button>
        </div>

    </form>
</div>
