<div>
    <form wire:submit.prevent="search">
        <div class="flex items-center">
            <label for="name" class="lms-label"></label>
                <input wire:model.lazy="search" type="text" class="lms-input mr-4" />

            <button type="submit" class="btn-submit">search</button>
        </div>

    </form>
        @if(count($leads) > 0)
            <form wire:submit.prevent="admit">
                <div class="mt-4">

                    <select wire:model="lead_id"  class="lms-input">
                        <option value="select Lead">Select</option>
                        @foreach($leads as $lead)
                            <option value="{{$lead->id}}">{{$lead->name}} - {{$lead->email}}- {{$lead->phone}}</option>
                        @endforeach
                    </select>
                </div>
                @if(!empty($lead_id))
                    <div class="mt-4">
                        <select wire:change="courseSelected" wire:model="course_id"  class="lms-input">
                            <option value="Lead">Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}"> {{$course->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if(!empty($selectedCourse))
                    <h3>Price : $ {{number_format($selectedCourse->price,2) }}</h3>
                    <div class="mb-4">
                        <input wire:model.lazy="payment" type="number" step="0.01" class="lms-input" placeholder="payment now"/>
                    </div>
                    @include('components.icons.loading')
                    <button class="btn-submit" type="submit">pay now</button>
                @endif

            </form>
        @endif


</div>
