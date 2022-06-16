<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button']) }} style="padding:10px">
    {{ $slot }}
</button>
