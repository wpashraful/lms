<div>
    <form wire:submit.prevent="CourseFormSubmit">
        <div class="mb-6">
            @include('components/form-field',[
            'name' => 'name',
            'type' => 'text',
            'class' => 'lms-input',
            'label' =>  'name',
            'placeholder' => 'enter text',
            'required' => 'required'
])
        </div>


        <div class="mb-6">
            @include('components/form-field',[
            'name' => 'description',
            'type' => 'textarea',
            'class' => 'lms-input',
            'label' =>  'Description',
            'placeholder' => 'enter description',
            'required' => 'required'
            ])
        </div>
        <div class="mb-6">
            @include('components/form-field',[
            'name' => 'price',
            'type' => 'number',
            'class' => 'lms-input',
            'label' =>  'Price',
            'placeholder' => 'enter price',
            'required' => 'required'
            ])
        </div>



        <div class="mt-6 flex">
            <div class="days flex justify-between items-center">
                <div class="single-day mb-6 flex items-center justify-between">
                    @foreach($days as $day)

                    <div class="flex items-center mr-4">
                        <input wire:model.lazy="selectedDays" checked id="{{$day}}" type="checkbox" value="{{$day}}" class="lms-chekbox">
                        <label for="{{$day}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ucfirst($day)}}</label>
                    </div>
                    @endforeach

{{--                    <div class="mx-2 min-w-max">--}}
{{--                        @include('components/form-field',[--}}
{{--                            'name' => 'time',--}}
{{--                            'type' => 'time',--}}
{{--                            'class' => '',--}}
{{--                            'label' =>  'time',--}}
{{--                            'placeholder' => 'time',--}}
{{--                            'required' => 'required'--}}
{{--                        ])--}}
{{--                    </div>--}}


                    <div class="mx-2 min-w-max">
                        @include('components/form-field',[
                                'name' => 'enddate',
                                'type' => 'date',
                                'class' => '',
                                'label' =>  'date',
                                'placeholder' => 'date',
                                'required' => 'required'
                            ])
                    </div>


                </div>
            </div>
        </div>
        @include('components.icons.loading');
        <button class="btn-submit" type="submit">Add new course</button>
    </form>


</div>
