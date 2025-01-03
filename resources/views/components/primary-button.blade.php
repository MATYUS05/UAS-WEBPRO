<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-bold']) }}>
    {{ $slot }}
</button>
