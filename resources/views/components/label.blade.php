@props(['value'])

<label {{ $attributes->merge(['class' => 'text-[#FF5C00] font-bold']) }}>
    {{ $value ?? $slot }}
</label>
