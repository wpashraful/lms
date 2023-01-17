<div>
    <div class="singleCourse mb-6">
        <h2 class="font-bold uppercase text-4xl mb-6">{{$curriculas->course->name}}</h2>
        <h2 class="font-bold my-5 text-xl">Price: ${{$curriculas->course->price}}</h2>
        <p>{{$curriculas->course->description}}</p>
    </div>
    <div class="curriculasingle">
        <h1 class="font-bold text-xl">{{$curriculas->name}}</h1>
    </div>
    <h2>Students</h2>
    <table class="w-full table-auto">
        <tr class="bg-gray-100">
            <th class="text-left p-4 m-4">Name</th>
            <th class="text-left p-4 m-4">Date</th>
            <th class="text-left p-4 m-4">Status</th>
        </tr>
        @foreach($curriculas->course->students as $stud)
            <tr class="border odd:bg-slate-50">
                <td class="border p-4 m-4 font-bold">{{$stud->name}}</td>
                <td class="border p-4 m-4 font-bold">{{date('F-j-Y',strtotime($stud->created_at))}}</td>
                <td class="border p-4 m-4 font-bold"><a class="btn-submit">present</a></td>
{{--                <td class="border p-4 m-4 font-bold">--}}
{{--                    <div class="flex justify-center item-center">--}}
{{--                        <a class="mx-4 btn-submit" href="{{route('curricula.show', $course->id )}}">@include('components.icons.eye')</a>--}}
{{--                        <a class="mx-4" href="{{route('curricula.show', $course->id )}}">@include('components.icons.eye')</a>--}}
{{--                        <a class="mx-4" href="{{route('curricula.edit', $course->id )}}">@include('components.icons.edit')</a>--}}
{{--                        <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="curricullaDelete({{$curricula->id}})">--}}
{{--                            <button type="submit">--}}
{{--                                @include('components.icons.delete')--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </td>--}}
            </tr>
        @endforeach
    </table>
</div>
