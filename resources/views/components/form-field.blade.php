<div>
    <label for="{{$name}}" class="lms-label">{{$label}}</label>
    @if($type === 'textarea')
        <textarea id="{{$name}}" wire:model.lazy="{{$name}}" placeholder="{{$placeholder}}" type="{{$type}}" {{$required}} class="{{$class}}"></textarea>
    @else
        <input id="{{$name}}" wire:model.lazy="{{$name}}" placeholder="{{$placeholder}}" type="{{$type}}" {{$required}} class="{{$class}}"  />
    @endif
    @error($name)
    <div class="tex-red-500">{{$message}}</div>
    @enderror

</div>
