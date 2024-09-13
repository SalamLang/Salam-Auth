@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-2 border-transparent transition-all duration-300 w-full mt-1.5 h-[50px] rounded-[15px] !outline-0 p-3 placeholder-gray-300']) !!}>
