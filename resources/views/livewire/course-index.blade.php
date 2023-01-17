<div>
    <table class="w-full table-auto">
        <tr class="bg-gray-100">
            <th class="text-left p-4 m-4">Name</th>
            <th class="text-left p-4 m-4">description</th>
            <th class="text-left p-4 m-4">price</th>
            <th class="text-left p-4 m-4">Date</th>
            <th class="text-left p-4 m-4">Actions</th>
        </tr>

        @foreach($courses as $course)
            <tr class="border odd:bg-slate-50">
                <td class="border p-4 m-4 font-bold">{{$course->name}}</td>
                <td class="border p-4 m-4 font-bold">{{$course->description}}</td>
                <td class="border p-4 m-4 font-bold">{{$course->price}}</td>
                <td class="border p-4 m-4 font-bold">{{date('F-j-Y',strtotime($course->created_at))}}</td>
                <td class="border p-4 m-4 font-bold">
                    <div class="flex justify-center item-center">
                        <a class="" href="{{route('course.edit', $course->id )}}">@include('components.icons.edit')</a>
                        <a class="mx-4" href="{{route('course.show', $course->id )}}">@include('components.icons.eye')</a>
                        <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="curricullaDelete({{$course->id}})">
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
{{--        {{$leads->links()}}--}}
    </div>
</div>
