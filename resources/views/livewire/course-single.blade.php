<div>

    <div class="singleCourse mb-6">
        <h2 class="font-bold uppercase text-4xl mb-6">{{$course->name}}</h2>
        <h2 class="font-bold my-5 text-xl">Price: ${{$course->price}}</h2>
        <p>{{$course->description}}</p>
    </div>
    <hr>

    <table class="w-full table-auto">
        <tr class="bg-gray-100">
            <th class="text-left p-4 m-4">Name</th>
            <th class="text-left p-4 m-4">Date</th>
            <th class="text-left p-4 m-4">actions</th>
        </tr>

        @foreach($course->curriculums as $curricula)

            <tr class="border odd:bg-slate-50">
                <td class="border p-4 m-4 font-bold">{{$curricula->name}}</td>
                <td class="border p-4 m-4 font-bold">{{date('F-j-Y',strtotime($curricula->created_at))}}</td>
                <td class="border p-4 m-4 font-bold">
                    <div class="flex justify-center item-center">
                        <a class="mx-4 btn-submit" href="{{route('curricula.show', $course->id )}}">@include('components.icons.eye')</a>
                        <a class="mx-4" href="{{route('curricula.show', $course->id )}}">@include('components.icons.eye')</a>
                        <a class="mx-4" href="{{route('curricula.edit', $course->id )}}">@include('components.icons.edit')</a>
                        <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="curricullaDelete({{$curricula->id}})">
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
