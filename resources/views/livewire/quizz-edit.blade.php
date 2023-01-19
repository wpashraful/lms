<div>
    <h2 class="font-bold p2 text-2xl">Question lists</h2>
    <ul class="mb-4 bg-purple-100 p-2">
        @foreach($quizz->questions as $question)
            <li class="mb-2 border p-2">{{$question->name}}</li>
        @endforeach
    </ul>

    @if(count($questions) > 0)
    <h1 class="font-bold mb-2">Add Question</h1>
    <form  wire:submit.prevent="addQuestion">
        <label for="question_id" class="lms-label"></label>
        <select class="lms-input" wire:model.lazy="question_id" id="question_id">
            <option value="">Select a question</option>
            @foreach($questions as $question)
            <option value="{{$question->id}}">{{$question->name}}</option>
            @endforeach
        </select>
        <div class="mt-4">
            @include('components.icons.loading')
            <button type="submit" class="btn-submit">add questions</button>
        </div>

    </form>
    @else
        <h1 class="">no more question</h1>
    @endif
</div>
