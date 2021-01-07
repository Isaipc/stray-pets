<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center tracking-widest rounded-md border border-gray-300 uppercase text-xs px-4 py-2']) }}>
    {{ $slot }}
</button