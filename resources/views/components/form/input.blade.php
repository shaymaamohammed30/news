@props([
    'name',
    'label' => null,
    'placeholder' => '',
    'value' => '',
    'type' => 'text'
])

<div class="form-group mb-3">

    @if ($label)
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
        </label>
    @endif

    {{-- إذا كان النوع textarea --}}
    @if ($type === 'textarea')
        <textarea 
            name="{{ $name }}" 
            id="{{ $name }}" 
            class="form-control @error($name) is-invalid @enderror"
            placeholder="{{ $placeholder }}"
            rows="4"
        >{{ old($name, $value) }}</textarea>

    @else
        <input 
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            class="form-control @error($name) is-invalid @enderror"
            placeholder="{{ $placeholder }}"
            value="{{ old($name, $value) }}"
        >
    @endif

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

</div>
