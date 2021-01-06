<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'flex items-center justify-center rounded-md border border-gray-300 uppercase text-xs px-4 py-2']) }}>
    {{ $slot }}
</button