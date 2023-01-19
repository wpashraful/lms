<div>
    @foreach($quizz->questions as $question)
        <div class="mb-2 bg-blue-50 py-4 px-2 border-b-blue-700">
            <h2 class="font-bold ">{{$question->name}}</h2>
            <div class="flex items-center">

                <div class="mr-4 ">
                    <input wire:change.prevent="check" wire:model="answer" value="a,{{$question->id}}" id="answer_a_{{$question->id}}" type="radio">
                    <label for="answer_a_{{$question->id}}">{{$question->answer_a}}</label>
                </div>
                <div class="mr-4">
                    <input wire:change.prevent="check" wire:model="answer" value="b,{{$question->id}}"id="answer_b_{{$question->id}}" type="radio">
                    <label for="answer_b_{{$question->id}}">{{$question->answer_b}}</label>
                </div>
                <div class="mr-4">
                    <input wire:change.prevent="check" wire:model="answer" value="c,{{$question->id}}"id="answer_c_{{$question->id}}" type="radio">
                    <label for="answer_c_{{$question->id}}">{{$question->answer_c}}</label>
                </div>
                <div class="mr-4">
                    <input wire:change.prevent="check" wire:model="answer" value="d,{{$question->id}}"id="answer_d_{{$question->id}}" type="radio">
                    <label for="answer_d_{{$question->id}}">{{$question->answer_d}}</label>
                </div>
            </div>
        </div>




    @endforeach
{{--    <h2 class="font-bold p2 text-2xl">Question lists</h2>--}}
{{--    <ul class="mb-4 bg-purple-100 p-2">--}}
{{--        @foreach($quizz->questions as $question)--}}
{{--        <li class="mb-2 border p-2">{{$question->name}}</li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}

{{--    <h1 class="">Add Question</h1>--}}
{{--    <form action="" wire:submit.prevent="addQuestion">--}}
{{--        <label for="question_id" class="lms-label"></label>--}}
{{--        <select class="lms-input" wire:model.lazy="question_id" id="question_id">--}}
{{--            @foreach($questions as $question)--}}
{{--                <option value="{{$question->id}}">{{$question->name}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--        <div class="mt-4">--}}
{{--            @include('components.icons.loading')--}}
{{--            <button type="submit" class="btn-submit">add questions</button>--}}
{{--        </div>--}}

{{--    </form>--}}
</div>
