<div>

    {{var_dump($answered)}}
    <span class="bg-red-100 bg-green-100"></span>
    @foreach($quizz->questions as $question)
        <div class="mb-2 @if(array_key_exists($question->id, $answered)) bg-{{$answered[$question->id] ? 'green' : 'red'}}-100 @endif py-4 px-2 border-b-blue-700">
            <h2 class="font-bold ">{{$question->name}}</h2>
            <div class="flex items-center">
                @foreach($answers as $answer)

                <div class="mr-4 ">
                    <input wire:change.prevent="check" wire:model="answer" value="{{explode('_',$answer)[1]}},{{$question->id}}" id="{{$answer}}_{{$question->id}}" @if(array_key_exists($question->id, $answered)) disabled @endif type="radio">
                    <label for="{{$answer}}_{{$question->id}}">{{$question->$answer}}</label>
                </div>

                @endforeach

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
