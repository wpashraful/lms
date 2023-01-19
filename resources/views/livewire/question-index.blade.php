<div>
    <table class="w-full table-auto">
        <tr class="bg-gray-100">
            <th class="text-left p-4 m-4">Question</th>
            <th class="text-left p-4 m-4">Answer A</th>
            <th class="text-left p-4 m-4">Answer B</th>
            <th class="text-left p-4 m-4">Answer C</th>
            <th class="text-left p-4 m-4">Answer D</th>
            <th class="text-left p-4 m-4">Correct Answer</th>
            <th class="text-left p-4 m-4">Actions</th>
        </tr>

        @foreach($questions  as $question)
            <tr class="border odd:bg-slate-50">
                <td class="border p-5 m-4 font-bold">{{$question->name}}</td>
                <td class="border p-4 m-4 font-bold">{{$question->answer_a}}</td>
                <td class="border p-4 m-4 font-bold">{{$question->answer_b}}</td>
                <td class="border p-4 m-4 font-bold">{{$question->answer_c}}</td>
                <td class="border p-4 m-4 font-bold">{{$question->answer_d}}</td>
                <td class="border p-4 m-4 font-bold">{{$question->correct_answer}}</td>

                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a class="mr-1" href="{{route('question.edit', $question->id)}}">
                            @include('components.icons.edit')
                        </a>

                        <form class="ml-1" onsubmit="return confirm('Are you sure?');"
                              wire:submit.prevent="questionDelete({{$question->id}})">
                            <button type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>


            </tr>
        @endforeach
    </table>
    <div class="mt-5">
        {{$questions->links()}}
    </div>
</div>
