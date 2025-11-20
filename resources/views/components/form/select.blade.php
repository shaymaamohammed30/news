@props(
    [
        'name',
        'value',
        'label',
        'options' => [],
        'selected'
    ]
);
<label>{{$label}} </label>
        <select name="{{$name}}" id="" class="form-control @error($name) is-invalid @enderror">
            <option value="">Select</option>
            @foreach ($options as $value => $text)
                <option value="{{$value}}"
                 @if ($value == old($name ,$selected))
                  selected
                  @endif
                   > 
                   {{$text}}</option>
            @endforeach
        </select>
        @error($name)
            <div class="invalid-feedback"> 
                {{$message}}
            </div>
        @enderror