<div>
    <form action="{{route('quizz.store')}}" method="post"> @csrf
        <div class="mb-4">
            <label for="name" class="lms-label">Name</label>
            <input type="text" name="name" id="name" class="lms-input">
        </div>
        <button type="submit" class="btn-submit">Add a quiz</button>
    </form>

    <div class="quizzindex mt-6">
        <table class="w-full table-auto">
            <tr class="bg-gray-100">
                <th class="text-left p-4 m-4">Question</th>
                <th class="text-left p-4 m-4">Actions</th>
            </tr>

            @foreach($quizzs  as $quizz)
                <tr class="border odd:bg-slate-50">
                    <td class="border p-5 m-4 font-bold">{{$quizz->name}}</td>

                    <td class="border px-4 py-2 text-center">
                        <div class="flex items-center justify-center">
                            <a class="mr-1" href="{{route('quizz.edit', $quizz->id)}}">
                                @include('components.icons.edit')
                            </a>

                            <form class="ml-1" onsubmit="return confirm('Are you sure?');"
                                  wire:submit.prevent="quizzDelete({{$quizz->id}})">
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
</div>
