@props(['disabled' => false])
<div class="text-field">
    <label for="{{ $id }}">{{ $name }}</label>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => '']) !!} id="{{ $id }}" name="{{ $id }}" type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder ?? '' }}" required value="{{ $value ?? '' }}" autocomplete="{{ $autocomplete ?? 'off' }}">
</div>