<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex align-items-center justify-space-between btn-primary']) }}>
    {{ $slot }}
</button>
